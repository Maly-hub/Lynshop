<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaiSanPham = DB::table('loaisanpham')->get();
        //Lấy bảng sản phẩm join với bảng loại sản phẩm
        $sanPham = DB::table('sanpham')
                ->join('loaisanpham','loaisanpham.l_id','sanpham.l_id')
                ->get();
        //dd ($sanPham);
        return view ('admin.sanpham.index', compact('loaiSanPham','sanPham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $tenSanPham = $request->tenSanPham;
            $danhMuc = $request->danhMuc;
            $gia = $request->gia;
            $moTa = $request->moTa;
            $soLuong = $request->soLuong;
            $tenLoai = $request->tenLoai;
            $hinhAnh = $request->hinhAnh;

            //Lấy tên file upload lên
            if ($hinhAnh != null){
                $tenHinhAnh = $hinhAnh->getClientOriginalName();
                $hinhAnh->move('hinhanhsanpham', $tenHinhAnh);
                $addSanPham = DB::table('sanpham')->insert([
                    'sp_ten' => $tenSanPham,
                    'l_id' => $tenLoai,
                    'sp_hinhanh' =>$tenHinhAnh,
                    'sp_soluong' =>$soLuong,
                    'sp_mota' => $moTa,
                    'sp_gia' => $gia,
                    'sp_gioitinh' =>$danhMuc
                ]);
            }
            else{
                $addSanPham = DB::table('sanpham')->insert([
                    'sp_ten' => $tenSanPham,
                    'l_id' => $tenLoai,
                    'sp_soLuong' => $soLuong,
                    'sp_gia' => $gia,
                    'sp_mota' => $moTa,
                    'sp_gioitinh' =>$danhMuc
                ]);
            }
            Session::flash('alert-them', 'Thêm thành công');
            return redirect()->route('product');
        }
        catch(\Throwable $th){
            Session::flash('error-them', 'Có lỗi trong quá trình thêm');
            return redirect()->route('product');
        }

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
        return view('admin.sanpham.detail', compact('sanPham'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhSachLoai = DB::table('loaisanpham')->get();
        $sanPham = DB::table('sanpham')
                        ->where('sp_id',$id)
                        ->join('loaisanpham','loaisanpham.l_id','sanpham.l_id')
                        ->first();
        return view('admin.sanpham.edit', compact('sanPham','danhSachLoai'));
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
        $tenSanPham = $request->tenSanPham;
        $hinhAnh = $request->hinhAnh;
        $loaiSanPham = $request->tenLoai;
        $danhMuc = $request->danhMuc;
        $gia = $request->giaSanPham;
        $soLuong = $request->soLuongSanPham;

        //Kiểm tra request hình ảnh nhận vào
        //hình ảnh rỗng
        if ($hinhAnh == '') {
            $editSanPham = DB::table('sanpham')->where('sp_id',$id)->update(
                [
                    'sp_ten' => $tenSanPham,
                    'l_id' => $loaiSanPham,
                    'sp_gia' => $gia,
                    'sp_soluong' => $soLuong,
                    'sp_gioitinh' => $danhMuc
                ]
            );
            return redirect()->route('product');
        }
        // có request hình ảnh
        else {
             $tenHinhAnh = $hinhAnh->getClientOriginalName();
             $hinhAnh->move('hinhanhsanpham', $tenHinhAnh);
             $editSanPham = DB::table('sanpham')->where('sp_id',$id)->update(
                 [
                     'sp_ten' => $tenSanPham,
                     'l_id' => $loaiSanPham,
                     'sp_hinhanh' => $tenHinhAnh,
                     'sp_gia' =>$gia,
                     'sp_soluong' => $soLuong,
                     'sp_gioitinh' => $danhMuc
                 ]
            );
            return redirect()->route('product');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $delsp = DB::table('sanpham')->where('sp_id',$id)->delete();
            Session::flash('alert-xoa','Xóa thành công');
            return redirect()->route('product');
        } catch (\Throwable $th) {
            Session::flash('error-xoa','Xóa không thành công');
            return redirect()->route('product');
        }
    }
}
