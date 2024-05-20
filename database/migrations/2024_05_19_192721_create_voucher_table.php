<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voucher', function (Blueprint $table) {
            $table->unsignedBigInteger('id_vourcher')->autoIncrement();
            $table->string('voucher_name');
            $table->string('voucher_code');
            $table->string('voucher_quantity');
            $table->integer('vourcher_number');
            $table->timestamp('vourcher_start');
            $table->timestamp('vourcher_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher');
    }
};
