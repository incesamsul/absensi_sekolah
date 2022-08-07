@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data Wakasek Kesiswaan</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data Pengguna ..." id="searchbox">
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" id="btn-tambah" data-target="#modalPengguna"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                <table class="table table-striped table-hover tableku table-action-hover" id="table-data">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                        </tr>
                            
                        </thead>
                        <tbody>
                            @foreach ($wakasek as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    
                                </tr>

                            @endforeach
                        </tbody>
                    
                    </table>
                
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@section('script')
<script>
    $(document).ready(function() {


        function clear_icon() {
            $('#id_icon').html('');
            $('#post_title_icon').html('');
        }

        $('.btn-lihat').on('click',function(){
            let foto = $(this).data('foto');
            $('#preview_foto_siswa').attr('src', foto);
        })

        $('#btn-tambah').on('click',function(){
            $('#formku').attr('action', '/admin/create_data_siswa');
        })

        $('.tableku tbody').on('click', 'tr td a.edit', function(){
            let dataEdit = $(this).data('edit');
            $('#id').val(dataEdit.id_siswa);
            $('#id_kelas').val(dataEdit.id_kelas);
            $('#nis').val(dataEdit.nis);
            $('#nama_siswa').val(dataEdit.nama_siswa);
            $('#tempat_lahir').val(dataEdit.tempat_lahir);
            $('#tanggal_lahir').val(dataEdit.tanggal_lahir);
            $('#jenis_kelamin').val("L");
            $('#alamat').val(dataEdit.alamat);
            $('#no_wa_ortu').val(dataEdit.no_wa_ortu);
            $('#tahun_angkatan').val(dataEdit.tahun_angkatan);
            $('#formku').attr('action', '/admin/update_data_siswa');
        })


        // TOMBOL HAPUS
        $('.tableku tbody').on('click', 'tr td a.hapus', function() {
            let id = $(this).data('id');
            let idGuru = $(this).data('id_guru');
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
                        , url: '/admin/delete_data_siswa'
                        , method: 'post'
                        , dataType: 'json'
                        , data: {
                            id: id,
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

    $('#liDataWakasek').addClass('active');

</script>
@endsection
