@extends('admin.template.master')
@section('content')

<div class="row">

</div>

<div class="row">
	<div class="col-12 text-center">
		<h4>Chi tiết đơn hàng</h4>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<h3>Mã đơn: </h3>
        <p><b>Người nhận: </b>{{ $donHang->dh_nguoinhan }}</p>
        <p><b>Số điện thoại: </b>{{ $donHang->dh_sdt }}</p>
		<p><b>Địa chỉ: </b>{{ $donHang->dh_diachi }}</p>
		<p><b>Ngày đặt hàng: </b>{{ Carbon\Carbon::parse($donHang->created_at)->format('d/m/Y') }}</p>
        <form action="{{ route('cap-nhat-trang-thai', ['idDonHang'=> $donHang->dh_id]) }}" method="GET">
            <div class="form-group col-md-2" style="padding-left: 0px">
                <h4><b>Trạng thái</b></h4>
                <select class="form-control" name="trangThai">
                    <option value="1" {{ $donHang->dh_trangthai == '1' ? 'selected' : '' }}>Đang duyệt</option>
                    <option value="2" {{ $donHang->dh_trangthai == '2' ? 'selected' : '' }}>Đã duyệt</option>
                    <option value="3" {{ $donHang->dh_trangthai == '3' ? 'selected' : '' }}>Đang giao</option>
                    <option value="4" {{ $donHang->dh_trangthai == '4' ? 'selected' : '' }}>Đã giao</option>
                </select>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Cập nhật trạng thái</button>
        </form>
	</div>
</div>

<div class="row">
	<div class="col-12 text-center">
		<h4>Danh sách sản phẩm</h4>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Tên sản phẩm</th>
					<th scope="col">Ảnh Sản phẩm</th>
					<th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
				</tr>
			</thead>
			<tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($sanPhamDonHang as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->sp_ten}}</td>
                        <td>
                            <img src="{{asset('hinhanhsanpham')}}/{{$item->sp_hinhanh}}" style="width: 100px" alt="hinh loi k ra">
                        </td>
                        <td>{{number_format($item->sp_gia)}}</td>
                        <td>{{$item->ctdh_soluong}}</td>
                        <td>{{$item->ctdh_soluong * $item->sp_gia}}</td>
                    </tr>
                @endforeach
                <td colspan="5" style="text-align: right"><b>Tổng tiền: </b></td>
                <td><b>{{number_format($donHang->dh_tongtien)}}</b></td>
			</tbody>
		</table>
	</div>
</div>
@endsection
