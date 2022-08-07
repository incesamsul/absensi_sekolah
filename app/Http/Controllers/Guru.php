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

class Guru extends Controller
{
    public function jadwalMengajar()
    {
        $data['headerTitle'] = 'Jadwal Mengajar';
        $data['headerSubTitle'] = 'Selamat Datang, administrator | Aplikasi Absensi Siswa';
        $data['jadwal_mengajar'] = JadwalMengajar::all();
        $data['kelas'] = Kelas::all();
        $data['guru'] = User::where('role', 'guru')->get();
        $data['mata_pelajaran'] = MataPelajaran::all();
        $data['semester'] = Semester::where('status', '1')->first();
        $data['tahun_ajaran'] = TahunAjaran::where('status', '1')->first();
        return view('pages.jadwal_mengajar.index', $data);
    }

    public function presensi()
    {
        $data['headerTitle'] = 'Presensi';
        $data['headerSubTitle'] = 'Selamat Datang, administrator | Aplikasi Absensi Siswa';
        $data['jadwal_mengajar'] = JadwalMengajar::all();
        return view('pages.presensi.index', $data);
    }

    public function createAbsenPerKelas(Request $request)
    {
        foreach ($request->status_kehadiran as $status_kehadiran) {
            $statusKehadiran = explode(",", $status_kehadiran);
            $idSiswa = $statusKehadiran[0];
            $kehadiran = $statusKehadiran[1];
            Absensi::create([
                'id_siswa' => $idSiswa,
                'status_kehadiran' => $kehadiran,
                'tgl_absen' => date('Y-m-d'),
                'id_kelas' => $request->id_kelas,
                'pertemuan_ke' => $request->pertemuan_ke
            ]);
            $jadwal = JadwalMengajar::where('id_kelas', $request->id_kelas)->first();
            $siswa = Siswa::where('id_siswa', $idSiswa)->first();
            $pesan = "Notifikasi presensi smk kristen elim \n \n";
            $pesan .= "Nama siswa :" . $siswa->nama_siswa . "\n";
            $pesan .= "Status Kehadiran : " . getKetPresensi($kehadiran) . "\n";
            $pesan .= "Pertemuan ke : " . $request->pertemuan_ke . "\n";
            $pesan .= "Mata pelajaran : " . $jadwal->mataPelajaran->nama_mata_pelajaran;
            sendNotification($pesan, $siswa->no_wa_ortu);
        }
        return 1;
    }

    public function updateAbsenPerKelas(Request $request)
    {
        // dd($request);
        foreach ($request->status_kehadiran as $status_kehadiran) {
            $statusKehadiran = explode(",", $status_kehadiran);
            $idSiswa = $statusKehadiran[0];
            $kehadiran = $statusKehadiran[1];
            Absensi::where('id_siswa', $idSiswa)->where('id_kelas', $request->id_kelas)->where('pertemuan_ke', $request->pertemuan_ke)->delete();
            Absensi::create([
                'id_siswa' => $idSiswa,
                'status_kehadiran' => $kehadiran,
                'tgl_absen' => date('Y-m-d'),
                'pertemuan_ke' => $request->pertemuan_ke,
                'id_kelas' => $request->id_kelas
            ]);

            $jadwal = JadwalMengajar::where('id_kelas', $request->id_kelas)->first();
            $siswa = Siswa::where('id_siswa', $idSiswa)->first();
            $pesan = "Notifikasi presensi smk kristen elim \n \n";
            $pesan .= "Nama siswa :" . $siswa->nama_siswa . "\n";
            $pesan .= "Status Kehadiran : " . getKetPresensi($kehadiran) . "\n";
            $pesan .= "Pertemuan ke : " . $request->pertemuan_ke . "\n";
            $pesan .= "Mata pelajaran : " . $jadwal->mataPelajaran->nama_mata_pelajaran;
            sendNotification($pesan, $siswa->no_wa_ortu);
        }
        return 1;
    }

    public function getSiswaPerKelas(Request $request)
    {
        return Siswa::where('id_kelas', $request->id_kelas)->get();
    }
    public function getAbsenPerKelas(Request $request)
    {
        return Absensi::where('id_kelas', $request->id_kelas)->where('pertemuan_ke', $request->pertemuan_ke)->get();
    }
}
