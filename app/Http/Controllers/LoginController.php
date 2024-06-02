<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('fe.homePage');
    }
    public function checkLogin()
    {
        if (!Auth::check()) {
            return Redirect::to('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
    
    public function validateUser(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication passed
            $request->session()->regenerate();
            return response()->json([
                'status' => 'success',
                'message' => 'Login successful',
                'user' => [
                    'name' => Auth::user()->name,
                ],
            ]);
        } else {
            // Authentication failed
            return response()->json([
                'status' => 'error',
                'message' => 'The provided credentials do not match our records.',
            ], 401);
        }
    }

    public function register(Request $req)
    {
        // dd(bcrypt($req->password));
        $req->merge(['password'=>bcrypt($req->password)]);
        try {
            User::create($req->all());
        } catch (\Throwable $th){
            dd($th);
        }
        // dd($req->all());
        return Redirect::to('/');
    }
}
