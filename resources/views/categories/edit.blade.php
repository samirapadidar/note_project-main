@extends('layouts.master')
@section('page_title','ویرایش دسته بندی')

@section('head')
<link rel="stylesheet" href="/plugins/select2/select2.min.css">
@endsection

@section('contents')
    <div class="card card-primary">
        <div class="card-header">
            <strong>
                <a href="#">{{\Illuminate\Support\Facades\Auth::user()->name}} -
                    مدیر کل
                </a>
            </strong>
        </div>
        <form id="quickForm" method="post" action="{{route('categories.update',[$category->id])}}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="category_id" value="{{$category->id}}">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">نام دسته بندی</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="نام کاربری خود را وارد کنید" value="{{$category->name}}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">ویرایش</button>
            </div>
        </form>
    </div>
@endsection