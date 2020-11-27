<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LYNSHOP | Đăng ký</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @include('client.template.css')
</head>
<body style="background-color: black">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 text-center">
            <div class="login-box">
                <div class="card">
                  <div class="card-body login-card-body">
                      <p class="login-box-msg">Đăng ký khách hàng</p>
                      @if (Session::has('alert-password'))
                      <p style="color: red" class="text-center">
                          {{ Session::get('alert-password') }}
                      </p>
                      @endif
                  <form action="{{ route('handle-register-client') }}" method="POST">
                      @csrf
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Họ tên" name="hoTen">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Tên đăng nhập" name="tenDangNhap">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                        </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Số điện thoại" name="sdt">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Địa chỉ" name="diaChi">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="matKhau1">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="matKhau2">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>
                      <p class="mb-1 mt-2">
                         <a href="{{ route('login-client') }}"> <button type="submit" class="btn btn-success btn-block">Đăng nhập</button></a>
                      </p>
                  </div>
                  <!-- /.login-card-body -->
                </div>
              </div>
              <!-- /.login-box -->
        </div>
        <div class="col-4"></div>
    </div>
@include('client.template.js')
</body>
</html>
