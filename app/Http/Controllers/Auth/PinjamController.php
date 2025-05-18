<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;

class PinjamController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'idanggota' => 'required|string',
            'idbuku' => 'required|string',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
        ]);

        // Generate idpinjam otomatis (misal format PJ0001, PJ0002...)
        $last = Pinjam::orderBy('idpinjam', 'desc')->first();
        if ($last) {
            $num = (int)substr($last->idpinjam, 2) + 1;
            $idpinjam = 'PJ' . str_pad($num, 4, '0', STR_PAD_LEFT);
        } else {
            $idpinjam = 'PJ0001';
        }

        // Simpan data
        Pinjam::create([
            'idpinjam' => $idpinjam,
            'idanggota' => $validated['idanggota'],
            'idbuku' => $validated['idbuku'],
            'tgl_pinjam' => $validated['tgl_pinjam'],
            'tgl_kembali' => $validated['tgl_kembali'],
        ]);

        return redirect()->route('pinjam.index')->with('success', 'Transaksi berhasil disimpan!');
    }
}
