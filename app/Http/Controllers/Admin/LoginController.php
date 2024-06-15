<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.index');
    }
    public function storeLogin(Request $req)
    {
       if(Auth::attempt(['email'=>$req->email,'password'=>$req->password,'role'=>'admin']))
       {
            return redirect()->route('index')->with('success','Logged in successfully');
       } else {
            return redirect()->back()->with('error','Login failed, please log in again!');
       }
    }
}
