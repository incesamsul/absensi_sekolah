<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>rekap absen</title>
</head>
<style>

    body{
        font-family: Arial, Helvetica, sans-serif;
    }

    .text-center{
        text-align: center;
    }

    .text-main{
        color: lightblue;
    }
    .m-0{
        margin: 0;
    }

    .mt-50{
        margin-top: 50px;
    }

    .table{
        width: 100%;
    }

    .table.border-bottom tr td{
        border-bottom: 1px solid grey;
    }
</style>
<body>
    <h1 class="text-center m-0">Rekap<span class="text-main">Absensi</span></h1>
    <h3 class="text-center">SMA KRISTEN ELIM</h3>
    <p class="text-center m-0">Dari 1 april 2022 sampai 3 april 2022</p>

    <table class="table mt-50" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Nama</th>
            <th rowspan="2"> nis</th>
            <th colspan="10">pertemuan</th>
            <th colspan="3">total</th>
        </tr>
        <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>H</th>
            <th>I</th>
            <th>A</th>
        </tr>
        @foreach ($anak_wali as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->nama_siswa }}</td>
            <td>{{ $row->nis }}</td>
            <td>{{ getKetPresensi(getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 1) != null ? getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 1)->status_kehadiran : 99) }}</td>
            <td>{{ getKetPresensi(getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 2) != null ? getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 1)->status_kehadiran : 99) }}</td>
            <td>{{ getKetPresensi(getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 3) != null ? getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 1)->status_kehadiran : 99) }}</td>
            <td>{{ getKetPresensi(getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 4) != null ? getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 1)->status_kehadiran : 99) }}</td>
            <td>{{ getKetPresensi(getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 5) != null ? getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 1)->status_kehadiran : 99) }}</td>
            <td>{{ getKetPresensi(getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 6) != null ? getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 1)->status_kehadiran : 99) }}</td>
            <td>{{ getKetPresensi(getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 7) != null ? getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 1)->status_kehadiran : 99) }}</td>
            <td>{{ getKetPresensi(getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 8) != null ? getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 1)->status_kehadiran : 99) }}</td>
            <td>{{ getKetPresensi(getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 9) != null ? getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 1)->status_kehadiran : 99) }}</td>
            <td>{{ getKetPresensi(getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 10) != null ? getStatusKehadiranPerSiswa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0, 1)->status_kehadiran : 99) }}</td>
            <td>{{ getJumlahHadir($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0)}} </td>
            <td>{{ getJumlahIzin($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0)}} </td>
            <td>{{ getJumlahAlpa($row->id_siswa, isset($row->absensi[0]) ? $row->absensi[0]->id_mata_pelajaran : 0)}} </td>
        </tr>
        @endforeach
    </table>

</body>
</html>
