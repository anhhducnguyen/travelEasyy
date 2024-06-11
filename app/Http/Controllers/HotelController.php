<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\hotelModel;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = hotelModel::getCustomer();
        dd($hotels);
        // return view('hotel.index', compact('hotels'));
    }
    public function insert(){
        $hotelData = [
            'idHotel' => 4, 
            'idAddress' => 1, 
            'name' => 'Awesome Hotel',
        ];
        
        // Thêm khách sạn vào cơ sở dữ liệu
        hotelModel::create($hotelData);
        
        echo "Dữ liệu khách sạn đã được thêm vào cơ sở dữ liệu.";
    }
    public function update(){
        $hotel = hotelModel::where('idHotel', '4')->first();
        // Kiểm tra xem khách sạn có tồn tại không
        if ($hotel) {
            // Cập nhật thông tin mới cho khách sạn
            $hotel->idAddress = 2; // Cập nhật địa chỉ mới
            $hotel->name = 'Updated Hotel Name'; // Cập nhật tên mới

            // Lưu các thay đổi vào cơ sở dữ liệu
            $hotel->save();

            echo "Thông tin của khách sạn đã được cập nhật thành công.";
        } else {
            echo "Không tìm thấy khách sạn.";
        }
    }
    public function del(){
        // Tìm kiếm và xóa khách sạn với idHotel là 1
        $hotel = hotelModel::find(4);

        // Kiểm tra xem khách sạn có tồn tại không
        if ($hotel) {
            // Xóa khách sạn
            $hotel->delete();

            echo "Khách sạn đã được xóa thành công.";
        } else {
            echo "Không tìm thấy khách sạn.";
        }

    }
    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request
        $keyword = $request->input('Awesome');

        // Tìm kiếm khách sạn với tên gần đúng
        $hotels = hotelModel::where('name', 'like', '%' . $keyword . '%')->get();
        dd($hotels);

        // Trả về kết quả dưới dạng JSON
        // return response()->json($hotels);
    }
    
}
