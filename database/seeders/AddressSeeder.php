<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [
            [
                'city' => 'Thành phố Hà Nội',
                'district' => 'Quận Ba Đình',
                'ward' => 'Phường Phúc Xá',
                'detailAddress' => '123 Phuc Xa',
            ],
            [
                'city' => 'Thành phố Hà Nội',
                'district' => 'Quận Ba Đình',
                'ward' => 'Phường Liễu Giai',
                'detailAddress' => '456 Lieu Giai',
            ],
            [
                'city' => 'Tỉnh Hưng Yên',
                'district' => 'Huyện Văn Lâm',
                'ward' => 'Thị trấn Như Quỳnh',
                'detailAddress' => 'To 1',
            ],
            [
                'city' => 'Tỉnh Hưng Yên',
                'district' => 'Huyện Văn Lâm',
                'ward' => 'Xã Chỉ Đạo"',
                'detailAddress' => 'To 5',
            ],
            [
                'city' => 'Tỉnh Quảng Ngãi',
                'district' => 'Huyện Bình Sơn',
                'ward' => 'Xã Bình Thuận"',
                'detailAddress' => 'To 7',
            ],
            [
                'city' => 'Tỉnh Quảng Ngãi',
                'district' => 'Huyện Bình Sơn',
                'ward' => 'Xã Bình Đông',
                'detailAddress' => 'To 3',
            ],
            [
                'city' => 'Thành phố Hà Nội',
                'district' => 'Quận Ba Đình',
                'ward' => 'Phường Cống Vị',
                'detailAddress' => '234 Cong Vi',
            ],
            [
                'city' => 'Thành phố Hà Nội',
                'district' => 'Quận Ba Đình',
                'ward' => 'Phường Đội Cấn',
                'detailAddress' => '456 Doi Can',
            ],
            [
                'city' => 'Tỉnh Quảng Ninh',
                'district' => 'Thành phố Hạ Long',
                'ward' => 'Phường Bãi Cháy',
                'detailAddress' => 'Bai Chay',
            ],
            [
                'city' => 'Tỉnh Ninh Bình',
                'district' => 'Thành phố Ninh Bình',
                'ward' => 'Xã Trường Yên',
                'detailAddress' => 'Trang An',
            ],
            [
                'city' => 'Tỉnh Kiên Giang',
                'district' => 'Thành phố Phú Quốc',
                'ward' => 'Xã Gành Dầu',
                'detailAddress' => 'Bai Dai Phu Quoc',
            ],
            [
                'city' => 'Tỉnh Quảng Bình',
                'district' => 'Huyện Bố Trạch',
                'ward' => 'Thị trấn Phong Nha',
                'detailAddress' => 'Phong Nha Ke Bang',
            ],
            [
                'city' => 'Tỉnh Quảng Nam',
                'district' => 'Huyện Duy Xuyên',
                'ward' => 'Xã Duy Phú',
                'detailAddress' => 'My Son',
            ],
            [
                'city' => 'Tỉnh Lai Châu',
                'district' => 'Huyện Tam Đường',
                'ward' => 'Thị xã Tam Đường',
                'detailAddress' => 'Phan Xi Pang',
            ],
        ];

        foreach ($addresses as $address) {
            DB::table('tbladdress')->insert([
                'city' => $address['city'],
                'district' => $address['district'],
                'ward' => $address['ward'],
                'detailAddress' => $address['detailAddress'],
            ]);
        }
    }
}
