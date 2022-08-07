<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\General;
use App\Http\Controllers\Guru;
use App\Http\Controllers\Home;

use App\Http\Controllers\Penilai;

use App\Http\Controllers\UserController;
use App\Http\Controllers\WaliKelas;
use App\Http\Controllers\GuruBk;
use App\Http\Controllers\WakasekKesiswaan;
use App\Http\Controllers\KepalaSekolah;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::post('/postlogin', [LoginController::class, 'postLogin']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/', [LoginController::class, 'login']);
Route::get('/send-notif', [Home::class, 'send']);




Route::get('/tentang_aplikasi', [Home::class, 'tentangAplikasi']);


Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
});

// GENERAL CONTROLLER ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator,guru,guru_bk,wali_kelas,wakasek_kesiswaan,kepala_sekolah']], function () {

    Route::get('/dashboard', [General::class, 'dashboard']);
    Route::get('/profile', [General::class, 'profile']);
    Route::get('/bantuan', [General::class, 'bantuan']);

    Route::post('/ubah_foto_profile', [General::class, 'ubahFotoProfile']);
    Route::post('/ubah_role', [General::class, 'ubahRole']);
});

// GURU ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:guru']], function () {
    Route::group(['prefix' => 'guru'], function () {
        // GET REQUEST
        Route::get('/jadwal_mengajar', [Guru::class, 'jadwalMengajar']);
        Route::get('/presensi', [Guru::class, 'presensi']);
        Route::post('/get_siswa_per_kelas', [Guru::class, 'getSiswaPerKelas']);
        Route::post('/get_absen_per_kelas', [Guru::class, 'getAbsenPerKelas']);
        Route::post('/create_absen_per_kelas', [Guru::class, 'createAbsenPerKelas']);
        Route::post('/update_absen_per_kelas', [Guru::class, 'updateAbsenPerKelas']);
    });
});

// WALI KELAS ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:wali_kelas']], function () {
    Route::group(['prefix' => 'wali_kelas'], function () {
        // GET REQUEST
        Route::get('/rekap_absen', [WaliKelas::class, 'rekapAbsen']);
    });
});

//GURU BK
Route::group(['middleware' => ['auth', 'ceklevel:guru_bk']], function () {
    Route::group(['prefix' => 'guru_bk'], function () {
        // GET REQUEST
        Route::get('/kelas/{id_kelas}', [GuruBk::class, 'rekapAbsen']);
    });
});

//WAKASEK KESISWAAN
Route::group(['middleware' => ['auth', 'ceklevel:wakasek_kesiswaan']], function () {
    Route::group(['prefix' => 'wakasek_kesiswaan'], function () {
        // GET REQUEST
        Route::get('/kelas/{id_kelas}', [WakasekKesiswaan::class, 'rekapAbsen']);
    });
});

//KEPALA SEKOLAH
Route::group(['middleware' => ['auth', 'ceklevel:guru_bk']], function () {
    Route::group(['prefix' => 'kepala_sekolah'], function () {
        // GET REQUEST
        Route::get('/kelas/{id_kelas}', [KepalaSekolah::class, 'rekapAbsen']);
    });
});

// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator']], function () {
    Route::group(['prefix' => 'admin'], function () {
        // GET REQUEST
        Route::get('/pengguna', [Admin::class, 'pengguna']);
        Route::get('/fetch_data', [Admin::class, 'fetchData']);
        Route::get('/kelas', [Admin::class, 'kelas']);
        Route::get('/semester', [Admin::class, 'semester']);
        Route::get('/aktifkan_semester/{id_semester}', [Admin::class, 'aktifkanSemester']);
        Route::get('/aktifkan_tahun_ajaran/{id_tahun_ajaran}', [Admin::class, 'aktifkanTahunAjaran']);
        Route::get('/tahun_ajaran', [Admin::class, 'tahunAjaran']);
        Route::get('/mata_pelajaran', [Admin::class, 'mataPelajaran']);
        Route::get('/wali_kelas', [Admin::class, 'waliKelas']);
        Route::get('/jadwal_mengajar', [Admin::class, 'jadwalMengajar']);
        Route::get('/data_siswa', [Admin::class, 'dataSiswa']);
        Route::get('/data_guru', [Admin::class, 'dataGuru']);
        Route::get('/data_wakasek', [Admin::class, 'dataWakasek']);
        Route::get('/data_kepsek', [Admin::class, 'dataKepsek']);
        

        // CRUD KELAS
        Route::post('/create_kelas', [Admin::class, 'createKelas']);
        Route::post('/update_kelas', [Admin::class, 'updateKelas']);
        Route::post('/delete_kelas', [Admin::class, 'deleteKelas']);

        // CRUD SEMESTER
        Route::post('/create_semester', [Admin::class, 'createSemester']);
        Route::post('/update_semester', [Admin::class, 'updateSemester']);
        Route::post('/delete_semester', [Admin::class, 'deleteSemester']);

        // CRUD TAHUN AJARAN
        Route::post('/create_tahun_ajaran', [Admin::class, 'createTahunAjaran']);
        Route::post('/update_tahun_ajaran', [Admin::class, 'updateTahunAjaran']);
        Route::post('/delete_tahun_ajaran', [Admin::class, 'deleteTahunAjaran']);

        // CRUD MATA PELAJARAN
        Route::post('/create_mata_pelajaran', [Admin::class, 'createMataPelajaran']);
        Route::post('/update_mata_pelajaran', [Admin::class, 'updateMataPelajaran']);
        Route::post('/delete_mata_pelajaran', [Admin::class, 'deleteMataPelajaran']);

        // CRUD WALI KELAS
        Route::post('/create_wali_kelas', [Admin::class, 'createWaliKelas']);
        Route::post('/update_wali_kelas', [Admin::class, 'updateWaliKelas']);
        Route::post('/delete_wali_kelas', [Admin::class, 'deleteWaliKelas']);

        // CRUD JADWAL MENGAJAR
        Route::post('/create_jadwal_mengajar', [Admin::class, 'createJadwalMengajar']);
        Route::post('/update_jadwal_mengajar', [Admin::class, 'updateJadwalMengajar']);
        Route::post('/delete_jadwal_mengajar', [Admin::class, 'deleteJadwalMengajar']);

        // CRUD DATA SISWA
        Route::post('/create_data_siswa', [Admin::class, 'createDataSiswa']);
        Route::post('/update_data_siswa', [Admin::class, 'updateDataSiswa']);
        Route::post('/delete_data_siswa', [Admin::class, 'deleteDataSiswa']);

        // CRUD PENGGUNA
        Route::post('/create_pengguna', [Admin::class, 'createPengguna']);
        Route::post('/update_pengguna', [Admin::class, 'updatePengguna']);
        Route::post('/delete_pengguna', [Admin::class, 'deletePengguna']);
    });
});
