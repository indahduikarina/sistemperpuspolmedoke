<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // Tambahkan ini agar tidak pakai nama tabel default "bukus"
    protected $table = 'bukus';
    protected $primaryKey = 'idbuku';

    // Jika primary key bukan auto-increment integer
    public $incrementing = false; // set true jika auto-increment
    protected $keyType = 'string';
    protected $fillable = [
        'idbuku', 'judulbuku', 'kategori', 'pengarang', 'penerbit', 'status'
    ];

}

