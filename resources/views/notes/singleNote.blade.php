@extends('layouts.master')
@section('page_title','یادداشت')
@section('head')
    <link rel="stylesheet" href="/plugins/select2/select2.min.css">
@endsection
@section('contents')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item" style="border: none;">
                                    <b style="font-size:16px">نام دسته بندی</b><a class="float-right" style="font-size:16px">{{ $note->category ? $note->category->name : 'دسته بندی وجود ندارد' }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b style="font-size:16px">تگ ها</b>
                                    @if(isset($note->category->tags))
                                        @if(!count($note->category->tags))
                                            <span class="float-right badge badge badge-danger" style="padding:3px; margin:3px; font-size:13px; background-color: rgb(0 0 0 / 32%);">تگ وجود ندارد</span>
                                        @else
                                            @foreach($note->category->tags as $tag)
                                                <span class="float-right badge badge badge-danger" style="padding:3px; margin:3px; font-size:13px; background-color: rgb(0 0 0 / 32%);">{{ $tag->name }}</span>
                                            @endforeach
                                        @endif
                                    @else
                                        <span class="float-right badge badge badge-danger" style="padding:3px; margin:3px; font-size:13px; background-color: rgb(0 0 0 / 32%);">تگ وجود ندارد</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <div class="timeline-inverse">
                                        <h4>{{ $note->title }}</h4>
                                    </div>
                                    <hr>
                                    <br>
                                    <div>
                                        <p style="font-size: 16px;0}">{!! $note->content !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="/plugins/jquery/jquery.min.js"></script>

    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/dist/js/adminlte.min.js?v=3.2.0"></script>

    <script src="/dist/js/demo.js"></script>
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
