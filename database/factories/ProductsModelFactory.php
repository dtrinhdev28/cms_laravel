<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsModelFactory extends Factory
{
    /**Database\Factories\Database\Factories\ProductsModelFactory
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $name = $this->faker->word(), // Tên ngẫu nhiên
            'slug' => Str::slug($name, '-'), // Slug ngẫu nhiên
            'image' => $this->faker->imageUrl(), // URL hình ảnh ngẫu nhiên
            'price' => $this->faker->numberBetween(1000000), // Giá ngẫu nhiên từ 10 đến 100 với 2 chữ số sau dấu phẩy
            'date' => $this->faker->date(), // Ngày ngẫu nhiên
            'price_promotion' => $this->faker->numberBetween(100000, 1000000), // Giá khuyến mãi ngẫu nhiên từ 5 đến 50 với 2 chữ số sau dấu phẩy
            'stock' => $this->faker->numberBetween(0, 100), // Số lượng tồn kho ngẫu nhiên từ 0 đến 100
            'views' => $this->faker->numberBetween(0, 1000), // Số lượt xem ngẫu nhiên từ 0 đến 1000
            'colors' => $this->faker->colorName(), // Tên màu ngẫu nhiên
            'description' => $this->faker->paragraph(), // Mô tả ngẫu nhiên
            'special' => $this->faker->boolean(), // Giá trị đặc biệt ngẫu nhiên true hoặc false
            'hidden' => $this->faker->boolean(), // Giá trị ẩn ngẫu nhiên true hoặc false
            'comments_id' => null, // Trường comment_id có thể được thiết lập theo nhu cầu của bạn
            'category_id' => $this->faker->numberBetween(1, 10), // ID danh mục ngẫu nhiên từ 1 đến 10 (ví dụ)
        ];
    }
}
