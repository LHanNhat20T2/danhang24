<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::insert(
            [
                [
                    'name' => 'Alacarte',
                ],
                [
                    'name' => 'Buffet',
                ],
                [
                    'name' => 'Set Menu',
                ],
                [
                    'name' => 'Tiệc',
                ],

                [
                    'name' => 'Đặc sản Phố Biển',
                ],
                [
                    'name' => 'Combo',
                ],
                [
                    'name' => 'Thức uống',
                ],
            ]
        );
    }
}
