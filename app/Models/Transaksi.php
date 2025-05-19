<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false; // <- tambahkan ini
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'idanggota',
        'idbuku',
        'tglpinjam',
        'tglkembali',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'idanggota');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'idbuku');
    }
}
