<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahAnggota = Anggota::count();
        $jumlahBuku = Buku::count();
        $jumlahPinjam = Transaksi::whereNull('tglkembali')->count();

        return view('dashboard.index', compact('jumlahAnggota', 'jumlahBuku', 'jumlahPinjam'));
    }
}
