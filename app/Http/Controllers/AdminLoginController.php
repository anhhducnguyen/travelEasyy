<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function show_login()
    {
        return view('account.login_admin');
    }

    public function check_login(Request $req)
    {
        // Validate the login form data
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        // ]);

        // if(Auth::attempt(['email'=>$req->input('email'),'password'=>$req->input('password')]))
        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password,'role'=>'admin']))
        {
                return redirect('admin');
        } 
        return redirect()->back()->with('error', 'Login failed, please log in again!'); 
    }
}
