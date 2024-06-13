<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservation::insert(
            [
                [
                    'user_id' => '1',
                    'table_id' => '1',
                    'guestNumber' => '8',
                    'reservation_date' => Carbon::createFromFormat('d/m/Y', '12/05/2024')->format('Y-m-d'),
                    'reservation_time' => '8-10 giờ',
                    'deposit' => 'Chưa cọc',
                    'note' => 'Không có',
                    'status' => 'Chờ duyệt',
                ],
                [
                    'user_id' => '2',
                    'table_id' => '2',
                    'guestNumber' => '4',
                    'reservation_date' => Carbon::createFromFormat('d/m/Y', '22/05/2024')->format('Y-m-d'),
                    'reservation_time' => '10-12 giờ',
                    'deposit' => 'Đã cọc',
                    'note' => 'Không có',
                    'status' => 'Chờ duyệt',
                ],
            ]
        );
    }
}
