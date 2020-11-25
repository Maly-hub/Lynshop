@extends('client.template.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 order-1">
                <div class="image_selected">
                    <img src="{{ asset('hinhanhsanpham') }}/{{ $sanPham->sp_hinhanh }}" style="width:450px;height:450px">
                </div>
            </div>
            <!-- Description -->
            <div class="col-6 order-2">
                <div class="product_description">
                    <div class="product_name">Tên sản phẩm: {{ $sanPham->sp_ten }}</div></br>
                    <div class="product_price">Giá Sản Phẩm: {{ number_format($sanPham->sp_gia) }}đ</div></br>
                    <div class="product_number">Số Lượng Sản Phẩm: {{ $sanPham->sp_soluong }}</div></br>
                        {{-- <div>
                            <button type="button" class="btn btn-primary mt-3"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Thêm vào giỏ</button>
                            <button   type="button" class="btn btn-danger mt-3 ml-3" >Mua ngay</button>
                        </div> --}}
                        <div >
                            <div class="btn btn-success mt-5" >
                                    <a href="{{ route('home-client') }}" style="color:honeydew">
                                    <i class="fa fa-undo" aria-hidden="true"></i>  Trở về
                                </a>
                            </div>
                        </div>
                        </br>
                    </div>
                </div>
                <div class="col-12 mt-5 order-3">
                    <h4><b>Mô tả sản phẩm:</b> </h4>
                    <p>{!! $sanPham->sp_mota !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection





