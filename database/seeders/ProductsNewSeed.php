<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
class ProductsNewSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nameProduct = ['Sam sung', 'Xiaomi', 'Apple', 'OPPO', 'Vivo'];
        $type = ['Galaxy', 'Pro', 'Note', 'Plus', 'Pro Max'];
        $store = ['12GB - 256GB', '4GB - 8GB', '2GB - 32GB', '4GB - 64GB'];
        $color = ['Xanh', 'TiTan', 'Đỏ', 'Vàng', 'Đen', 'Tím', 'Hồng'];

        $images = ['redmi-k30-ultra-green.jpg.webp','xiaomi-redmi-note-12-600x600.jpg', 'redmi-k30-ultra-120720-110710-600x600.jpg', 'iphone-12-trang-13-600x600.jpg', 'samsung-galaxy-z-flip5-mint-thumbnew-600x600.jpg', 'xiaomi-redmi-note-11-pro-5g-xam-thumb-600x600.jpg'];

        for ($i=0; $i < 40 ; $i++) { 
            $name = Arr::random($nameProduct). " " . Arr::random($type);
            $ram = Arr::random($store);
            $colors = Arr::random($color);
            $imageArr = Arr::random($images);

            $slug = $name ." ". $colors;

            \DB::table('products')->insert(
                ['name' => 'Điện thoại ' . $name ." ". $ram, 
                'slug' => Str::slug($slug),
                'price' => rand(2000000, 20000000),
                'price_promotion' => rand(0, 18000000),
                'stock' => rand(0, 50),
                'views' => rand(10, 240),
                'description' => 'Điện thoại '.$name.' được trang bị '.$ram.' cho bạn thỏa sức lưu trữ dung ảnh, và trò chơi. Với màu '.$colors.' mang lại sự cuống hút, mới mẽ.',
                'special' => rand(0,1),
                'hidden' => rand(0,1),
                'image' => $imageArr,
                'category_id' => rand(1,5),
                ]
            );

        }

    }
}
