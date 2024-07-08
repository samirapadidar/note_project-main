<!-- resources/views/categories/partials/category.blade.php -->
@if($category->children->isNotEmpty())
    <tr>
        <td>{{$category->name}}</td>
        <td>
            {{\Morilog\Jalali\Jalalian::forge($category->created_at)->format('Y-m-d')}}
        </td>
        <td>
            {{\Morilog\Jalali\Jalalian::forge($category->updated_at)->format('Y-m-d')}}
        </td>
        <td class="text-center" style="min-width: 170px!important; display: flex;">
            <a href="{{route('categories.update',[$category->id])}}"
            target="_blank" class="btn btn-default"
            style=" margin-right: 40%; margin-left: 6px;">
                <i class="far fa-edit"></i></a>
        </td>
    </tr>
        @foreach($category->children as $child)
            @include('categories.subcategorylist', ['category' => $child])
        @endforeach
@else
    <tr>
        <td>{{$category->name}}</td>
        <td>
            {{\Morilog\Jalali\Jalalian::forge($category->created_at)->format('Y-m-d')}}
        </td>
        <td>
            {{\Morilog\Jalali\Jalalian::forge($category->updated_at)->format('Y-m-d')}}
        </td>
        <td class="text-center" style="min-width: 170px!important; display: flex;">
            <a href="{{route('categories.update',[$category->id])}}"
            target="_blank" class="btn btn-default"
            style=" margin-right: 40%; margin-left: 6px;">
                <i class="far fa-edit"></i></a>
        </td>
    </tr>
@endif