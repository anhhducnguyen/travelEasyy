<?php
namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function show_login()
    {
        return view('account.login_admin');
    }

    public function check_login(Request $req)
    {
        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password,'role'=>'admin']))
        {
                return redirect('admin');
        } 
        return redirect()->back()->with('error', 'Login failed, please log in again!'); 
    }
}
