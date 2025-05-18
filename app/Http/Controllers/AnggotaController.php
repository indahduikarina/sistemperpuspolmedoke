<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    public function index()
    {
        
        $anggotas = Anggota::all(); // ✅ Eloquent model, hasilnya object dengan properti seperti ->nim
        return view('anggotas.index', compact('anggotas'));
        
        
    }

    public function create()
    {
        return view('anggotas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        Anggota::create([
            'idanggota' => $request->id_anggota,
            'nama' => $request->nama,
            'jeniskelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'status' => $request->status
        ]);
        return redirect()->route('anggotas.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $anggota = Anggota::where('idanggota', $id)->first();

        return view('anggotas.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
{
    $anggota = Anggota::findOrFail($id);
    $anggota->update([
        'nama' => $request->nama,
        'jeniskelamin' => $request->jeniskelamin,
        'alamat' => $request->alamat,
        'status' => $request->status,
    ]);

    return redirect()->route('anggotas.index')->with('success', 'Data anggota berhasil diperbarui.');
}


    public function destroy(string $id)
    {
        $anggota = Anggota::where('idanggota',$id)->first();
        $anggota->delete();
        return redirect()->route('anggotas.index')->with('success', 'Anggota berhasil dihapus.');
    }

    public function laporan()
{
    $anggotas = Anggota::all();
    return view('laporan.anggota', compact('anggotas'));
}

}
