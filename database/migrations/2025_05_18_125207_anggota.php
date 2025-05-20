<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->increments('idanggota'); // INTEGER AUTO INCREMENT PRIMARY KEY
            $table->string('nama', 30);
            $table->string('jeniskelamin', 10);
            $table->string('alamat', 40);
            $table->string('status', 20);
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggotas');
    }
}

?>