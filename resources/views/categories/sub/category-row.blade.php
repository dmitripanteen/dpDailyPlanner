<tr>
    <td class="table-text">
        {{ $category->id }}
    </td>
    <td class="table-text">
        @if($category->color)
            <span class="badge badge-secondary"
                  style="background-color:{{$category->colorScheme[$category
                  ->color] }};color:#fff">
                {{ $category->name }}
            </span>
        @else
            <span class="badge badge-secondary">
                {{ $category->name }}
            </span>
        @endif
    </td>
    <td>
        {{ $category->description }}
    </td>
    <td>
        <a href="{{ route('categories.edit', $category->id) }}"
           class="pull-right">
            <span class="fa fa-pencil fa-fw" aria-hidden="true"></span>
            <span class="sr-only">Edit Category</span>
        </a>
    </td>
</tr>
