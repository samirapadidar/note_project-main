@extends('layouts.master')
@section('page_title','ویرایش یادداشت')

@section('head')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
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
    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="/plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="/dist/js/adminlte.min.js?v=3.2.0"></script>
    <script src="/dist/js/demo.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" ></script>
@endsection
