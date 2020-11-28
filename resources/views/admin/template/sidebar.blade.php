<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('admin-template') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin LYNSHOP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin-template') }}/dist/img/maly.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">THACH THI MALY</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('category-list') }}" class="nav-link">
              <i class="fa fa-square nav-icon" aria-hidden="true"></i>
              <p> LOẠI SẢN PHẨM</p>
            </a>
          </li>
          <li class="nav-item">
              <a href="{{ route('product') }}" class="nav-link">
              <i class="fa fa-square nav-icon" aria-hidden="true"></i>
              <p>SẢN PHẨM</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('don-hang') }}" class="nav-link">
              <i class="fa fa-square nav-icon" aria-hidden="true"></i>
              <p>ĐƠN HÀNG</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-square nav-icon" aria-hidden="true"></i>
              <p>THỐNG KÊ</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-square nav-icon" aria-hidden="true"></i>
              <p>KHÁCH HÀNG</p>
            </a>
          </li>
          @if (Auth::guard('nhanvien')->user()->q_id == 1)
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link">
              <i class="fa fa-square nav-icon" aria-hidden="true"></i>
              <p>THÊM NHÂN VIÊN</p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="fa fa-undo nav-icon" aria-hidden="true"></i>
              <p>ĐĂNG XUẤT</p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
