<?php

namespace App\Http\Controllers;

use App\Category;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class CategoriesController extends Controller
{
    protected $rules = [
        'name'        => 'required|max:60',
        'description' => 'max:155',
        'color'       => 'max:155',
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

        return view('categories.index', [
            'categories' => Category::orderBy('created_at', 'asc')->where(
                'user_id',
                $user->id
            )->get(),
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('categories.create');
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
        $category = $request->all();
        $category['user_id'] = $user->id;
//        var_dump($category);die();
        Category::create($category);

        return redirect('/categories')->with('success', 'Category created');
    }

    /**
     * @param $id
     *
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $category = Category::query()->findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * @param Category $category
     * @param Request  $request
     *
     * @return Application|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function update(Category $category, Request $request)
    {
        $this->validate($request, $this->rules);

        $category = Category::findOrFail($category->id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->color = $request->input('color');
        $category->save();

        return redirect('categories')->with('success', 'Category Updated');
    }

    /**
     * @param $id
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect('/categories')->with('success', 'Category Deleted');
    }
}
