<?php

use App\Models\ProductsModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id_product')->primary();
            $table->string('name', length: 50);
            $table->string('slug',)->unique(); 
            $table->string('image', length: 100);
            $table->integer('price');
            $table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('price_promotion')->nullable();
            $table->integer('stock');
            $table->integer('views')->default(0);
            $table->string('colors', length: 50)->default(0);
            $table->string('description')->default(0);
            $table->string('special')->default(0);
            $table->boolean('hidden')->default(1);
            $table->string('comments_id');
            $table->string('category_id');
            $table->timestamps();
        });

        ProductsModel::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
