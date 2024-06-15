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
                'city' => 'Thành phố Hà Nội',
                'district' => 'Quận Ba Đình',
                'ward' => 'Phường Điện Biên',
                'detailAddress' => '789 Dien Bien',
            ],
            [
                'city' => 'Thành phố Hà Nội',
                'district' => 'Quận Ba Đình',
                'ward' => 'Phường Ngọc Hà',
                'detailAddress' => '357 Ngoc Ha',
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
