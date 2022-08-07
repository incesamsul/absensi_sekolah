<?php

namespace App\Http\Controllers;

use App\Models\JadwalMengajar;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Semester;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Admin extends Controller
{

    protected $userModel;
    protected $profileUserModel;
    protected $kritikSaranModel;
    protected $kuisionerModel;
    protected $penilaianModel;


    public function __construct()
    {
        $this->userModel = new User();
    }

    public function pengguna()
    {
        $data['headerTitle'] = 'Manajemen Pengguna';
        $data['headerSubTitle'] = 'Selamat Datang, administrator | Aplikasi Absensi Siswa';
        $data['pengguna'] = $this->userModel->getAllUser();

        return view('pages.pengguna.index', $data);
    }

    public function kelas()
    {
        $data['headerTitle'] = 'Manajemen Kelas';
        $data['headerSubTitle'] = 'Selamat Datang, administrator | Aplikasi Absensi Siswa';
        $data['random'] = generateRandomString(10);
        $data['kelas'] = Kelas::all();
        return view('pages.kelas.index', $data);
    }

    public function semester()
    {
        $data['headerTitle'] = 'Semester';
        $data['headerSubTitle'] = 'Selamat Datang, administrator | Aplikasi Absensi Siswa';
        $data['semester'] = Semester::all();
        return view('pages.semester.index', $data);
    }

    public function tahunAjaran()
    {
        $data['headerTitle'] = 'Tahun Ajaran';
        $data['headerSubTitle'] = 'Selamat Datang, administrator | Aplikasi Absensi Siswa';
        $data['tahun_ajaran'] = TahunAjaran::all();
        return view('pages.tahun_ajaran.index', $data);
    }

    public function mataPelajaran()
    {
        $data['headerTitle'] = 'Mata Pelajaran';
        $data['headerSubTitle'] = 'Selamat Datang, administrator | Aplikasi Absensi Siswa';
        $data['mata_pelajaran'] = MataPelajaran::all();
        $data['random'] = generateRandomString(10);
        return view('pages.mata_pelajaran.index', $data);
    }

    public function waliKelas()
    {
        $data['headerTitle'] = 'Wali Kelas';
        $data['headerSubTitle'] = 'Selamat Datang, administrator | Aplikasi Absensi Siswa';
        $data['wali_kelas'] = WaliKelas::all();
        $data['kelas'] = Kelas::all();
        $data['guru'] = User::where('role', 'guru')->get();
        return view('pages.wali_kelas.index', $data);
    }

    public function dataSiswa()
    {
        $data['headerTitle'] = 'Data Siswa';
        $data['headerSubTitle'] = 'Selamat Datang, administrator | Aplikasi Absensi Siswa';
        $data['kelas'] = Kelas::all();
        $data['siswa'] = Siswa::all();
        return view('pages.data_siswa.index', $data);
    }

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

    public function aktifkanSemester($idSemester)
    {
        Semester::query()->update(['status' => '0']);
        Semester::where('id_semester', $idSemester)->update(['status' => '1']);
        return redirect()->back()->with('message', 'Semester Berhasil di aktifkan');
    }

    public function aktifkanTahunAjaran($idTahunAjaran)
    {
        TahunAjaran::query()->update(['status' => '0']);
        TahunAjaran::where('id_tahun_ajaran', $idTahunAjaran)->update(['status' => '1']);
        return redirect()->back()->with('message', 'Tahun ajaran Berhasil di aktifkan');
    }



    public function profileUser()
    {
        $data['user'] = User::all();
        $data['profile'] = $this->profileUserModel->getProfileUser();
        return view('pages.rekaptulasi_data.index', $data);
    }






    // fetch data user by admin
    function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            if ($request->filter == "") {
                $data['pengguna'] = DB::table('users')
                    ->where('role', '!=', 'Admin')
                    ->Where('name', 'like', '%' . $query . '%')
                    ->Where('email', 'like', '%' . $query . '%')
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
            } else {
                $data['pengguna'] = DB::table('users')
                    ->where('role', '!=', 'Admin')
                    ->Where('role', '=', $request->filter)
                    ->Where('name', 'like', '%' . $query . '%')
                    ->Where('email', 'like', '%' . $query . '%')
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
            }

            return view('pages.pengguna.users_data', $data)->render();
        }
    }


    // CRUD KELAS
    public function createKelas(Request $request)
    {
        Kelas::create([
            'kode_kelas' => $request->kode_kelas,
            'nama_kelas' => $request->nama_kelas,
        ]);
        return redirect()->back()->with('message', 'kelas Berhasil di tambahkan');
    }

    public function deleteKelas(Request $request)
    {
        Kelas::where('id_kelas', $request->id_kelas)->delete();
        return 1;
    }

    public function updateKelas(Request $request)
    {
        Kelas::where('id_kelas', $request->id)->update([
            'kode_kelas' => $request->kode_kelas,
            'nama_kelas' => $request->nama_kelas,
        ]);
        return redirect()->back()->with('message', 'kelas Berhasil di update');
    }

    // CRUD SEMESTER
    public function createSemester(Request $request)
    {
        Semester::create([
            'semester' => $request->semester,
        ]);
        return redirect()->back()->with('message', 'Semester Berhasil di tambahkan');
    }

    public function deleteSemester(Request $request)
    {
        Semester::where('id_semester', $request->id)->delete();
        return 1;
    }

    public function updateSemester(Request $request)
    {
        Semester::where('id_semester', $request->id)->update([
            'semester' => $request->semester,
        ]);
        return redirect()->back()->with('message', 'semester Berhasil di update');
    }

    // CRUD TAHUN AJARAN
    public function createTahunAjaran(Request $request)
    {
        TahunAjaran::create([
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);
        return redirect()->back()->with('message', 'Tahun ajaran Berhasil di tambahkan');
    }

    public function deleteTahunAjaran(Request $request)
    {
        TahunAjaran::where('id_tahun_ajaran', $request->id)->delete();
        return 1;
    }

    public function updateTahunAjaran(Request $request)
    {
        TahunAjaran::where('id_tahun_ajaran', $request->id)->update([
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);
        return redirect()->back()->with('message', 'tahun ajaran Berhasil di update');
    }

    // CRUD MATA PELAJARAN
    public function createMataPelajaran(Request $request)
    {
        MataPelajaran::create([
            'kode_mata_pelajaran' => $request->kode_mata_pelajaran,
            'nama_mata_pelajaran' => $request->nama_mata_pelajaran,
        ]);
        return redirect()->back()->with('message', 'mata pelajaran Berhasil di tambahkan');
    }

    public function deleteMataPelajaran(Request $request)
    {
        MataPelajaran::where('id_mata_pelajaran', $request->id)->delete();
        return 1;
    }

    public function updateMataPelajaran(Request $request)
    {
        MataPelajaran::where('id_mata_pelajaran', $request->id)->update([
            'kode_mata_pelajaran' => $request->kode_mata_pelajaran,
            'nama_mata_pelajaran' => $request->nama_mata_pelajaran,
        ]);
        return redirect()->back()->with('message', 'mata pelajaran Berhasil di update');
    }

    // CRUD WALI KELAS
    public function createWaliKelas(Request $request)
    {
        WaliKelas::create([
            'id_kelas' => $request->id_kelas,
            'id_guru' => $request->id_guru,
        ]);

        User::where('id', $request->id_guru)->update(['role' => 'wali_kelas']);
        return redirect()->back()->with('message', 'wali kelas Berhasil di tambahkan');
    }

    public function deleteWaliKelas(Request $request)
    {
        WaliKelas::where('id_wali_kelas', $request->id)->delete();
        User::where('id', $request->id_guru)->update(['role' => 'guru']);
        return 1;
    }

    public function updateWaliKelas(Request $request)
    {
        WaliKelas::where('id_wali_kelas', $request->id)->update([
            'id_kelas' => $request->id_kelas,
            'id_guru' => $request->id_guru,
        ]);
        User::where('id', $request->id_guru)->update(['role' => 'wali_kelas']);
        return redirect()->back()->with('message', 'wali kelas Berhasil di update');
    }

    // CRUD JADWAL MENGAJAR
    public function createJadwalMengajar(Request $request)
    {
        JadwalMengajar::create([
            'id_kelas' => $request->id_kelas,
            'id_guru' => $request->id_guru,
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
            'id_semester' => $request->id_semester,
            'id_tahun_ajaran' => $request->id_tahun_ajaran,
            'jam_ke' => $request->jam_ke,
            'jam_mengajar' => $request->jam_mengajar,
            'hari' => $request->hari,
        ]);

        return redirect()->back()->with('message', 'jadwal mengajar Berhasil di tambahkan');
    }

    public function deleteJadwalMengajar(Request $request)
    {
        JadwalMengajar::where('id_jadwal_mengajar', $request->id)->delete();
        return 1;
    }

    public function updateJadwalMengajar(Request $request)
    {
        JadwalMengajar::where('id_jadwal_mengajar', $request->id)->update([
            'id_kelas' => $request->id_kelas,
            'id_guru' => $request->id_guru,
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
            'id_semester' => $request->id_semester,
            'id_tahun_ajaran' => $request->id_tahun_ajaran,
            'jam_ke' => $request->jam_ke,
            'jam_mengajar' => $request->jam_mengajar,
            'hari' => $request->hari,
        ]);
        return redirect()->back()->with('message', 'jadwal mengajar Berhasil di update');
    }

    // CRUD DATA SISWA
    public function createDataSiswa(Request $request)
    {
        $image = $request->file('foto');
        $imageName = uniqid() . '.'  . 'jpg';
        $image->move(public_path('data/foto_siswa/'), $imageName);
        Siswa::create([
            'id_kelas' => $request->id_kelas,
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_wa_ortu' => $request->no_wa_ortu,
            'tahun_angkatan' => $request->tahun_angkatan,
            'foto' => $imageName,
        ]);

        return redirect()->back()->with('message', 'Siswa Berhasil di tambahkan');
    }

    public function deleteDataSiswa(Request $request)
    {
        Siswa::where('id_siswa', $request->id)->delete();
        return 1;
    }

    public function updateDataSiswa(Request $request)
    {
        $image = $request->file('foto');

        if ($image) {
            $imageName = uniqid() . '.'  . 'jpg';
            $image->move(public_path('data/foto_siswa/'), $imageName);

            Siswa::where('id_siswa', $request->id)->update([
                'id_kelas' => $request->id_kelas,
                'nis' => $request->nis,
                'nama_siswa' => $request->nama_siswa,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'tahun_angkatan' => $request->tahun_angkatan,
                'no_wa_ortu' => $request->no_wa_ortu,
                'foto' => $imageName,
            ]);
        } else {
            Siswa::where('id_siswa', $request->id)->update([
                'id_kelas' => $request->id_kelas,
                'nis' => $request->nis,
                'nama_siswa' => $request->nama_siswa,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_wa_ortu' => $request->no_wa_ortu,
                'tahun_angkatan' => $request->tahun_angkatan,
            ]);
        }

        return redirect()->back()->with('message', 'Siswa Berhasil di update');
    }

    // CRUD PENGGUNA
    public function createPengguna(Request $request)
    {
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->email),
            'role' => $request->tipe_pengguna,
        ]);
        return redirect('/admin/pengguna')->with('message', 'Pengguna Berhasil di tambahkan');
    }

    public function updatePengguna(Request $request)
    {
        $user = User::where([
            ['id', '=', $request->id]
        ])->first();
        $user->update([
            'name' => $request->nama,
            'email' => $request->email,
            'role' => $request->tipe_pengguna,
        ]);
        return redirect('/admin/pengguna')->with('message', 'Pengguna Berhasil di update');
    }

    public function deletePengguna(Request $request)
    {
        User::destroy($request->post('user_id'));
        return 1;
    }
}
