@extends('layouts.master')
@section('page_title','سته بندی ها')

@section('contents')

<div class="card">
    <div class="card-header p-0">
        <ul class="nav nav-pills ml-auto p-2">
            <li class="nav-item">
                <a class="nav-link active show" href="#tab_a" data-toggle="tab">دسته بندی ها</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active show" id="tab_a">
                <div class="tree">
                    <ul id="category-tree">
                        @foreach($categories as $category)
                            @if($category->parent_id == null)
                                <li>
                                    <span class="category-toggle">{{ $category->name }}</span>
                                    @if(count($category->children))
                                        <ul class="nested">
                                            @include('categories.subcategorytree', ['children' => $category->children])
                                        </ul>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


