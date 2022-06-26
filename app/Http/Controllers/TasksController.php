<?php

namespace App\Http\Controllers;

use App\Category;
use App\Task;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class TasksController extends Controller
{
    protected $rules = [
        'name'        => 'required|max:60',
        'description' => 'max:155',
        'completed'   => 'numeric',

    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = Auth::user();

        return view('tasks.index', [
            'tasks'           => Task::orderBy('created_at', 'asc')
                ->where('user_id', $user->id)
                ->get(),
            'tasksInComplete' => Task::orderBy('created_at', 'asc')
                ->where('user_id', $user->id)
                ->where('completed', '0')
                ->get(),
            'tasksComplete'   => Task::orderBy('created_at', 'asc')
                ->where('user_id', $user->id)
                ->where('completed', '1')
                ->get(),
            'categories'      => Category::orderBy('created_at', 'asc')
                ->where('user_id', $user->id)
                ->get()
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function index_all()
    {
        $user = Auth::user();

        return view('tasks.filtered', [
            'tasks' => Task::orderBy('created_at', 'asc')
                ->where('user_id', $user->id)
                ->get(),
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function index_incomplete()
    {
        $user = Auth::user();

        return view('tasks.filtered', [
            'tasks' => Task::orderBy('created_at', 'asc')
                ->where('user_id', $user->id)
                ->where('completed', '0')
                ->get(),
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function index_complete()
    {
        $user = Auth::user();

        return view('tasks.filtered', [
            'tasks' => Task::orderBy('created_at', 'asc')
                ->where('user_id', $user->id)
                ->where('completed', '1')
                ->get(),
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $user = Auth::user();

        return view('tasks.create', [
            'categories' => Category::orderBy('created_at', 'asc')
                ->where('user_id', $user->id)
                ->get()
        ]);
    }

    /**
     * @param Request $request
     *
     * @return Application|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        $user = Auth::user();
        $task = $request->all();
        $task['user_id'] = $user->id;
        Task::create($task);

        return redirect('/tasks')->with('success', 'Task created');
    }

    /**
     * @param $id
     *
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $user = Auth::user();
        $task = Task::query()->findOrFail($id);
        $categories = Category::orderBy('created_at', 'asc')
            ->where('user_id', $user->id)
            ->get();
        foreach ($categories as $category) {
            $categoriesArr[$category->id] = $category->name;
        }

        return view('tasks.edit', [
            'task'       => $task,
            'categories' => $categoriesArr ?? []
        ]);
    }

    /**
     * @param Task    $task
     * @param Request $request
     *
     * @return Application|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function update(Task $task, Request $request)
    {
        $this->validate($request, $this->rules);

        $task = Task::findOrFail($task->id);
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->completed = $request->input('completed') ?? 0;
        $task->category_id = $request->input('category_id') ?? null;
        $task->save();

        return redirect('tasks')->with('success', 'Task Updated');
    }

    /**
     * @param $id
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return redirect('/tasks')->with('success', 'Task Deleted');
    }
}
