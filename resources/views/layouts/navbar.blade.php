<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('dashboard')}}" class="nav-link {{(\Illuminate\Support\Facades\Route::currentRouteName() == 'admin.home') ? 'active' : ''}}">صفحه اصلی</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('dashboard')}}" class="nav-link {{(\Illuminate\Support\Facades\Route::currentRouteName() == 'admin.product.list') ? 'active' : ''}}"><i class="fa fa-book nav-icon"></i> محصولات</a>
        </li>
    </ul>
</nav>
