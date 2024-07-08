<!-- partials/category_children.blade.php -->

@foreach($children as $child)
    <li>
        <span class="category-toggle">{{ $child->name }}</span>
        @if(count($child->children))
            <ul class="nested">
                @include('categories.subcategorytree', ['children' => $child->children])
            </ul>
        @endif
    </li>
@endforeach
@section('scripts')
<script>
    $(document).ready(function () {
        // Toggle function for category tree
        $('.category-toggle').click(function () {
            $(this).siblings('ul.nested').toggleClass('active');
        });
    });
</script>
@endsection
<style>
    .tree ul {
        list-style-type: none;
        padding-left: 20px;
    }
    .tree .nested {
        display: none;
        list-style-type: none;
        padding-left: 20px;
    }
    .tree .active {
        display: block;
    }
    .tree .category-toggle {
        cursor: pointer;
    }
</style>

