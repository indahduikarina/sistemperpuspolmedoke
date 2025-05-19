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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id(); // Titik koma ditambahkan
            $table->string('idanggota')->unique();
            $table->string('nama'); // Kolom nama ditambahkan karena direferensi di error sebelumnya
            $table->enum('jeniskelamin', ['Pria', 'Wanita']);
            $table->text('alamat')->nullable();
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
            $table->timestamps(); // Ditambahkan untuk created_at dan updated_at
        });
    }

    /**
     * Membalikkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas'); // Diubah untuk menghapus seluruh tabel
    }
};