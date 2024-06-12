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
        return redirect()->route('login')->with('success','Register in successfully');
        // return view('fe.login');
    }
    public function storeLogin(Request $req)
    {
       if(Auth::attempt(['email'=>$req->email,'password'=>$req->password,'role'=>1]))
       {
            return redirect()->route('index')->with('success','Logged in successfully');
       } else {
            return redirect()->back()->with('error','Login failed, please log in again!');
       }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->back()->with('success','Logout in successfully');
    }
    public function logout_up()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
