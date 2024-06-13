<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Mail\VerifyAccount;
use App\Models\passwordResetTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
    public function showChangePasswordForm()
    {
        return view('fe.change-password');
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
        return redirect()->route('login')->with('success','Your account has been activated! Now, you can login.');
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
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not authenticated');
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        DB::table('users')->where('id', $user->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('account')->with('success', 'Password changed successfully');
    }

    public function forgot_password()
    {
        return view('account.forgot_password');
    }
    public function reset_password($token)
    {
        
        $tokenData = passwordResetTokens::checkToken($token);
        
        // $user = $tokenData->user; 
        // dd($user);   
        return view('account.reset_password',['token' => $token]);
    }

    public function check_reset_password($token)
    {
        request()->validate([
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password'
        ]);
        $tokenData = passwordResetTokens::checkToken($token);
        $user = $tokenData->user; 
        $data = [
            'password' => bcrypt(request(('password')))
        ];
        $check = $user->update($data);
        dd($check);
    }
    public function check_forgot_password(Request $req)
    {
        $req->validate([
            'email' => 'required|exists:users',
        ]);

        $user = User::where('email', $req->email)->first();
        // dd($user);
        $token = Str::random(50);
        $tokenData = [
            'email' => $req->email,
            'remember_token' => $token,
            'created_at' => now()
        ];
        if(
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $req->email],
                ['token' => $token, 'created_at' => now()]
            )
        ) 
        {
            Mail::to($req->email)->send(new ForgotPassword($user, $token));
            return redirect()->back()->with('success', 'Send changed successfully');
        }

        return redirect()->back()->with('no', 'Something successfully');
    }

}








