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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique(); // Tambahkan unique agar kode tidak kembar
            $table->string('nama');
            // PERBAIKAN: Mengubah string menjadi bigInteger, karena unsigned() hanya untuk angka
            $table->bigInteger('harga')->unsigned();
            $table->integer('stok')->default(1)->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};