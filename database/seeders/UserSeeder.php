<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::insert([
            [
                'email' => 'hannhat2468@gmail.com',
                'password' =>  Hash::make('password'),
                'name' => 'Hàn Nhật',
                'phone' => '0989898787',
                'address' => '76 Nông Cống Đà Nẵng',
                'role' => 'admin'
            ],
            [
                'email' => 'hannhat3005@gmail.com',
                'password' =>  Hash::make('password'),
                'name' => 'Hàn Nhật 2',
                'phone' => '0989898787',
                'address' => 'Duy Xuyên',
                'role' => 'user'
            ],
        ]);
    }
}
