<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    // ===================================INDEX=============================================
    public function index()
    {
        $customers = CustomerModel::getCustomer();
        dd($customers);
    }
    // ===================================END INDEX=========================================

    // ==================================REGISTER===========================================

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'phone' => 'nullable|string|max:15',
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|max:50',
        ]);
        $emailExists = CustomerModel::where('email', $validated['email'])->exists();
        if ($emailExists) {
            return response()->json(['message' => 'Email đã tồn tại!'], 400);
        }
        $newId = 'CUS' . str_pad(CustomerModel::count() + 1, 4, '0', STR_PAD_LEFT);
        $validated['idCustomer'] = $newId;
        $validated['idAddress'] = null;
        $validated['password'] = md5($validated['password']);
        $customer = CustomerModel::insertCustomer($validated);

        // Save to JSON file
        $filePath = storage_path('app/customers.json');

        // Check if the file exists
        if (file_exists($filePath)) {
            $customers = json_decode(file_get_contents($filePath), true);
        } else {
            $customers = [];
        }

        // Append new customer data
        $customers[] = $validated;

        // Save back to the file
        file_put_contents($filePath, json_encode($customers, JSON_PRETTY_PRINT));


        return response()->json(['message' => 'Đăng ký thành công!'], 201);
    }
    // ==================================END REGISTER=======================================

    // ==================================LOGIN==============================================

    public function login_1(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|max:50',
        ]);

        $customer = CustomerModel::where('email', $validated['email'])->first();
        if (!$customer || $customer->password !== md5($validated['password'])) {
            return response()->json(['message' => 'Thông tin đăng nhập không chính xác!'], 400);
        }

        // Store customer information in the session
        Session::put('customer', $customer);

        return response()->json(['message' => 'Đăng nhập thành công!'], 200);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|max:50',
        ]);

        $customer = CustomerModel::where('email', $validated['email'])->first();
        if (!$customer || $customer->password !== md5($validated['password'])) {
            return response()->json(['message' => 'Thông tin đăng nhập không chính xác!'], 400);
        }

        // Store customer information in the session
        Session::put('customer', $customer);

        return response()->json(['message' => 'Đăng nhập thành công!', 'name' => $customer->name], 200);
    }
    // ==================================END LOGIN==========================================
}






















// Tạo một mảng chứa dữ liệu của bản ghi để xuất ra JSON
        // $customerData = $customer->toArray();

        // $existingData = [];
        // if (Storage::exists('customer_data.json')) {
        //     $existingData = json_decode(Storage::get('customer_data.json'), true);
        // }
        // // Thêm dữ liệu mới vào mảng dữ liệu đã tồn tại
        // $existingData[] = $validated;
        // // Lưu dữ liệu mới xuống tệp JSON
        // Storage::put('customer_data.json', json_encode($existingData, JSON_PRETTY_PRINT));
        // // Trả về một JSON response hoặc redirect tùy thuộc vào yêu cầu của bạn
        // return response()->json(['success' => true, 'customer' => $validated], 201);