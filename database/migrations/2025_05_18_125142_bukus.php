<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id('idbuku'); // Auto-increment primary key (integer)
            $table->string('judulbuku', 50);
            $table->string('kategori', 50);
            $table->string('pengarang', 40);
            $table->string('penerbit', 40);
            $table->string('status', 10);
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}

