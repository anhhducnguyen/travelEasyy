<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\passwordResetTokens;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('fe.password.change-password');
    }
    public function forgot_password()
    {
        return view('account.forgot_password');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:4|confirmed',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not authenticated');
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }
        Auth::logout();
        DB::table('users')->where('id', $user->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('login')->with('success', 'Password changed successfully');
    }
    public function reset_password($token)
    {
        
        $tokenData = passwordResetTokens::checkToken($token);  
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
        // dd($check);
        return redirect()->route('login')->with('success', 'Change password in successfully');
    }
    public function check_forgot_password(Request $req)
    {
        $req->validate([
            'email' => 'required|exists:users',
        ]);

        $user = User::where('email', $req->email)->first();
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
            return redirect()->back()->with('success', 'Please check your email to change your password');
        }

        return redirect()->back()->with('no', 'Something successfully');
    }
}
