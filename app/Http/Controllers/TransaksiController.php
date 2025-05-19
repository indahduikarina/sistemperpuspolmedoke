<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransaksiRequest;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('anggota', 'buku')->get();
        return view('transaksis.index', compact('transaksis'));
    }

    public function create()
    {
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        return view('transaksis.create', compact('anggotas', 'bukus'));
    }

    public function store(TransaksiRequest $request)
    {
        // Generate ID Transaksi otomatis

        Transaksi::create([
             'idtransaksi' => $request->id_transaksi,
            'idanggota' => $request->idanggota,
            'idbuku' => $request->idbuku,
            'tglpinjam' => $request->tglpinjam,
            'tglkembali' => $request->tglkembali,
        ]);

        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        return view('transaksis.edit', compact('transaksi', 'anggotas', 'bukus'));
    }

    public function update(TransaksiRequest $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $transaksi->update([
            'idanggota' => $request->idanggota,
            'idbuku' => $request->idbuku,
            'tglpinjam' => $request->tglpinjam,
            'tglkembali' => $request->tglkembali,
        ]);

        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
