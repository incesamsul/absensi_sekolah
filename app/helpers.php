<?php

use App\Models\Absensi;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use phpDocumentor\Reflection\Types\Null_;
use PhpParser\Node\Expr\FuncCall;
use Twilio\Rest\Client;

use function PHPUnit\Framework\isNull;



function getJumlahIzin($idSiswa, $idMataPelajaran){
    return Absensi::where('id_siswa',$idSiswa)->where('id_mata_pelajaran',$idMataPelajaran)->where('status_kehadiran','2')->count();
}

function getJumlahAlpa($idSiswa, $idMataPelajaran){
    return Absensi::where('id_siswa',$idSiswa)->where('id_mata_pelajaran',$idMataPelajaran)->where('status_kehadiran','0')->count();
}

function getJumlahHadir($idSiswa, $idMataPelajaran){
    return Absensi::where('id_siswa',$idSiswa)->where('id_mata_pelajaran',$idMataPelajaran)->where('status_kehadiran','1')->count();
}

function getStatusKehadiranPerSiswa($idSiswa, $idMataPelajaran, $pertemuanKe){
    return Absensi::where('id_siswa',$idSiswa)->where('id_mata_pelajaran',$idMataPelajaran)->where('pertemuan_ke',$pertemuanKe)->select('status_kehadiran')->first();
}

function getKetPresensi($kodeKehadiran)
{
    if ($kodeKehadiran == 0) {
        return "alpa";
    } else if ($kodeKehadiran == 1) {
        return "hadir";
    } else if ($kodeKehadiran == 99){
        return "none";
    } else {
        return "izin";
    }
}

function sendNotification($message, $noWa)
{


    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md

    $sid    = "AC80c49cc0f6ee0b7b01a332c886df472a";
    $token  = "82ca2c5faf79749ef7ddc73a5da29cfd";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
        ->create(
            "whatsapp:+" . $noWa, // to
            array(
                "from" => "whatsapp:+14155238886",
                "body" => $message
            )
        );

    // print($message->sid);
}

function generateRandomString($length = 25)
{
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function removeSpace($string)
{
    return str_replace(" ", "", $string);
}

function getUserRoleName($userRoleId)
{
    return DB::table('users')
        ->Join('role', 'role.id_role', '=', 'users.id_role')
        ->where('users.id_role', $userRoleId)
        ->select('nama_role')
        ->first()->nama_role;
}


function sweetAlert($pesan, $tipe)
{
    echo '<script>document.addEventListener("DOMContentLoaded", function() {
        Swal.fire(
            "' . $pesan . '",
            "proses berhasil di lakukan",
            "' . $tipe . '",
        );
    })</script>';
}
