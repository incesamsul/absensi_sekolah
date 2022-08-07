<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\JadwalMengajar;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Semester;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\User;
use App\Models\WaliKelas as ModelsWaliKelas;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class WaliKelas extends Controller
{
    public function rekapAbsen($idMataPelajaran = 0)
    {
        $data['headerTitle'] = 'Rekap absen';
        $data['headerSubTitle'] = 'Selamat Datang, administrator | Aplikasi Absensi Siswa';
        $data['jadwal_mengajar'] = JadwalMengajar::all();
        $idKelas = ModelsWaliKelas::where('id_guru', auth()->user()->id)->first();
        // $data['anak_wali'] = Siswa::where('id_kelas', $idKelas->id_kelas)->get();
        $data['anak_wali'] = Siswa::with(["absensi" => function ($q) use ($idMataPelajaran) {
            $q->where('absensi.status_kehadiran', '=', '1');
            $q->where('absensi.id_mata_pelajaran', '=', $idMataPelajaran);
        }])->get();
        return view('pages.rekap_absen.index', $data);
    }

    public function cetakAbsen()
    {
        $html = view('pages.cetak.absen');

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('Legal', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("neraca_saldo.pdf", array("Attachment" => false));
        exit(0);
    }
}
