<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Mail\VerifyAccount;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class AccountController extends Controller
{

    public function register()
    {
        return view('account.registerr');
    }
    public function login()
    {
        return view('account.login');
    }
    public function store(Request $req)
    {
        $req->merge(['password'=>bcrypt($req->password)]);
        try {
            if ($acc = User::create($req->all())){
                Mail::to($req->email)->send(new VerifyAccount($acc));
                return redirect()->route('loginn')->with('success','Your Account has been created succesfully!! Please check your email to confirm your email address in order to activate your account.');
            }
        } catch (\Throwable $th){
            // dd($th);
            return back()->with('error', 'There was an error creating your account. Please try again.');
        }
    }
    public function verify($email)
    {
        $acc = User::where('email', $email)->whereNull('email_verified_at')->firstOrFail();
        User::where('email', $email)->update(['email_verified_at'=>date('Y-m-d')]);
        return redirect()->route('loginn')->with('success','Your account has been activated! Now, you can login.');
    }
    public function storeLogin(Request $req)
    {
        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->email_verified_at) {
                return redirect()->route('index')->with('success', 'Logged in successfully');
            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'Your email address is not verified. Please check your email.');
            }
        } else {
            return redirect()->back()->with('error', 'Login failed, please log in again!');
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







