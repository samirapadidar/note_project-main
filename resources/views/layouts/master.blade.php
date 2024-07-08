<!DOCTYPE html>
<html>
@include('layouts.head')
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
@include('layouts.navbar')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('page_title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">پیشخوان</a></li>
                            <li class="breadcrumb-item active">@yield('page_title')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if(\Illuminate\Support\Facades\Session::has('warning'))
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="fa fa-warning"></i> هشدار !</h4>
                        {!! implode('<br/>',\Illuminate\Support\Facades\Session::get('warning')) !!}
                    </div>
                @endif
                @if(\Illuminate\Support\Facades\Session::has('success'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="fa fa-check"></i>	پیام</h4>
                        {!! \Illuminate\Support\Facades\Session::get('success') !!}
                    </div>
                @endif
                @yield('contents')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@include('layouts.footer')

<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('layouts.scripts')
@if($errors->any())
    <script>
        @foreach($errors->all() as $error)
            toastr.warning('{{$error}}');
        @endforeach
    </script>
@endif
</body>
</html>
