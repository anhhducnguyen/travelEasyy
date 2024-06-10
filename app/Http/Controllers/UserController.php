<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function register()
    {
        return view('fe.registerr');
    }
    public function login()
    {
        return view('fe.login');
    }
    public function account()
    {
        return view('fe.account');
    }

    public function store(Request $req)
    {
        $req->merge(['password'=>bcrypt($req->password)]);
        try {
            User::create($req->all());
        } catch (\Throwable $th){
            // dd($th);
        }
        return redirect()->route('index');
        // return view('fe.login');
    }
    public function storeLogin(Request $req)
    {
       if(Auth::attempt(['email'=>$req->email,'password'=>$req->password]))
       {
            return redirect()->route('index');
       } else {
            return redirect()->back()->with('error','Đăng nhập thất bại');
       }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
    public function logout_up()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
