<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function register()
    {
        return view('fe.registerr');
    }

    public function store(Request $req)
    {
        // dd(bcrypt($req->password));
        $req->merge(['password'=>bcrypt($req->password)]);
        try {
            User::create($req->all());
        } catch (\Throwable $th){
            dd($th);
        }
        // dd($req->all());
        return view('register');
    }
}
