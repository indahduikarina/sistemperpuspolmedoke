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
            $table->id();
            $table->foreignId('idanggota')->constrained('anggotas')->onDelete('cascade');
            $table->foreignId('idbuku')->constrained('bukus')->onDelete('cascade');
            $table->date('tglpinjam');
            $table->date('tglkembali')->nullable();
            $table->timestamps();
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

