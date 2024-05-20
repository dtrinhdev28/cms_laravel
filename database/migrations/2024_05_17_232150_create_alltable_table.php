<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('numberphone')->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('roles')->default(1);
            $table->timestamps();
        });

        // bảng sản phẩm
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id_product');
            $table->string('name');
            $table->string('slug');
            $table->integer('price');
            $table->integer('price_promotion')->nullable();
            $table->integer('stock')->default(0);
            $table->integer('views')->default(0);
            $table->text('description')->nullable();
            $table->tinyInteger('special')->default(1);
            $table->tinyInteger('hidden')->default(1);
            $table->string('image')->nullable();
            $table->timestamps();

        });

        Schema::create('viewer', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::create('cart', function (Blueprint $table) {
            $table->integer('cart')->autoIncrement();
            $table->integer('price');
            $table->integer('quantity')->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();
        });

        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name_category');
            $table->integer('order');
            $table->tinyInteger('hidden');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('viewer');
        Schema::dropIfExists('cart');
        Schema::dropIfExists('category');
    }
};
