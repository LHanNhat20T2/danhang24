<?php

namespace App\Services;

use App\Models\Reservation;
use Illuminate\Support\Carbon;

class ReservationService
{
    /**
     * Tạo một đơn đặt bàn mới.
     *
     * @param array $data Dữ liệu của đơn đặt bàn mới
     * @return Reservation Đối tượng đặt bàn đã được tạo
     */
    public function createReservation(array $data): Reservation
    {
        return Reservation::create([
            'user_id' => $data['user_id'],
            'table_id' => $data['table_id'],
            'name' => $data['name'] ?? null,
            'phone' => $data['phone'] ?? null,
            'guestCount' => $data['guestCount'],
            'reservation_date' => Carbon::parse($data['reservation_date']),
            'reservation_time' => $data['reservation_time'],
            'note' => $data['note'] ?? null,
            'status' => $data['status'] ?? 'Chờ duyệt',
        ]);
    }
}
