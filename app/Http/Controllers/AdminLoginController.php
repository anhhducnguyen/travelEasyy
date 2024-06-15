<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function show_login()
    {
        return view('login_admin');
    }
}
