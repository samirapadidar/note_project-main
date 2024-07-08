<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="/dist/img/panel/notepad.png" class="brand-image img-circle elevation-3" alt="{{env("APP_NAME")}}" style="margin-top: -5px;">
        <span class="brand-text font-weight-light">{{env("APP_NAME")}}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#">{{\Illuminate\Support\Facades\Auth::user()->name}} -
                    مدیر کل
                </a>
            </div>
            <div class="info">
                <a href="#" class="text-danger"><i class="fa fa-sign-out-alt"></i></a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link text-center active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p class="font-weight-bold">پیشخوان</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('notes.index') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>یادداشت ها</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('categories.index') }}" class="nav-link ">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>
                            دسته بندی ها
                            <i class="fa fa-angle-left left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>نمایش دسته بندی ها</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>نمایش درختی دسته بندی ها</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tags.index') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>برچسب ها</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
