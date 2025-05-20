<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Buku</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        h1, p { text-align: center; }
        .logo { width: 60px; margin-bottom: 10px; }
    </style>
</head>
<body>

    <div style="text-align: center;">
        <img src="{{ public_path('images/logo-polmed.jpg') }}" class="logo">
        <h1>Laporan Data Buku</h1>
        <p>Perpustakaan Umum POLMED</p>
        <p>Tanggal Cetak: {{ $tanggal }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Buku</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukus as $no => $b)
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $b->idbuku }}</td>
                <td>{{ $b->judulbuku }}</td>
                <td>{{ $b->kategori }}</td>
                <td>{{ $b->pengarang }}</td>
                <td>{{ $b->penerbit }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
