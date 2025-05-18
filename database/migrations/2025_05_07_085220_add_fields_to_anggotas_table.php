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
        Schema::table('anggotas', function (Blueprint $table) {
            $table->string('idanggota')->unique()->after('id');
            $table->enum('jeniskelamin', ['Pria', 'Wanita'])->after('nama');
            $table->text('alamat')->nullable()->after('jenis_kelamin');
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif')->after('alamat');
        });
    }

    /**
     * Membalikkan migrasi.
     */
    public function down(): void
    {
        Schema::table('anggotas', function (Blueprint $table) {
            $table->dropColumn(['id_anggota', 'jenis_kelamin', 'alamat', 'status']);
        });
    }
};

