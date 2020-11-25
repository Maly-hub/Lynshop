<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LYNSHOP | Đăng nhập</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @include('admin.template.css')
</head>
<body class="hold-transition login-page" style="background-image: url('https://cutewallpaper.org/21/shoes-backgrounds/Shoes-Backgrounds-7C981E7-Wallperio.com_tm_.jpg')">
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
        <p class="text-center">Đăng nhập</p>
        <form action="{{ route('handle-login-admin') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-user"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Mật khẩu"  name="password"">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="">
                <button class="btn btn-info btn-block" type="submit">Đăng nhập</button>
            </div>
        </form>
        {{-- <p class="mb-1">
            <a href="{{ route('register') }}">Đăng ký</a>
        </p> --}}
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@include('admin.template.js')

</body>
</html>


