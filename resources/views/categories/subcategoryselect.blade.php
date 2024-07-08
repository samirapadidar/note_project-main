<!-- resources/views/categories/partials/category.blade.php -->
<li>
    @if($category->children->isNotEmpty())
        <option value= "{{ $category->id }}" class="caret">{{ $category->name }}</span>
        <ul class="nested">
            @foreach($category->children as $child)
                @include('categories.subcategoryselect', ['category' => $child])
            @endforeach
        </ul>
    @else
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endif
</li>