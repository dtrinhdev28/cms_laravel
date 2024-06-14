<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $surname = ['Nguyễn', 'Kim', 'Lê', 'Phan', 'Đỗ'];
        $name = ['Trình', 'Hoàng', 'Hải', 'Hòa', 'Tú', 'Phương', 'Thanh'];

        $diachi = ['Hồ Chí Minh', 'Trà Vinh', 'Vĩnh long'];

        $nghenghiep = ['Học sinh', 'Sinh viên', 'IT'];

        for ($i=0; $i < 10; $i++) {
            $fullname = Arr::random($surname) . ' ' . Arr::random($name);
            $diachiArr = Arr::random($diachi);

            $nghenghiepArr = Arr::random($nghenghiep);

            \DB::table('users')->insert([
                'name' => $fullname,
                'email' => Str::random(5).'@gmail.com',
                'password' => bcrypt('password'),
                'address' => $diachiArr,
                'nghenghiep' => $nghenghiepArr,

            ]);
        }

    }
}
