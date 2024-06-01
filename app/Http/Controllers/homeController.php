<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function index()
    {
        $customers = CustomerModel::getCustomer();
        dd($customers);
    }
    
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'phone' => 'nullable|string|max:15',
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|max:50',
        ]);

        // Kiểm tra xem email đã tồn tại chưa
        $emailExists = CustomerModel::where('email', $validated['email'])->exists();

        if ($emailExists) {
            // Trả về mã trạng thái 400 nếu email đã tồn tại
            return response()->json(['message' => 'Email đã tồn tại!'], 400);
        }

        // Tạo ID khách hàng mới
        $newId = 'CUS' . str_pad(CustomerModel::count() + 1, 4, '0', STR_PAD_LEFT);
        $validated['idCustomer'] = $newId;
        $validated['idAddress'] = null;

        // Mã hóa mật khẩu
        $validated['password'] = md5($validated['password']);

        // Thêm khách hàng vào cơ sở dữ liệu
        $customer = CustomerModel::insertCustomer($validated);

        // Trả về mã trạng thái 201 nếu đăng ký thành công
        return response()->json(['message' => 'Đăng ký thành công!'], 201);
    }
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