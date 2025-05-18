<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    // Nama tabel eksplisit
    protected $table = 'anggotas';

    // Nama primary key
    protected $primaryKey = 'idanggota';

    // Jika primary key bukan auto-increment integer
    public $incrementing = false; // set true jika auto-increment
    protected $keyType = 'string'; // ganti ke 'int' jika angka

    // Jika tabel tidak punya kolom timestamps
    public $timestamps = false;

    // Kolom yang boleh diisi
    protected $fillable = ['idanggota','nama', 'alamat', 'jeniskelamin', 'status'];
    
}
