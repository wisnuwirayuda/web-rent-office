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
        Schema::create('office_spaces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('thumbnail');
            $table->string('address');
            $table->boolean('is_open');
            $table->boolean('is_full_booked');
            $table->unsignedInteger('price'); // unsignedInteger adalah tipe data angka yang tidak bisa negatif
            $table->unsignedInteger('duration');
            $table->text('about'); // text adalah tipe data string yang dapat lebih banyak menampung karakter, string maksimal 255 karakter
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->string('slug')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_spaces');
    }
};
