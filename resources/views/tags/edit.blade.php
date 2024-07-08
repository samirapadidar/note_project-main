@extends('layouts.master')
@section('page_title','ویرایش یادداشت')

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
        <form id="quickForm" method="post" action="{{route('tags.update',[$tag->id])}}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="tag_id" value="{{$tag->id}}">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">نام تگ</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="نام کاربری خود را وارد کنید" value="{{$tag->name}}">
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
        $(function () {
            $.validator.setDefaults({
                submitHandler: function () {
                    alert( "Form successful submitted!" );
                }
            });
            $('#quickForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    terms: {
                        required: true
                    },
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection