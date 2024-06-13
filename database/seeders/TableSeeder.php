<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Table::insert(
            [
                [
                    'number' => '1',
                    'capacity' => '4',
                    'area' => 'Sảnh chính',
                    'status' => 'Bàn trống'
                ],
                [
                    'number' => '2',
                    'capacity' => '8',
                    'area' => 'Sảnh chính',
                    'status' => 'Bàn trống'
                ],
                [
                    'number' => '3',
                    'capacity' => '12',
                    'area' => 'Sảnh chính',
                    'status' => 'Bàn trống'
                ],
                [
                    'number' => '4',
                    'capacity' => '16',
                    'area' => 'Sảnh chính',
                    'status' => 'Bàn trống'
                ],                [
                    'number' => '5',
                    'capacity' => '20',
                    'area' => 'Sảnh chính',
                    'status' => 'Đã hết'
                ],
                [
                    'number' => '1',
                    'capacity' => '4',
                    'area' => 'Sảnh ngoài',
                    'status' => 'Bàn trống'
                ],
                [
                    'number' => '2',
                    'capacity' => '8',
                    'area' => 'Sảnh ngoài',
                    'status' => 'Đã hết'
                ],
                [
                    'number' => '3',
                    'capacity' => '12',
                    'area' => 'Sảnh ngoài',
                    'status' => 'Bàn trống'
                ],
                [
                    'number' => '4',
                    'capacity' => '16',
                    'area' => 'Sảnh ngoài',
                    'status' => 'Bàn trống'
                ],
                [
                    'number' => '5',
                    'capacity' => '20',
                    'area' => 'Sảnh ngoài',
                    'status' => 'Bàn trống'
                ],
            ]
        );
    }
}
