<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;

    protected $table = 'tbpinjam';    // nama tabel transaksi peminjaman

    protected $primaryKey = 'idpinjam';  // primary key

    public $incrementing = false;      // jika primary key bukan auto increment (jika manual)

    protected $keyType = 'string';     // tipe primary key (string jika idpinjam misalnya)

    protected $fillable = [
        'idpinjam',
        'idbuku',
        'idanggota',
        'tgl_pinjam',
        'tgl_kembali',
        'status',
    ];

    // Jika kamu ingin relasi ke buku dan anggota bisa dibuat juga:
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'idbuku', 'idbuku');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'idanggota', 'idanggota');
    }
}
