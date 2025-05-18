<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use Mpdf\Mpdf;

class LaporanController extends Controller
{
    public function cetakAnggota()
    {
        $anggota = Anggota::all();
        $tanggal = now()->setTimezone('Asia/Jakarta')->format('d F Y, H:i') . ' WIB';

        $html = view('laporan.cetak_anggota_pdf', compact('anggota', 'tanggal'))->render();

        $mpdf = new Mpdf(['format' => 'A4']);
        $mpdf->WriteHTML($html);
        $mpdf->Output('laporan-anggota.pdf', 'I');
    }

    public function cetakBuku()
    {
        $bukus = Buku::all();
        $tanggal = now()->setTimezone('Asia/Jakarta')->format('d F Y, H:i') . ' WIB';

        $html = view('laporan.cetak_buku_pdf', compact('bukus', 'tanggal'))->render();

        $mpdf = new Mpdf(['format' => 'A4']);
        $mpdf->WriteHTML($html);
        $mpdf->Output('laporan-buku.pdf', 'I');
    }
}
