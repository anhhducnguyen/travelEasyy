<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function account()
    {
        $user = Auth::user();
        
        if ($user->role === 'admin') {
            return back();
        }
        $addresses = Address::where('idAddress', $user->idAddress)->get();

        return view('fe.profile.account', compact('addresses'));
    }
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

        $existingAddress = $existingAddress = DB::table('tbladdress')->where('idAddress', $user->idAddress)->first();

        if ($existingAddress) {
            DB::table('tbladdress')->where('idAddress', $existingAddress->idAddress)->update([
                'city' => $data['city'],
                'district' => $data['district'],
                'ward' => $data['ward'],
                'detailAddress' => $data['detailAddress'],
            ]);

            $idAddress = $existingAddress->idAddress;
        } else {
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

        DB::table('users')->where('id', $user->id)->update([
            'phone' => $request->phone,
            'idAddress' => $idAddress,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
