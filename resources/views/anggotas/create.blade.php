@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="bg-white rounded shadow p-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Tambah Anggota Baru</h3>

        <form action="{{ route('anggotas.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="id_anggota" class="block text-gray-700 mb-1">ID Anggota</label>
                <input type="text" name="id_anggota" id="id_anggota" class="w-full border-gray-300 rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="nama" class="block text-gray-700 mb-1">Nama</label>
                <input type="text" name="nama" id="nama" class="w-full border-gray-300 rounded p-2" required>
            </div>

            <div class="mb-4">
                 <label for="jenis_kelamin" class="block text-gray-700 mb-1">Jenis Kelamin</label>
                 <select name="jenis_kelamin" id="jenis_kelamin" class="w-full border-gray-300 rounded p-2" required><option value="">-- Pilih --</option>
                 <option value="Pria">Pria</option>
                 <option value="Wanita">Wanita</option> </select>
                    </div>

            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 mb-1">Alamat</label>
                <textarea name="alamat" id="alamat" class="w-full border-gray-300 rounded p-2" rows="3" required></textarea>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 mb-1">Status</label>
                <select name="status" id="status" class="w-full border-gray-300 rounded p-2" required>
                    <option value="">-- Pilih --</option>
                    <option value="Aktif">Tidak Meminjam</option>
                    <option value="Tidak Aktif">Sedang Meminjam</option>
                </select>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('anggotas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
