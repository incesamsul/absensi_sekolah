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
use Illuminate\Http\Request;
use App\Models\WaliKelas as ModelsWaliKelas;
use Dompdf\Dompdf;

class GuruBk extends Controller
{
    public function rekapAbsen($id_kelas)
    {
        $data['headerTitle'] = 'Rekap absen';
        $data['headerSubTitle'] = 'Selamat Datang, administrator | Aplikasi Absensi Siswa';
        $data['id_kelas'] = $id_kelas;
        // $data['anak_wali'] = Siswa::where('id_kelas', $idKelas->id_kelas)->get();
        $data['siswa'] = Siswa::with(["absensi" => function ($q) {
            $q->where('absensi.status_kehadiran', '=', '1');
        }])->where('id_kelas',$id_kelas)->get();
        return view('pages.rekap_absen.guru_bk', $data);
    }

    public function cetakAbsen($idKelas = 0)
    {
        $data['anak_wali'] = Siswa::with(["absensi" => function ($q) use ($idKelas) {
            $q->where('absensi.id_kelas', '=', $idKelas);
        }])->get();

        $html = view('pages.cetak.absen',$data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('Legal', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("absensi.pdf", array("Attachment" => false));
        exit(0);
    }
    
}
