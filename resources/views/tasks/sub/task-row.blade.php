<tr>
    <td class="table-text">
        {{ $task->id }}
    </td>
    <td class="table-text">
        {{ $task->name }}
    </td>
    <td>
        {{ $task->description }}
    </td>
    <td>
        @if ($task->completed === 1)
            <span class="label label-success">Complete</span>
        @else
            <span class="label label-default">Incomplete</span>
        @endif
    </td>
    <td>
        <a href="{{ route('tasks.edit', $task->id) }}" class="pull-right">
            <span class="fa fa-pencil fa-fw" aria-hidden="true"></span>
            <span class="sr-only">Edit Task</span>
        </a>
    </td>
</tr>
