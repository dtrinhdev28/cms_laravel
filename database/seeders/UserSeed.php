<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $surname = ['Nguyễn', 'Kim', 'Lê', 'Phan', 'Đỗ'];
        $name = ['Trình', 'Hoàng', 'Hải', 'Hòa', 'Tú', 'Phương', 'Thanh'];
        for ($i=0; $i < 10; $i++) { 
            $fullname = \Arr::random($surname) . ' ' . \Arr::random($name);

            \DB::table('users')->insert([
                'name' => $fullname,
                'email' => \Str::random(5).'@gmail.com',
                'password' => bcrypt('password')
            ]);
        }

    }
}
