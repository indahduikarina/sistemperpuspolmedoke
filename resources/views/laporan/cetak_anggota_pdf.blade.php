<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Anggota</title>
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
        <h1>Laporan Data Anggota</h1>
        <p>Perpustakaan Umum POLMED</p>
        <p>Tanggal Cetak: {{ $tanggal }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anggota as $no => $a)
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $a->idanggota }}</td>
                <td>{{ $a->nama }}</td>
                <td>{{ $a->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
