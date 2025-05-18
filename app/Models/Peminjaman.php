<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'nsaksi';
    protected $primaryKey = 'id'; // atau 'idtransaksi' jika bukan 'id'

    public $timestamps = false; // jika tabel tidak pakai created_at / updated_at
}
