@extends('layouts.master')
@section('page_title','دسته بندی ها')
@section('contents')
    <div class="card">
        <div class="card-header p-0">
            <ul class="nav nav-pills ml-auto p-2">
                <li class="nav-item">
                    <a class="nav-link active show" href="#tab_a" data-toggle="tab">دسته بندی ها</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab_b" data-toggle="tab">
                        <i class="fa fa-plus"></i>
                        اضافه کردن دسته بندی جدید
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active show" id="tab_a">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            @if(!count($categories))
                                <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>پیغام</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td>هیچ دسته بندی ای یافت نشد.</td>
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
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td style="text-align: right;">{{$category->name}}</td>
                                            <td>
                                                {{\Morilog\Jalali\Jalalian::forge($category->created_at)->format('Y-m-d')}}
                                            </td>
                                            <td>
                                                {{\Morilog\Jalali\Jalalian::forge($category->updated_at)->format('Y-m-d')}}
                                            </td>
                                            <td class="text-center" style="min-width: 170px!important; display: flex; border-bottom: 0px;border-right: 0px; border-left: 0px;">
                                                <a href="{{route('categories.update',[$category->id])}}"
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
                    @include('categories.add')
                </div>
            </div>
        </div>
    </div>
@endsection