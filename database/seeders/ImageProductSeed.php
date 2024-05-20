<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ImageProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $imageArr = [
            ["redmi-k30-ultra-green.jpg.webp", "redmi-k30-ultra-120720-110710-600x600.jpg"],
            ["iphone-12-trang-13-600x600.jpg", "samsung-galaxy-z-flip5-mint-thumbnew-600x600.jpg"],
            ["xiaomi-redmi-note-11-pro-5g-xam-thumb-600x600.jpg", "samsung-galaxy-s23-ultra-green-thumbnew-600x600.jpg"],
            ["xiaomi-redmi-note-13-gold-thumb-600x600.jpg", "vivo-y100-xanh-thumb-1-600x600.jpg", "realme-c65-thumb-1-600x600.jpg", "samsung-galaxy-a55-5g-xanh-thumb-1-600x600.jpg", "xiaomi-redmi-note-13-green-thumb-600x600.jpg"],
            ["oppo-a58-4g-green-thumb-600x600.jpg", "realme-note-50-blue-thumb-600x600.jpg", "samsung-galaxy-s23-fe-mint-thumbnew-600x600.jpg", "samsung-galaxy-a35-5g-xanh-thumb-1-600x600.jpg"]
        ];

        for ($i = 0; $i < 40; $i++) {
            $randomImages = $imageArr[array_rand($imageArr)];
            \DB::table('image_products')->insert(
                [
                    'image' => json_encode($randomImages),
                    'id_product' => rand(296, 334),
                ]
            );

        }

    }
}
