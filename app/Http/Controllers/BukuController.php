<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('bukus.index', compact('bukus'));
    }

    public function create()
    {
        return view('bukus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'idbuku' => 'required|unique:tbbuku,idbuku',
            'judulbuku' => 'required',
            'kategori' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'status' => 'required',
        ]);

         Buku::create([
            'idbuku' => $request->idbuku,
            'judulbuku' => $request->judulbuku,
            'kategori' => $request->kategori,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'status' => $request->status
        ]);

        return redirect()->route('bukus.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Buku $buku)
    {
        return view('bukus.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judulbuku' => 'required',
            'kategori' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'status' => 'required',
        ]);

        $buku->update($request->all());

        return redirect()->route('bukus.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('bukus.index')->with('success', 'Buku berhasil dihapus.');
    }
    public function laporan()
    {
    $bukus = Buku::all();
    return view('laporan.buku', compact('bukus'));
    }

}
