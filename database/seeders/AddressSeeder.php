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
        ];

        foreach ($addresses as $address) {
            DB::table('addresses')->insert([
                'city' => $address['city'],
                'district' => $address['district'],
                'ward' => $address['ward'],
                'detailAddress' => $address['detailAddress'],
            ]);
        }
    }
}
