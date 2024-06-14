<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Address;

class CustomerController extends Controller
{
    public function index()
    {
        // $users = User::all();
        $users = User::with('address')->get();
        // dd($users);
        return view('admin.customer.index', compact('users'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
        ]);

        return redirect()->route('admin.customer.index');
    }

    public function destroy($id)
    {
        $tourGuide = User::findOrFail($id);
        $tourGuide->delete();
        return redirect()->route('admin.customer.index');
    }
}