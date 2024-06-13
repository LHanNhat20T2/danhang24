<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::insert(
            [
                [
                    'name' => 'Bánh creme brulee vị socola với quế',
                    'slug' => 'banh-kem',
                    'thumb_image' => '/images/product/alacarte-01.jpg',
                    'category_id' => 1,
                    'price' => 300000,
                    'quantity' => 2,
                    'description' => 'Đến với Phố Biển Restaurant, bạn sẽ được nếm thử những món ăn hấp dẫn và đẳng cấp.',
                ],
                [
                    'name' => 'Khoai môn chiên giòn',
                    'slug' => 'khoai_mon',
                    'thumb_image' => '/images/product/alacarte-02.jpg',
                    'category_id' => 1,
                    'price' => 400000,
                    'quantity' => 3,
                    'description' => 'Đến với Phố Biển Restaurant, bạn sẽ được nếm thử những món ăn hấp dẫn và đẳng cấp.',
                ],
                [
                    'name' => 'Dimsum',
                    'slug' => 'dimsum',
                    'thumb_image' => '/images/product/setmenu-01.jpg',
                    'category_id' => 3,
                    'price' => 600000,
                    'quantity' => 5,
                    'description' => 'Đến với Phố Biển Restaurant, bạn sẽ được nếm thử những món ăn hấp dẫn và đẳng cấp.',
                ],
                [
                    'name' => 'Set thịt',
                    'slug' => 'Set-thit',
                    'thumb_image' => '/images/product/setmenu-02.jpg',
                    'category_id' => 3,
                    'price' => 700000,
                    'quantity' => 8,
                    'description' => 'Đến với Phố Biển Restaurant, bạn sẽ được nếm thử những món ăn hấp dẫn và đẳng cấp.',
                ],

                [
                    'name' => 'Lẫu truyền thống',
                    'slug' => 'lau-truyen-thong',
                    'thumb_image' => '/images/product/dspb-01.jpg',
                    'category_id' => 5,
                    'price' => 250000,
                    'quantity' => 11,
                    'description' => 'Đến với Phố Biển Restaurant, bạn sẽ được nếm thử những món ăn hấp dẫn và đẳng cấp.',
                ],
                [
                    'name' => 'Lẫu thập cẩm',
                    'slug' => 'lau-truyen-thong',
                    'thumb_image' => '/images/product/dspb-02.jpg',
                    'category_id' => 5,
                    'price' => 180000,
                    'quantity' => 14,
                    'description' => 'Đến với Phố Biển Restaurant, bạn sẽ được nếm thử những món ăn hấp dẫn và đẳng cấp.',
                ],
                [
                    'name' => 'Combo hải sản 01',
                    'slug' => 'combo-hai-san-01',
                    'thumb_image' => '/images/product/combo-01.jpg',
                    'category_id' => 6,
                    'price' => 400000,
                    'quantity' => 5,
                    'description' => 'Đến với Phố Biển Restaurant, bạn sẽ được nếm thử những món ăn hấp dẫn và đẳng cấp.',
                ],
                [
                    'name' => 'Combo hải sản 02',
                    'slug' => 'combo-hai-san-02',
                    'thumb_image' => '/images/product/combo-02.jpg',
                    'category_id' => 6,
                    'price' => 300000,
                    'quantity' => 3,
                    'description' => 'Đến với Phố Biển Restaurant, bạn sẽ được nếm thử những món ăn hấp dẫn và đẳng cấp.',
                ],
                [
                    'name' => 'Rau xanh mùa xuân',
                    'slug' => 'rau-xanh-mua-xuan',
                    'thumb_image' => '/images/product/thucuong-01.jpg',
                    'category_id' => 7,
                    'price' => 100000,
                    'quantity' => 2,
                    'description' => 'Đến với Phố Biển Restaurant, bạn sẽ được nếm thử những món ăn hấp dẫn và đẳng cấp.',
                ],
                [
                    'name' => 'Socola nóng',
                    'slug' => 'rau-xanh-mua-xuan',
                    'thumb_image' => '/images/product/thucuong-02.jpg',
                    'category_id' => 6,
                    'price' => 100000,
                    'quantity' => 7,
                    'description' => 'Đến với Phố Biển Restaurant, bạn sẽ được nếm thử những món ăn hấp dẫn và đẳng cấp.',
                ],
            ]
        );
    }
}
