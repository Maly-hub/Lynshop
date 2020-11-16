@extends('admin.template.master')
@section('title')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="mt-0 text-dark">Sản Phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sản Phẩm</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">Sửa sản phẩm: {{ $sanPham->sp_ten }}</h2>
            <form action="{{ route('handle-edit-product',['id'=>$sanPham->sp_id]) }}" method="POST"enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="tenSanPham">Tên Sản Phẩm</label>
                    <input type="text" name="tenSanPham" value="{{ $sanPham->sp_ten }}" class="form-control" placeholder="Nhập tên sản phẩm...">
                </div>
                <div class="form-group">
                    <label for="loaisp">Loại Sản Phẩm</label>
                    <select name="tenLoai" id="" class="form-control">
                        @foreach ($danhSachLoai as $item)
                            <option value="{{ $item->l_id }}" {{ $sanPham->l_id == $item->l_id ? 'selected' : ''}}>{{ $item->l_ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="danhmuc">Giới tính</label>
                    <select name="danhMuc" id="" class="form-control">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gia">Giá Sản Phẩm</label>
                    <input type="text" name="giaSanPham" value="{{ $sanPham->sp_gia }}" class="form-control" placeholder="Nhập giá sản phẩm...">
                </div>
                <div class="form-group">
                    <label for="tenSanPham">Số Lượng Sản Phẩm</label>
                    <input type="text" name="soLuongSanPham" value="{{ $sanPham->sp_soluong }}" class="form-control" placeholder="Nhập số lượng sản phẩm...">
                </div>
                <div class="form-group">
                    <label for="hinhanh">Hình ảnh</label>
                    <img src="{{ asset('hinhanhsanpham') }}/{{ $sanPham->sp_hinhanh }}" style="width:150px" alt="Không có hình ảnh để hiển thị">
                </div>
                <div class="form-group">
                    <label for="chinhsua">Chỉnh sửa hình ảnh</label>
                    <input type="file" name="hinhAnh" class="from-control">
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
        </div>
    </div>
@endsection
