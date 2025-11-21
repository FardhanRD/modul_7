<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penjuals', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Buat Nama
            $table->string('email')->unique(); // Buat Email (harus unik)
            $table->string('password'); // Buat Password
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjuals');
    }
};
