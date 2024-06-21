<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbltour')->insert([
            [
                'idTour' => 'TO1',
                'name' => 'Bai Chay',
                'startDay' => '2024-06-17',
                'endDay' => '2024-06-24',
                'cost' => 50,
                'imageTour' => 'assets/images/vinhhalong.jpg',
                'idAddress' => 9,
                'idHotel' => 'HT1',
                'idVehicle' => 'VH1',
                'idTourGuide' => 'TG1',
                'description' => 'Bai Chay, located in the northwest of Quang Ninh province, Vietnam, is one of the most famous tourist destinations in the Ha Long Bay area. This artificial beach stretches approximately 1,000 meters in length and 100 meters in width, featuring fine white sand and clear blue waters, attracting millions of visitors annually.

                Bai Chay offers a wide range of hotels, resorts, restaurants, and cafes with various prices and amenities, from luxury to budget-friendly options, catering to the needs of all visitors. The tourism services here are heavily invested and well-developed, ensuring the best experience for tourists.',
            ],
            [
                'idTour' => 'TO2',
                'name' => 'Trang An',
                'startDay' => '2024-07-01',
                'endDay' => '2024-07-10',
                'cost' => 70,
                'imageTour' => 'assets/images/trangan.jpg',
                'idAddress' => 10,
                'idHotel' => 'HT2',
                'idVehicle' => 'VH3',
                'idTourGuide' => 'TG2',
                'description' => 'Trang An, located in Ninh Bình province, Vietnam, is a renowned scenic area known for its stunning natural beauty and impressive cave system. Recognized by UNESCO as a dual World Heritage Site for both culture and nature, Trang An stands out with its majestic limestone mountains, serene rivers winding through valleys, and underground caves. Visitors to Trang An can enjoy boat tours that offer the chance to marvel at the mystical beauty of the caves and explore significant historical and cultural sites such as Trinh Temple, Tran Temple, and Phu Khong.',
            ],
            [
                'idTour' => 'TO3',
                'name' => 'Phu Quoc',
                'startDay' => '2024-06-15',
                'endDay' => '2024-06-18',
                'cost' => 50,
                'imageTour' => 'assets/images/phuquoc.jpg',
                'idAddress' => 11,
                'idHotel' => 'HT3',
                'idVehicle' => 'VH2',
                'idTourGuide' => 'TG4',
                'description' => 'Phu Quoc is the largest island in Vietnam, located in the Gulf of Thailand, about 45 km off the southwest coast of mainland Vietnam. Known as the "Pearl Island," Phu Quoc is famous for its stunning white sandy beaches, crystal-clear waters, and pristine forests. It is an ideal destination for eco-tourism, scuba diving, and enjoying fresh seafood. Visitors can explore various attractions such as Vinpearl Safari, Dinh Cau Night Market, Duong Dong Night Market, and savor the renowned Phu Quoc fish sauce.',
            ],
            [
                'idTour' => 'TO4',
                'name' => 'Phong Nha Ke Bang',
                'startDay' => '2024-06-15',
                'endDay' => '2024-06-17',
                'cost' => 50,
                'imageTour' => 'assets/images/phongnhakebang.jpg',
                'idAddress' => 12,
                'idHotel' => 'HT2',
                'idVehicle' => 'VH2',
                'idTourGuide' => 'TG2',
                'description' => "Phong Nha-Ke Bang is a national park and UNESCO World Heritage Site located in Quang Binh province, Vietnam. Known for its spectacular karst landscapes and extensive cave systems, it is home to some of the world's most remarkable natural wonders. The park features over 300 caves and grottoes, including Son Doong, the largest cave in the world. Visitors can explore stunning underground rivers, impressive stalactites, and stalagmites, as well as enjoy activities such as trekking, kayaking, and wildlife spotting. Phong Nha-Kẻ Bàng is also rich in biodiversity, hosting a variety of plant and animal species, making it a must-visit destination for nature lovers and adventure seekers.",
            ],
            [
                'idTour' => 'TO5',
                'name' => 'Thanh Dia My Son',
                'startDay' => '2024-06-20',
                'endDay' => '2024-06-24',
                'cost' => 60,
                'imageTour' => 'assets/images/thanhdiamyson.jpg',
                'idAddress' => 13,
                'idHotel' => 'HT3',
                'idVehicle' => 'VH2',
                'idTourGuide' => 'TG4',
                'description' => 'My Son is a complex of ancient Hindu temples located in Quang Nam province, Vietnam. Recognized as a UNESCO World Heritage Site, Mỹ Sơn was the religious and political capital of the Champa Kingdom from the 4th to the 13th century. Nestled in a lush green valley surrounded by mountains, the site features numerous temples and towers constructed from red bricks and sandstone, showcasing impressive Cham architecture and intricate carvings. Despite suffering damage during the Vietnam War, Mỹ Sơn remains an important cultural and historical landmark, offering visitors a glimpse into the rich heritage and spiritual life of the Cham civilization.',
            ],
            [
                'idTour' => 'TO6',
                'name' => 'Phan Xi Pang',
                'startDay' => '2024-06-20',
                'endDay' => '2024-06-24',
                'cost' => 55,
                'imageTour' => 'assets/images/phanxipang.jpg',
                'idAddress' => 14,
                'idHotel' => 'HT1',
                'idVehicle' => 'VH2',
                'idTourGuide' => 'TG4',
                'description' => 'Phan Xi Pang is the highest mountain peak in Vietnam and Southeast Asia, located in the Hoang Lien Son mountain range of Lao Cai province, approximately 9 km from the town of Sa Pa. Standing at 3,143 meters (10,312 feet) above sea level, it is renowned for its majestic natural landscapes and is a popular destination for mountain climbing and trekking adventures. Phan Xi Pang attracts tourists from around the world for its pristine tropical forests, mountain streams, waterfalls, and lush greenery. Additionally, the mountain is home to various ethnic minority groups in Vietnam, adding to its diverse and rich cultural tapestry.',
            ],
        ]);
    }
}
