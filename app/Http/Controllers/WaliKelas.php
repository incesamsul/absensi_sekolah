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
    public function rekapAbsen($idMataPelajaran = 0, $idSemester = 0, $_idKelas = 0)
    {
        $data['headerTitle'] = 'Rekap absen';
        $data['headerSubTitle'] = 'Selamat Datang, administrator | Aplikasi Absensi Siswa';
        // $idKelas = ModelsWaliKelas::where('id_guru', auth()->user()->id)->first();
        // $data['jadwal_mengajar'] = JadwalMengajar::where('id_kelas',$idKelas->id_kelas)->get();
        $data['jadwal_mengajar'] = JadwalMengajar::where('id_kelas',$_idKelas)->get();
        $data['semester'] = Semester::all();
        $data['kelas'] = Kelas::all();
        $data['id_semester'] = $idSemester;
        $data['id_kelas'] = $_idKelas;
        // $data['anak_wali'] = Siswa::where('id_kelas', $idKelas->id_kelas)->get();
        $data['anak_wali'] = Siswa::with(["absensi" => function ($q) use ($idMataPelajaran, $_idKelas) {
            $q->where('absensi.status_kehadiran', '=', '1');
            $q->where('absensi.id_mata_pelajaran', '=', $idMataPelajaran);
            $q->where('absensi.id_kelas', '=', $_idKelas);
        }])->where('id_semester',$idSemester)->get();
        $data['id_mata_pelajaran'] = $idMataPelajaran;
        return view('pages.rekap_absen.index', $data);
    }

    public function cetakAbsen($idMataPelajaran = 0, $idSemester = 0, $idKelas = 0)
    {
        $data['anak_wali'] = Siswa::with(["absensi" => function ($q) use ($idMataPelajaran, $idKelas) {
            $q->where('absensi.id_mata_pelajaran', '=', $idMataPelajaran);
            $q->where('absensi.id_kelas', '=', $idKelas);
        }])->where('id_semester',$idSemester)->get();

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
