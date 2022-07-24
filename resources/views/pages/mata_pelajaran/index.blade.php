@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data Mata Pelajaran</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data Pengguna ..." id="searchbox">
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" id="btn-tambah" data-target="#modalPengguna"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover tableku table-action-hover" id="table-data">
                        <thead>
                            <tr>
                                <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
                                <th>Kode mata pelajaran</th>
                                <th>Nama mata pelajaran</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mata_pelajaran as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->kode_mata_pelajaran }}</td>
                                    <td>{{ $row->nama_mata_pelajaran }}</td>
                                    <td class="option">
                                        <div class="btn-group dropleft btn-option">
                                            <i type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </i>
                                            <div class="dropdown-menu">
                                                {{-- <a data-pengguna='@json($row)' data-toggle="modal" data-target="#modalPengguna" class="dropdown-item kaitkan" href="#"><i class="fas fa-link"> Kaitkan data</i></a> --}}
                                                <a data-edit='@json($row)' data-toggle="modal" data-target="#modalPengguna" class="dropdown-item edit" href="#"><i class="fas fa-pen"> Edit</i></a>
                                                <a data-id="{{ $row->id_mata_pelajaran }}" class="dropdown-item hapus" href="#"><i class="fas fa-trash"> Hapus</i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
{{-- modal --}}
<div class="modal fade" id="modalPengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Tambah Tahun ajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="main-body">
                <form id="formku" action="{{ URL::to('/admin/create_mata_pelajaran') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kode_mata_pelajaran">kode mata pelajaran</label>
                        <input type="hidden" class="form-control" name="id" id="id">
                        <input type="text" class="form-control" name="kode_mata_pelajaran" id="kode_mata_pelajaran" value="MP-{{ $random }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_mata_pelajaran">nama mata pelajaran</label>
                        <input type="text" class="form-control" name="nama_mata_pelajaran" id="nama_mata_pelajaran" >
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="modalBtn">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {


        function clear_icon() {
            $('#id_icon').html('');
            $('#post_title_icon').html('');
        }


        $('#btn-tambah').on('click',function(){
            $('#formku').attr('action', '/admin/create_mata_pelajaran');
        })

        $('.tableku tbody').on('click', 'tr td a.edit', function(){
            let dataEdit = $(this).data('edit');
            $('#id').val(dataEdit.id_mata_pelajaran);
            $('#kode_mata_pelajaran').val(dataEdit.kode_mata_pelajaran);
            $('#nama_mata_pelajaran').val(dataEdit.nama_mata_pelajaran);
            $('#formku').attr('action', '/admin/update_mata_pelajaran');
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
                        , url: '/admin/delete_mata_pelajaran'
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
    $('#liTahunAjaran').addClass('active');

</script>
@endsection
