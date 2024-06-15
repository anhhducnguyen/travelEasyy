<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListTourController extends Controller
{
    public function listings()
    {
        return view('fe.listingsPage');
    }
}
