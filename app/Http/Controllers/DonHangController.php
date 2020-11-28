<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function donHang()
    {
        $donHang = DB::table('donhang')->get();
        return view ('admin.donhang.donhang', compact('donHang'));
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
    public function chiTietDonHang($idDonHang)
    {
        // Lấy thông tin đơn hàng
        $donHang = DB::table('donhang')->where('dh_id', $idDonHang)->first();
        // Lấy thông tin sản phẩm trong đơn hàng
        $sanPhamDonHang = DB::table('chitietdonhang')
            ->join('sanpham','sanpham.sp_id','chitietdonhang.sp_id')
            ->where('chitietdonhang.dh_id', $idDonHang)
            ->get();
        return view ('admin.donhang.chitietdon', compact('donHang','sanPhamDonHang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function capNhatTrangThai($idDonHang, Request $request)
    {
        $donHang = DB::table('donhang')->where('dh_id', $idDonHang)->update([
            'dh_trangthai' => $request->get('trangThai')
        ]);
        return redirect()->back();
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
}
