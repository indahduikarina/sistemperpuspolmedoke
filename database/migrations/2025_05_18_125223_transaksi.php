<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('idtransaksi'); // PRIMARY KEY auto increment (integer)
            
            $table->unsignedInteger('idanggota'); // Foreign key
            $table->unsignedInteger('idbuku');    // Foreign key

            $table->date('tglpinjam');
            $table->date('tglkembali');

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('idanggota')->references('idanggota')->on('anggotas')->onDelete('cascade');
            $table->foreign('idbuku')->references('idbuku')->on('bukus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}

