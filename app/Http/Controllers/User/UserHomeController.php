<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index()
    {
        $tours = Tour::where('endDay', '>', Carbon::now())->get();
        return view('fe.homePage', compact('tours'));
    }
}
