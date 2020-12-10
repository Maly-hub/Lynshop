@extends('client.template.master')
@section('content')
<div class="row">
    <div class="col-12 text-center">
        <h4>Danh sách sản phẩm</h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
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
                @foreach ($product as $item)
                    <tr>
                        <th>{{$i++}}</th>
                        <th scope="row">{{ $item->sp_id }}</th>
                        <td>{{ $item->sp_ten }}</td>
                        <td>
                            <a href="{{ route('repair-type', ['id'=> $item->sp_id]) }}" class="btn btn-success">Sửa</a>
                            <a href="{{ route('delete-type', ['id' => $item->sp_id]) }}" class="btn btn-danger" onclick="return xoa()">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    function xoa(){
        const a = confirm('Ban co muon xoa loai nay khong ?');
        if (a==true){
            return true;
        }
        return false;
    }
</script>
@endsection
