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
        return view('account.registerr');
    }
    public function login()
    {
        return view('account.login');
    }
    public function account()
    {
        // $user = Auth::user();
        // // return view('fe.account');
        // $addresses = DB::table('tbladdress')
        // ->where('idAddress', $user->id)
        // ->get();

        $user = Auth::user();
        // return view('fe.account');
        $addresses = DB::table('tbladdress')
        ->where('idAddress', $user->idAddress)
        ->get();

        return view('fe.profile.account', compact('addresses'));
    }
    public function showChangePasswordForm()
    {
        return view('fe.password.change-password');
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
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:4|confirmed',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('loginn')->with('error', 'User not authenticated');
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }
        Auth::logout();
        DB::table('users')->where('id', $user->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('loginn')->with('success', 'Password changed successfully');
    }

    public function forgot_password()
    {
        return view('account.forgot_password');
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
        return redirect()->route('loginn')->with('success', 'Change password in successfully');
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

    // ============================================================================
public function updateProfile(Request $request)
{
    $data = $request->validate([
        'phone' => 'required|string|max:15',
        'city' => 'required|string|max:50',
        'district' => 'required|string|max:50',
        'ward' => 'required|string|max:50',
        'detailAddress' => 'nullable|string|max:50',
    ]);

    $user = Auth::user();

    // Kiểm tra xem người dùng đã có địa chỉ hay chưa
    $existingAddress = $existingAddress = DB::table('tbladdress')->where('idAddress', $user->idAddress)->first();

    if ($existingAddress) {
        // Địa chỉ đã tồn tại, chỉ cập nhật thông tin
        DB::table('tbladdress')->where('idAddress', $existingAddress->idAddress)->update([
            'city' => $data['city'],
            'district' => $data['district'],
            'ward' => $data['ward'],
            'detailAddress' => $data['detailAddress'],
        ]);

        $idAddress = $existingAddress->idAddress;
    } else {
        // Địa chỉ không tồn tại, tạo địa chỉ mới
        $maxId = DB::table('tbladdress')->max('idAddress');
        $newId = $maxId + 1;

        DB::table('tbladdress')->insert([
            'idAddress' => $newId,
            'city' => $data['city'],
            'district' => $data['district'],
            'ward' => $data['ward'],
            'detailAddress' => $data['detailAddress'],
        ]);

        $idAddress = $newId;
    }

    // Cập nhật thông tin người dùng
    DB::table('users')->where('id', $user->id)->update([
        'phone' => $request->phone,
        'idAddress' => $idAddress,
    ]);

    return redirect()->back()->with('success', 'Profile updated successfully.');
}

}







