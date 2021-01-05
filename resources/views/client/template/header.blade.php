<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-md-9">
                    <div id="colorlib-logo"><a href="index.html">Lynshop</a></div>
                </div>
                <div class="col-sm-5 col-md-3">
                {{--  <form action="#" class="search-wrap">
                   <div class="form-group">
                      <input type="search" class="form-control search" placeholder="Tìm kiếm">
                      <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
                   </div>
                </form>  --}}
             </div>
         </div>
            <div class="row">
                <div class="col-sm-12 text-left menu-1">
                    <ul>
                        <li class="active"><a href="{{ route('home-client')}}">Trang chủ</a></li>
                        {{-- <li class="has-dropdown">
                            <a href="men.html">Nam</a>
                            <ul class="dropdown">
                                <li><a href="product-detail.html">Product Detail</a></li>
                                <li><a href="cart.html">Shopping Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="order-complete.html">Order Complete</a></li>
                                <li><a href="add-to-wishlist.html">Wishlist</a></li>
                            </ul>
                        </li>
                        <li><a href="women.html">Nữ</a></li> --}}
                        <li class="has-dropdown">
                            <a href="">Danh Mục Sản Phẩm</a>
                            <ul class="dropdown">
                                @foreach ($loaiSanPham as $item)
                                    <li><a href="{{ route('get-product-in-category', ['idCategory'=>$item->l_id]) }}">{{ $item->l_ten }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('login-client') }}">Đăng nhập</a></li>
                        {{-- <li><a href="{{ route('register-client')}}">Đăng ký</a></li> --}}
                        @if (Auth::guard('khachhang')->check())
                                <li class="list-group-item normal-border">Xin chào, <b>{{ Auth::guard('khachhang')->user()->username }}</b></li>
                    <li><a href="{{ route('donhang-kh',['idCus'=> Auth::guard('khachhang')->id()]) }}">Đơn hàng</a></li>
                        @endif
                        <li><a href="{{ route('logout-client')}}">Đăng xuất</a></li>
                        <li class="cart">
                            <a href="{{ route('cart') }}"><i class="icon-shopping-cart"></i> Giỏ hàng [{{ Cart::getTotalquantity() }}]</a>
                            <a href="{{ route('clear-cart') }}"><i class="icon-trash"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="sale">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center">
                    <div class="row">
                        <div class="owl-carousel2">
                            <div class="item">
                                <div class="col">
                                    <h3><a href="#">Giảm 25% (Hầu như) Mọi thứ! Mã sử dụng: Giảm giá mùa hè</a></h3>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col">
                                    <h3><a href="#">Giảm giá 50% cho tất cả giày mùa hè</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
