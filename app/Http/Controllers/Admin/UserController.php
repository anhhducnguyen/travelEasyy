<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('address')->where('role','user')->get();
        return view('admin.users.index', compact('users'));
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    // public function create()
    // {
    //     //
    // }


    // public function store(Request $request)
    // {
    //     //
    // }


    // public function show(User $user)
    // {
    //     return view('admin.users.show', compact('user'));
    // }


    // public function edit(User $user)
    // {
    //     //
    // }


    // public function update(Request $request, User $user)
    // {
    //     //
        
    // }



}
