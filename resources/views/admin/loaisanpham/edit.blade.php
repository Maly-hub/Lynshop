@extends('admin.template.master')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 text-center ">
                <h1 class="m-0 text-dark">Sửa Loại Sản Phẩm {{ $productType->l_id }}</h1>
            </div>
            <div class="col-12">
                <form action="{{ route('handle-repair-type', ['id'=>$productType->l_id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInpuTenLoai">Tên Loại</label>
                        <input type="text" autocomplete="off" value="{{ $productType->l_ten }}" name="tenLoai" class="form-control" id="exampleInpuTenloai" aria-describedby="tenLoaiHelp" placeholder="Nhập tên loại...">
                    </div>
                    <button type="submit" class="btn btn-success">Sửa</button>
                </form>
            </div>
        </div>
    </div>
@endsection
