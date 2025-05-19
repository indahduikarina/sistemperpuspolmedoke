<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
    $table->string('id')->primary();
    $table->string('idanggota');
    $table->string('idbuku');
    $table->date('tglpinjam');
    $table->date('tglkembali')->nullable();
    $table->timestamps();

    $table->foreign('idanggota')->references('id')->on('anggotas')->onDelete('cascade');
    $table->foreign('idbuku')->references('id')->on('bukus')->onDelete('cascade');
});
    }

    /**
     * Membalikkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};