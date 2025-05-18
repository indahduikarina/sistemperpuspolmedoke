<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'tbtransaksi';
    protected $primaryKey = 'id'; // atau 'idtransaksi' jika bukan 'id'

    public $timestamps = false; // jika tabel tidak pakai created_at / updated_at
}
