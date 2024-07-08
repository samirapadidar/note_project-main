@extends('layouts.master')
@section('page_title','ادمین ها')
@section('head')
    <link rel="stylesheet" href="/plugins/select2/select2.min.css">
@endsection
@section('contents')
    @if(\Illuminate\Support\Facades\Session::has('successfully'))
        <div class="alert alert-success">
            {{ session()->get('successfully') }}
        </div>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header p-0">
            <ul class="nav nav-pills ml-auto p-2">
                <li class="nav-item">
                    <a class="nav-link active show" href="#tab_a" data-toggle="tab">تگ ها</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab_b" data-toggle="tab">
                        <i class="fa fa-plus"></i>
                            اضافه کردن تگ جدید
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active show" id="tab_a">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            @if(!count($tags))
                                <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>پیغام</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td>هیچ تگی یافت نشد.</td>
                                    </tr>
                                </tbody>
                            @else
                                <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>عنوان</th>
                                        <th>تاریخ ایجاد</th>
                                        <th>تاریخ ویرایش</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tags as $tag)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td style="text-align: right;">{{$tag->name}}</td>
                                            <td>
                                                {{\Morilog\Jalali\Jalalian::forge($tag->created_at)->format('Y-m-d')}}
                                            </td>
                                            <td>
                                                {{\Morilog\Jalali\Jalalian::forge($tag->updated_at)->format('Y-m-d')}}
                                            </td>
                                            <td class="text-center" style="min-width: 170px!important; display: flex; border-bottom: 0px;border-right: 0px; border-left: 0px;">
                                                <a href="{{route('tags.update',[$tag->id])}}"
                                                    target="_blank" class="btn btn-default" style=" margin-right: 22%; margin-left: 10px;"><i class="far fa-edit"></i></a>
                                            </td>            
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tab_b">
                    @include('tags.add')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('bottom-script')
    <script src="/plugins/select2/select2.min.js"></script>
    <script>
        $('.select2').select2({
            dir: 'rtl'
        });
        $('.add-image').click(function () {
            const html = '<div class="col-md-2 col-sm-6"> <div class="ltr text-left"> <label class="btn btn-success mr-2" type="button"> <input class="d-none" type="file" name="images[]"> <i class="fas fa-upload"></i> آپلود عکس </label> </div></div>';
            $(this).parents('.form-group').find('.row').append(html);
        });
    </script>
@endsection
