@extends('layouts.v_template')

@section('content')
<section class="section">
    @if ($jadwal_mengajar->count() > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header">
                    <h4>Kelas Mata Pelajaran</h4>
                </div>
                <div div class="card-body">
                    <select id="jadwal_mengajar" class="form-control">
                        <option value="">--pilih jadwal Mengajar --</option>
                        @foreach ($jadwal_mengajar as $row)
                        <option data-detail_jadwal='@json($row)' data-detail_kelas='@json($row->kelas)' data-detail_mata_pelajaran='@json($row->mataPelajaran)' value="{{ $row->id_kelas }}">{{ $row->mataPelajaran->kode_mata_pelajaran
                            }} - {{ $row->mataPelajaran->nama_mata_pelajaran }} - {{ $row->kelas->nama_kelas }}</option>
                        @endforeach
                    </select>
                    <div id="jadwal-detail-wrapper" class="mt-3">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    @if (session('message'))
                    {{ sweetAlert(session('message'), 'success') }}
                    @endif
                    <h4 id="labelPertemuan">Presensi</h4>
                </div>
                <div class="card-body" id="siswa-perkelas"
                    data-asset_url="{{ asset('img/svg_animated/loading.svg') }}">
                    <div id="loading">
                        <img src="{{ asset('img/svg_animated/loading.svg') }}" alt="" width="100">
                    </div>
                    <div class="ilustration-wrapper text-center">
                        <img src="{{ asset('img/svg/ilustration/list.svg') }}" alt="" width="300">
                        <p class="mt-3 mb-0">Pilih jadwal untuk melihat daftar siswa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header">
                    <h4>Kelas Mata pelajaran</h4>
                </div>
                <div div class="card-body">
                    Belum ada data
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection
@section('script')
<script>
    $(document).ready(function() {

        $('#jadwal_mengajar').on('change', function() {
        let idKelas = $(this).val();
        let detailMataPelajaran = $(this).find(':selected').data('detail_mata_pelajaran');
        let detailJadwal = $(this).find(':selected').data('detail_jadwal');
        let detailKelas = $(this).find(':selected').data('detail_kelas');
        console.log(detailJadwal);
        if(detailJadwal){
            let detailHTML = '<table cellpadding="10" style="width:100%">';
            detailHTML += '<tr>';
            detailHTML += '<td class="bg-soft-primary">Kode Mata Pealajaran</td>';
            detailHTML += '<td>' + detailMataPelajaran.kode_mata_pelajaran + '</td>';
            detailHTML += '</tr>';
            detailHTML += '<tr>';
            detailHTML += '<td class="bg-soft-primary">Mata pELAJARAN</td>';
            detailHTML += '<td>' + detailMataPelajaran.nama_mata_pelajaran + '</td>';
            detailHTML += '</tr>';
            detailHTML += '<tr>';
            detailHTML += '<td class="bg-soft-primary">Hari/jam</td>';
            detailHTML += '<td>' + detailJadwal.hari + '/' + detailJadwal.jam_mengajar + ' SKS</td>';
            detailHTML += '</tr>';
            detailHTML += '<tr>';
            detailHTML += '<td class="bg-soft-primary">Kelas</td>';
            detailHTML += '<td>' + detailKelas.nama_kelas + '</td>';
            detailHTML += '</tr>';
            detailHTML += '<tr>';
            detailHTML += '<td class="bg-soft-primary">Jam ke</td>';
            detailHTML += '<td>' + detailJadwal.jam_ke + '</td>';
            detailHTML += '</tr>';
            detailHTML += '<tr>';
            detailHTML += '<td class="bg-soft-primary">Pertemuan Ke</td>';
            let jmlPertemuan = 10;
            detailHTML += '<td>';
            detailHTML += '<select class="form-control" id="pertemuan">';
                detailHTML += '<option value="">-- pilih pertemuan --</option>';
            for (let i = 1; i <= jmlPertemuan; i++) {
                detailHTML += '<option>' + i + '</option>';
            }
            detailHTML += '</select>';
            detailHTML += '</td>';
            detailHTML += '</tr>';
            detailHTML += '</table>';
            $('#jadwal-detail-wrapper').html(detailHTML);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , url: '/guru/get_siswa_per_kelas'
                , method: 'post'
                , dataType: 'json'
                , data: {
                    id_kelas: detailKelas.id_kelas
                }
                , beforeSend: function() {
                    showLoading('#button-wrapper', 40, false);
                    showLoading('.form-control', 40, true);
                }
                , complete: function() {
                    $('.loading').remove();
                }
                , success: function(data) {
                            $('#pertemuan').on('change', function() {
                            let pertemuan = $(this).val();
                            if(pertemuan){
                            let tableHTML = "";
                            tableHTML += '<form id="form-absen" action="/guru/create_absen_per_kelas" method="post">';
                            tableHTML += '@csrf';
                            tableHTML += '<table class="table table-striped" id="table-data">';
                            tableHTML += '<thead>';
                            tableHTML += '<tr>';
                            tableHTML += '<td>#</td>';
                            tableHTML += '<td>Nama siswa</td>';
                            tableHTML += '<td>Nis</td>';
                            tableHTML += '<td>Status Kehadiran</td>';
                            tableHTML += '</tr>';
                            tableHTML += '</thead>'
                            tableHTML += '<tbody>';
                            for (i in data) {
                                tableHTML += '<tr>';
                                tableHTML += '<td>' + (parseInt(i) + 1) + '</td>';
                                tableHTML += '<td>' + data[i].nama_siswa + '</td>';
                                tableHTML += '<td>' + data[i].nis + '</td>';
                                tableHTML += '<td>';

                                function absen(status_kehadiran) {
                                    return [
                                        // "p" + pertemuan
                                        data[i].id_siswa
                                        , status_kehadiran
                                    ];
                                }
                                tableHTML += '<select class="form-control status_kehadiran'+data[i].id_siswa+'" name="status_kehadiran[]" id="status_kehadiran">';
                                tableHTML += '<option value="' + absen(1) + '">Hadir</option>';
                                tableHTML += '<option value="' + absen(0) + '">Alpa</option>';
                                tableHTML += '<option value="' + absen(2) + '">izin</option>';
                                tableHTML += '</select>';
                                tableHTML += '<input type="hidden" value="' + detailKelas.id_kelas + '" name="id_kelas">';
                                tableHTML += '<input type="hidden" value="' + pertemuan + '" name="pertemuan_ke">';
                                tableHTML += '</td>';
                                tableHTML += '</tr>';
                            }
                            tableHTML += '</tbody>';
                            tableHTML += '</table>';
                            tableHTML += '<div id="button-wrapper">-</div>';
                            tableHTML += '</div>';
                            tableHTML += '</form>';

                            $('#siswa-perkelas').html(tableHTML);

                                }
                                $('#labelPertemuan').html('Pertemuan Ke ' + pertemuan);
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                    , url: '/guru/get_absen_per_kelas'
                                    , method: 'post'
                                    , dataType: 'json'
                                    , data: {
                                        id_kelas: detailKelas.id_kelas,
                                        pertemuan_ke: pertemuan
                                    }
                                    , beforeSend: function() {
                                        $("#loading").show();
                                        $("#loading").css('zIndex', '5');
                                    }
                                    , complete: function() {
                                        $("#loading").hide();
                                        $("#loading").css('zIndex', '-5');
                                    }
                                    , success: function(data) {
                                        console.log(data);
                                        if(data.length > 0){
                                            $('#button-wrapper').html('<button type="submit" id="btn-update-absen" class="form-control text-white btn btn-info"><i class="fas fa-save"></i> Update</button>');
                                            $('#form-absen').attr('action', '/guru/update_absen_per_kelas')
                                        } else {
                                            $('#form-absen').attr('action', '/guru/create_absen_per_kelas')
                                            $('#button-wrapper').html('<button type="submit" id="btn-simpan-absen" class="form-control text-white btn btn-primary"><i class="fas fa-save"></i> Simpan</button>')
                                        }
                                        for(i in data) {
                                            $('.status_kehadiran' + data[i].id_siswa).val(data[i].id_siswa + "," + data[i].status_kehadiran);
                                        }

                                    }
                                });
                            })


                }
                , error: function(err) {
                    console.log(err)
                }
            });

        } else {
            $('#jadwal-detail-wrapper').html("");
            $('#siswa-perkelas').html('<div class="ilustration-wrapper text-center"><img src="{{ asset("img/svg/ilustration/list.svg") }}" alt="" width="300"><p class="mt-3 mb-0">Pilih jadwal untuk melihat daftar siswa</p></div>');
        }
    });


    // MENGUPDATE ABSEN DENGAN AJAX
    $(document).on('click', '#btn-update-absen', function(e) {
        e.preventDefault();
        let dataAbsen = $('#form-absen').serializeArray();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , url: '/guru/update_absen_per_kelas'
            , method: 'post'
            , dataType: 'json'
            , data: dataAbsen
            , beforeSend: function() {
                showLoading('#button-wrapper', 40, false);
                showLoading('.form-control', 40, true);
            }
            , complete: function() {
                $('.loading').remove();
            }
            , success: function(data) {
                if (data == 1) {
                    Swal.fire('Berhasil', 'Data telah tersimpan', 'success').then((result) => {
                        $('#button-wrapper').html('<button type="submit" id="btn-update-absen" class="form-control text-white btn btn-info"><i class="fas fa-save"></i> Update</button>');
                        $('#form-absen').attr('action', '/guru/update_absen_per_kelas')
                    });
                }
            }
            , error: function(err) {
                console.log(err)
            }
        });
    })

    //MENYIMPAN ABSEN DENGAN AJAX
    $(document).on('click', '#btn-simpan-absen', function(e) {
        e.preventDefault();
        let dataAbsen = $('#form-absen').serializeArray();


        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , url: '/guru/create_absen_per_kelas'
                , method: 'post'
                , dataType: 'json'
                , data: dataAbsen
                , beforeSend: function() {
                    showLoading('#button-wrapper', 40, false);
                    showLoading('.form-control', 40, true);
                }
                , complete: function() {
                    $('.loading').remove();
                }
                , success: function(data) {
                    if (data == 1) {
                        Swal.fire('Berhasil', 'Data telah tersimpan', 'success').then((result) => {
                            $('#button-wrapper').html('<button type="submit" id="btn-update-absen" class="form-control text-white btn btn-info"><i class="fas fa-save"></i> Update</button>');
                            $('#form-absen').attr('action', '/guru/update_absen_per_kelas')
                        });
                    }
                }
                , error: function(err) {
                    console.log(err)
                }
            });



    })


        function clear_icon() {
            $('#id_icon').html('');
            $('#post_title_icon').html('');
        }


        $('#btn-tambah').on('click',function(){
            $('#formku').attr('action', '/admin/create_semester');
        })

        $('.tableku tbody').on('click', 'tr td a.edit', function(){
            let dataEdit = $(this).data('edit');
            $('#id').val(dataEdit.id_semester);
            $('#semester').val(dataEdit.semester);
            $('#formku').attr('action', '/admin/update_semester');
        })


        // TOMBOL HAPUS
        $('.tableku tbody').on('click', 'tr td a.hapus', function() {
            let id = $(this).data('id');
            Swal.fire({
                title: 'Apakah yakin?'
                , text: "Data tidak bisa kembali lagi!"
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Ya, Konfirmasi'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        , url: '/admin/delete_semester'
                        , method: 'post'
                        , dataType: 'json'
                        , data: {
                            id: id
                        }
                        , success: function(data) {
                            if (data == 1) {
                                Swal.fire('Berhasil', 'Data telah terhapus', 'success').then((result) => {
                                    location.reload();
                                });
                            }
                        }
                    })
                }
            })
        });





    });

    $('#liDataUmum').addClass('active submenu');
    $('#liDataUmum #base').addClass('show');
    $('#liPresensi').addClass('active');

</script>
@endsection
