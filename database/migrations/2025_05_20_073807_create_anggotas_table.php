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
       Schema::create('anggotas', function (Blueprint $table) {
            $table->id('idanggota'); // INTEGER AUTO INCREMENT PRIMARY KEY
            $table->string('nama', 30);
            $table->string('jeniskelamin', 10);
            $table->string('alamat', 40);
            $table->string('status', 20);
            $table->timestamps(); // created_at & updated_at

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
