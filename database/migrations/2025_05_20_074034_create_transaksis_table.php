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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id('idtransaksi'); // PRIMARY KEY auto-increment integer

            // Foreign keys (unsignedBigInteger)
            $table->unsignedBigInteger('idanggota');
            $table->unsignedBigInteger('idbuku');

            $table->date('tglpinjam');
            $table->date('tglkembali');

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('idanggota')->references('idanggota')->on('anggotas')->onDelete('cascade');
            $table->foreign('idbuku')->references('idbuku')->on('bukus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
