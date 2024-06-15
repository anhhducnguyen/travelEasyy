<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show_login()
    {
        return view('login_admin');
    }

    public function storeLogin(Request $req)
    {
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password, 'role' => 'admin']))
        {
            return redirect()->route('index')->with('success', 'Đăng nhập thành công');
        }
        else
        {
            return redirect()->back()->with('error', 'Đăng nhập thất bại, vui lòng thử lại!');
        }
    }
}
