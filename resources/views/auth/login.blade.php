<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ورود</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/font-awesome/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/iCheck/square/blue.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="/dist/css/panel.css">

      <link rel="icon" type="image/ico" href="/favicon/favicon.ico">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
      <link rel="apple-touch-icon" href="/favicon/favicon-96x96.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
        @if(\Illuminate\Support\Facades\Session::has('warning'))
            <div class="callout callout-warning"dir="rtl">
                <h4>پیغام</h4>
                <p>{{implode(',',\Illuminate\Support\Facades\Session::get('warning'))}}</p>
            </div>
        @endif
      <div class="login-logo">
          {{config('app.name')}}
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">وارد شوید</p>
          @if(count($errors) > 0)
              @foreach( $errors->all() as $message )
                  <div class="alert alert-danger display-hide">
                      <button class="close" data-close="alert"></button>
                      <span>{{ $message }}</span>
                  </div>
              @endforeach
          @endif
          <form action=""{{route('login')}}"" method="POST">
            @csrf
          <div class="input-group mb-3">
              <input type="email" class="form-control ltr text-left" placeholder="Email" name="email">
              <div class="input-group-append">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
              </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control ltr text-left" placeholder="Password" name="password">
              <div class="input-group-append">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
              </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> مرا به خاطر بسپار
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
            </div><!-- /.col -->
          </div>
        </form>
        <a href="#">فراموشی رمز عبور</a><br>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
