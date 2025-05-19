@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-semibold text-gray-800">Data Anggota</h3>
        <a href="{{ route('anggotas.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Anggota
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase">
                <tr>
                    <th class="py-3 px-4 text-center bg-purple-400 text-white">No</th>
                    <th class="py-3 px-4 bg-purple-400 text-white">ID Anggota</th>
                    <th class="py-3 px-4 bg-purple-400 text-white">Nama</th>
                    <th class="py-3 px-4 bg-purple-400 text-white">Jenis Kelamin</th>
                    <th class="py-3 px-4 bg-purple-400 text-white">Alamat</th>
                    <th class="py-3 px-4 bg-purple-400 text-white">Status</th>
                    <th class="py-3 px-4 text-center bg-purple-400 text-white">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($anggotas as $index => $anggota)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-2 px-4 text-center">{{ $index + 1 }}</td>
                    <td class="py-2 px-4">{{ $anggota->idanggota }}</td>
                    <td class="py-2 px-4">{{ $anggota->nama }}</td>
                    <td class="py-2 px-4">{{ $anggota->jeniskelamin }}</td>
                    <td class="py-2 px-4">{{ $anggota->alamat }}</td>
                    <td class="py-2 px-4">{{ $anggota->status }}</td>
                    <td class="text-center">
                    <a href="{{ route('anggotas.edit', $anggota->idanggota) }}" 
                     class="text-sm text-blue-600 hover:underline">Edit</a>
    
                    <form action="{{ route('anggotas.destroy', $anggota->idanggota) }}" 
                      method="POST" class="inline-block ml-2"  onsubmit="return confirm('Yakin ingin menghapus data ini?')"> @csrf
                        @method('DELETE')
                    <button type="submit" 
                     class="text-sm text-red-600 hover:underline bg-transparent border-none p-0 m-0">Hapus</button> </form></td>  </tr>
                     @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-gray-500">Belum ada data anggota.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
