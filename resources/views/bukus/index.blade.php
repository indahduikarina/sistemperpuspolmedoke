@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-semibold text-gray-800">Data Buku</h3>
        <a href="{{ route('bukus.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Buku
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full text-sm text-left border">
            <thead class="bg-amber-900 text-white">
                <tr>
                    <th class="py-3 px-4 text-center bg-purple-400 text-white">No</th>
                    <th class="py-3 px-4 bg-purple-400 text-white">ID Buku</th>
                    <th class="py-3 px-4 bg-purple-400 text-white">Judul Buku</th>
                    <th class="py-3 px-4 bg-purple-400 text-white">Kategori</th>
                    <th class="py-3 px-4 bg-purple-400 text-white">Pengarang</th>
                    <th class="py-3 px-4 bg-purple-400 text-white">Penerbit</th>
                    <th class="py-3 px-4 bg-purple-400 text-white">Status</th>
                    <th class="py-3 px-4 text-center bg-purple-400 text-white">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bukus as $index => $buku)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-2 px-4 text-center">{{ $index + 1 }}</td>
                    <td class="py-2 px-4">{{ $buku->idbuku }}</td>
                    <td class="py-2 px-4">{{ $buku->judulbuku }}</td>
                    <td class="py-2 px-4">{{ $buku->kategori }}</td>
                    <td class="py-2 px-4">{{ $buku->pengarang }}</td>
                    <td class="py-2 px-4">{{ $buku->penerbit }}</td>
                    <td class="py-2 px-4">
                        @if($buku->status == 'Tersedia')
                            <span class="text-green-600 font-semibold">{{ $buku->status }}</span>
                        @elseif($buku->status == 'Dipinjam')
                            <span class="text-orange-600 font-semibold">{{ $buku->status }}</span>
                        @else
                            <span class="text-red-600 font-semibold">{{ $buku->status }}</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('bukus.edit', $buku->idbuku) }}"
                           class="text-sm text-blue-600 hover:underline">Edit</a>

                        <form action="{{ route('bukus.destroy', $buku->idbuku) }}"
                              method="POST" class="inline-block ml-2"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-sm text-red-600 hover:underline bg-transparent border-none p-0 m-0">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4 text-gray-500">Belum ada data buku.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
