<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
class TrangChuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanPham = DB::table('sanpham')->get();
        return view ('client.index', compact('sanPham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sanPham = DB::table('sanpham')
                        ->where('sp_id',$id)
                        ->join('loaisanpham','loaisanpham.l_id','sanpham.l_id')->first();
        return view ('client.detail', compact('sanPham'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cart()
    {
        //Lấy nội dung của giỏ hàng ra
        $cartCollection = Cart::getContent();
        return view('client.cart',compact('cartCollection'));
    }

    public function clearCart(){
        Cart::clear();
        return redirect()->back();
    }

    //Xoa mot san pham trong gio hang
    public function clearOneProduct($idProduct){
        //Xoa mot san pham co id truyen vao
        Cart::remove($idProduct);
        return redirect()->back();
    }

    public function addtoCart($idProduct){
        //đầu vào nhận id sản phẩm sau đó dựa vào id tìm thông tin sản phẩm
        $product = DB::table('sanpham')->where('sp_id',$idProduct)->first();
        //sử dụng hàm add của thư viện
        Cart::add($product->sp_id, $product->sp_ten, $product->sp_gia,1);
        return redirect()->back();
    }

    public function addMoreProductToCart(Request $request, $idProduct)
    {
        $soLuong = $request->get('soLuong');
        dd($soLuong);
        // $product = DB::table('sanpham')->where('sp_id',$idProduct)->first();
        // Cart::add($product->sp_id, $product->sp_ten, $product->sp_gia,$soLuong);
        // return redirect()->back();
    }

    public function getProduct($idCategory){
        $product = DB::table('sanpham')->where('l_id',$idCategory)->get();
        dd($product);
    }
}
