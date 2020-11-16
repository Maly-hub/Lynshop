@extends('admin.template.master')
@section('title')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Loại Sản Phẩm</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Loại Sản Phẩm</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark text-center">Loại Sản Phẩm</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-sm-12 col-md-8 text-center">
                <h4>Danh sách loại sản phẩm</h4>
                <form action="" method="get">
                    @csrf
                    <div class="form-group">
                        <label for="">Tìm kiếm</label>
                        <input type="text" class="form-control" name="tuKhoa" placeholder="Tìm kiếm theo tên . . .">
                    </div>
                </form>
                {{-- Thong bao cap nhat loai --}}
                @if (Session::has('capnhat'))
                    <p style="color:green" class="text-center">
                        {{ Session::get('capnhat') }}
                    </p>
                @endif
                @if (Session::has('error-capnhat'))
                    <p style="color: red" class="text-center">
                        {{ Session::get('error-capnhat') }}
                    </p>
                @endif
                {{-- Thong bao xoa loai --}}
                @if (Session::has('xoa'))
                    <p style="color: green">
                        {{ Session::get('xoa') }}
                    </p>
                @endif
                @if (Session::has('error-xoa'))
                    <p style="color:red">
                        {{ Session::get('error-xoa') }}
                    </p>
                @endif
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">ID</th>
                            <th scope="col">Tên loại sản phẩm</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($categorylist as $item)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <th scope="row">{{ $item->l_id }}</th>
                            <td>{{ $item->l_ten }}</td>
                            <td>
                                <a href="{{ route('repair-type', ['id'=>$item->l_id]) }}" class="btn btn-success">Sửa</a>
                                <a href="{{ route('delete-type', ['id'=>$item->l_id]) }}" class="btn btn-danger" onclick="return xoa()">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12 col-md-4">
                <h4 class="text-center">Thêm loại sản phẩm</h4>
                {{-- Thong bao them san pham --}}
                @if (Session::has('them'))
                    <p style="color: green" class="text-center">
                        {{ Session::get('them') }}
                    </p>
                @endif
                @if (Session::has('error-them'))
                    <p style="color: red" class="text-center">
                        {{ Session::get('error-them') }}
                    </p>
                @endif
                <form action="{{ route('add-product-type') }}" method="POST">
                    @csrf
                    <div class="form-group">
                    <label for="exampleInputTenloai">Tên loại</label>
                    <input type="text" name="tenLoai" class="form-control" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Nhập tên loại sản phẩm...">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    {{-- In ra thong bao hoi admin co muon xoa san pham khong --}}
    <script>
        function xoa(){
            const a = confirm('Bạn có muốn xóa không?');
            if (a==true){
                return true;
            }
            return false;
        }
    </script>
@endsection
