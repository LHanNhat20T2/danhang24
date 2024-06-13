<?php

namespace Database\Seeders;

use App\Models\Time;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Time::insert([
            [
                'timeSlot' => '8 - 10 giờ',
            ],
            [
                'timeSlot' => '10 - 12 giờ',
            ],
            [
                'timeSlot' => '12 - 14 giờ',
            ],
            [
                'timeSlot' => '14 - 16 giờ',
            ],
            [
                'timeSlot' => '16 - 18 giờ',
            ],
            [
                'timeSlot' => '18 - 20 giờ',
            ],
            [
                'timeSlot' => '20 - 22 giờ',
            ],
        ]);
    }
}
