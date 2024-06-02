<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    // ===================================ACCOUNT=============================================
    // public function account(Request $request)
    // {
    //     // Kiểm tra xem có khách hàng nào đã đăng nhập không
    //     $customer = $request->session()->get('customer');

    //     if (!$customer) {
    //         // Không có khách hàng đăng nhập, có thể chuyển hướng hoặc trả về thông báo lỗi
    //         return response()->json(['message' => 'Bạn chưa đăng nhập!'], 401);
    //     }

    //     // Khách hàng đã đăng nhập, trả về thông tin của họ
    //     // return response()->json($customer);
    //     return view('account', ['customers' => $customer]);
    // }
    

    // ===================================END ACCOUNT=========================================

    // ==================================REGISTER===========================================

    // public function register(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:50',
    //         'phone' => 'nullable|string|max:15',
    //         'email' => 'required|string|email|max:50',
    //         'password' => 'required|string|max:50',
    //     ]);
    //     $emailExists = CustomerModel::where('email', $validated['email'])->exists();
    //     if ($emailExists) {
    //         return response()->json(['message' => 'Email đã tồn tại!'], 400);
    //     }
    //     $newId = 'CUS' . str_pad(CustomerModel::count() + 1, 4, '0', STR_PAD_LEFT);
    //     $validated['idCustomer'] = $newId;
    //     $validated['idAddress'] = null;
    //     $validated['password'] = md5($validated['password']);
    //     $customer = CustomerModel::insertCustomer($validated);

    //     $filePath = storage_path('app/customers.json');

    //     if (file_exists($filePath)) {
    //         $customers = json_decode(file_get_contents($filePath), true);
    //     } else {
    //         $customers = [];
    //     }

    //     $customers[] = $validated;

    //     file_put_contents($filePath, json_encode($customers, JSON_PRETTY_PRINT));


    //     return response()->json(['message' => 'Đăng ký thành công!'], 201);
    // }
    public function register(Request $request)
    {
    $validated = $request->validate([
        'name' => 'required|string|max:50',
        'phone' => 'nullable|string|max:15',
        'email' => 'required|string|email|max:50|unique:tblcustomer,email',
        'password' => 'required|string|max:50',
    ]);

    // Hash the password
    $validated['password'] = bcrypt($validated['password']);

    // Save the user
    $newId = 'CUS' . str_pad(CustomerModel::count() + 1, 4, '0', STR_PAD_LEFT);
    $validated['idCustomer'] = $newId;
    $validated['idAddress'] = null;
    $customer = CustomerModel::create($validated);

    return response()->json(['message' => 'Đăng ký thành công!'], 201);
}
    // ==================================END REGISTER=======================================

    // ==================================LOGIN==============================================

    // public function login(Request $request)
    // {
        
    //     $validated = $request->validate([
    //         'email' => 'required|string|email|max:50',
    //         'password' => 'required|string|max:50',
    //     ]);

    //     $customer = CustomerModel::where('email', $validated['email'])->first();
    //     if (!$customer || $customer->password !== md5($validated['password'])) {
    //         return response()->json(['message' => 'Thông tin đăng nhập không chính xác!'], 400);
    //     }

    //     // Lưu thông tin khách hàng vào phiên
    //     $request->session()->put('customer', $customer);

    //     return response()->json(['message' => 'Đăng nhập thành công!', 'name' => $customer->name], 200);
    // }

    // ==================================END LOGIN==========================================

    // ================================== LOG OUT===========================================
    // public function logout(Request $request)
    // {
    //     $request->session()->forget('customer');
    //     return Redirect::to('/');
    // }
    // ==================================END LOG OUT========================================
}


