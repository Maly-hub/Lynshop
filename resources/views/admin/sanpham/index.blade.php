@extends('admin.template.master')
@section('title')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Sản Phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sản Phẩm</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 text-right">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Thêm sản phẩm
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 text-center">
            <h2>Danh sách sản phẩm</h2>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">ID</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Loại</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($sanPham as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->sp_id }}</td>
                            <td>{{ $item->sp_ten }}</td>
                            <td>{{ number_format($item->sp_gia) }}</td>
                            <td>{{ $item->sp_soluong }}</td>
                            <td>{{ $item->l_ten }}</td>
                            <td>
                                @if ($item->sp_hinhanh == null)
                                    Chưa có ảnh sản phẩm
                                @else
                                    <img src="{{ asset('hinhanhsanpham') }}/{{ $item->sp_hinhanh }}" style="width:180px; height: 200px;" alt="Lỗi ảnh">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('detail-product',['id'=> $item->sp_id]) }}" class="btn btn-primary">Chi tiết</a>
                                <a href="{{ route('edit-product', ['id'=> $item->sp_id]) }}" class="btn btn-success">Sửa</a>
                                <a href="{{ route('delete-product', ['id'=> $item->sp_id]) }}" class="btn btn-danger" onclick="return xoa()">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('handle-add-product') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-sm-12 col-md-3">
                                @if (Session::has('alert-them'))
                                    <p style="color: rgb(137, 206, 137)" class="text-center">
                                        {{ Session::get('alert-them') }}
                                    </p>
                                @endif
                                @if (Session::has('error-them'))
                                    <p style="color: red" class="text-center">
                                        {{ Session::get('error-them') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tensp">Tên sản phẩm</label>
                                <input type="text" name="tenSanPham" class="form-control" placeholder="Nhập tên sản phẩm...">
                            </div>
                            <div class="form-group">
                                <label for="danhmuc">Giới tính</label>
                                <select name="danhMuc" id="" class="form-control">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gia">Giá</label>
                                <input class="form-control" type="text" name="gia" placeholder="Nhập giá sản phẩm...">
                            </div>
                            <div class="form-group">
                                <label for="soluong">Số lượng</label>
                                <input class="form-control" type="text" name="soLuong" placeholder="Nhập số lượng sản phẩm...">
                            </div>
                            <div class="form-group">
                                <label for="loaisp">Loại sản phẩm</label>
                                <select name="tenLoai" class="form-control">
                                    @foreach ($loaiSanPham as $item)
                                    <option value="{{ $item->l_id }}">{{ $item->l_ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="moTa">Mô Tả Sản Phẩm</label>
                            <textarea name="moTa" id="summernote" cols="32" rows="10"></textarea>
                            <div class="form-group">
                                <label for="hinhanh">Hình ảnh</label>
                                <input class="form-control" type="file" name="hinhAnh">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function xoa(){
            const a = confirm('Bạn có muốn xóa sản phẩm này không?');
            if (a==true){
                return true;
            }
            return false;
        }
    </script>
@endsection
