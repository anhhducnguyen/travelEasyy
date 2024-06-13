<?php

namespace App\Http\Controllers;

use App\Mail\VerifyAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


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
            if ($acc = User::create($req->all())){
                Mail::to($req->email)->send(new VerifyAccount($acc));
                return redirect()->route('login')->with('success','Your Account has been created succesfully!! Please check your email to confirm your email address in order to activate your account.');
            }
        } catch (\Throwable $th){
            // dd($th);
        }
    }
    public function verify($email)
    {
        $acc = User::where('email', $email)->whereNull('email_verified_at')->firstOrFail();
        User::where('email', $email)->update(['email_verified_at'=>date('Y-m-d')]);
        return redirect()->route('login')->with('success','Now, you can login');
    }
    public function storeLogin(Request $req)
    {
       if(Auth::attempt(['email'=>$req->email,'password'=>$req->password,'role'=>'user']))
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
