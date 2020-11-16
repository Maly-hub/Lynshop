<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\NhanVienModel;
use Auth;
use Hash;
class Authcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewRegister()
    {
        return view ('admin.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function xuLyDangKy(Request $request)
    {
        $hoTen = $request->hoTen;
        $sdt = $request->sdt;
        $tenDangNhap =  $request->tenDangNhap;
        $matKhau1 = $request->matKhau1;
        $matKhau2 = $request->matKhau2;

        if ($matKhau1 != $matKhau2)
        {
            Session::flash('alert-password','Mật khẩu không trùng khớp');
            return redirect()->back();
        }
        else
        {
            $user = new NhanVienModel();
            $user->nv_hoten = $hoTen;
            $user->nv_sdt = $sdt;
            $user->q_id = 2;
            $user->username = $tenDangNhap;
            $user->password = Hash::make($matKhau1);
            //Save lai
            $user->save();
            return redirect()->route('login-admin');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function viewLogin()
    {
        if (Auth::guard('nhanvien')->check()){
            return redirect()->route('product');
        }
        return view('admin.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('nhanvien')->logout();
        return redirect()->route('login-admin');
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
    public function xuLyDangNhap(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $arr = [
            'username' => $username,
            'password' => $password
        ];

        if (Auth::guard('nhanvien')->attempt($arr))
        {
            return redirect()->route('product');
        }
        else {
            dd ('Tài khoản và mật khẩu không chính xác');
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
        //
    }
}
