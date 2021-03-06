@extends('client.template.master')
@section('content')
    <div class="col-12">
        <h1 class="text-center">Giỏ hàng</h1>
        <table class="table">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Giá</th>
                <th>Thao tác</th>
            </tr>
            @php
                $stt = 1;
            @endphp
            @foreach ($cartCollection as $item)
                <tr>
                    <td>{{ $stt++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        <p id="donGia">{{ number_format($item->price) }}</p>
                    </td>
                    <td>
                        <p id="gia" data-id="1">{{ number_format($item->getPriceSum()) }}</p>
                    </td>
                    <td>
                        <a href="{{ route('clear-one-product', ['idProduct'=>$item->id]) }}" class="btn btn-danger">X</a>
                    </td>
                </tr>
            @endforeach
                <tr>
                    <td colspan="3"><b>Tổng tiền: </b>{{ number_format(Cart::getSubTotal()) }} đ</td>
                    {{-- <td colspan="1"><a class="btn btn-primary" href="#">Cập nhật</a></td> --}}
                </tr>
        </table>
        <td colspan="1"><a class="btn btn-primary" href="{{ route('thanh-toan') }}">Thanh toán</a></td>
    </div>
@endsection
