<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class LoaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorylist = DB::table('loaisanpham')->get();
        return view ('admin.loaisanpham.index', compact('categorylist'));
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
        try {
            $addLoai = DB::table('loaisanpham')->insert(
                [
                    'l_ten' => $request->tenLoai
                ]
                );
            Session::flash('them', 'Thêm thành công');
            //dd ('Them thanh cong');
            return redirect()->route('category-list');
        } catch (\Throwable $th) {
            Sesion::flash('error-them', 'Có lỗi trong quá trình thêm');
            return redirect()->route('category-list');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productType = DB::table('loaisanpham')->where('l_id', $id)->first();
        return view('admin.loaisanpham.edit', compact('productType'));
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
        try {
            $updateType = DB::table('loaisanpham')->where('l_id', $id)->update([
                'l_ten' => $request->tenLoai
            ]);
            Session::flash('capnhat', 'Cập nhật thành công');
            return redirect()->route('category-list');
        } catch (\Throwable $th) {
            Session::flash('error-capnhat', 'Lỗi cập nhật');
            return redirect()->route('category-list');
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
            $delProductType = DB::table('loaisanpham')->where('l_id', $id)->delete();
            Session::flash('xoa', 'Xóa thành công');
            return redirect()->route('category-list');
        } catch (\Throwable $th) {
            Sesion::flash('error-xoa', 'Xóa không thành công');
            return redirct()->route('category-list');
        }
    }
}
