@extends('layouts.master')
@section('page_title','ویرایش یادداشت')

@section('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
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
        <form id="quickForm" method="post" action="{{route('notes.update',[$note->id])}}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="note_id" value="{{$note->id}}">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="نام کاربری خود را وارد کنید" value="{{$note->title}}">
                </div>
            </div>
            <div class="card-body">
            <div class="form-group">
            <label>انتخاب دسته بندی</label>
                <select class="form-control" name="category_id">
                <option value="{{ $note->category ? $note->category->id : ''}}">{{ $note->category ? $note->category->name : 'دسته بندی را انتخاب کنید' }}</option>
                @if(!count($categories))
                    <option value="{{ $note->category->id }}">{{ $note->category->name }}</option>
                @else
                    @foreach($categories as $category)
                        @include('categories.subcategoryselect', ['category' => $category])
                    @endforeach
                @endif
                </select>
            </div>
        </div>
            <div class="card-body">
            <div class="form-group">
                <label>متن یادداشت</label>
{{--                <textarea class="form-control" name="content" rows="3" placeholder="متن یادداشت را وارد کنید.">{{ $note->content }}</textarea>--}}
                <textarea class="form-control" name="content" id="body" placeholder="Enter the Description" name="body">{{ $note->content }}</textarea>
            </div>
        </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">ویرایش</button>
            </div>
        </form>
    </div>
@endsection
@section('bottom-script')
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
