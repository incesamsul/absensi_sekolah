@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data Tahun ajaran</h4>
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
                                <th>Tahun ajaran</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tahun_ajaran as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->tahun_ajaran }}</td>
                                    <td>
                                        @if ($row->status == 1)
                                        <span class="badge badge-success">Aktif</span>
                                        @else
                                        <a href="{{ URL::to('/admin/aktifkan_tahun_ajaran/' . $row->id_tahun_ajaran) }}" class="badge badge-danger">Tidak Aktif</a>
                                        @endif
                                    </td>
                                    <td class="option">
                                        <div class="btn-group dropleft btn-option">
                                            <i type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </i>
                                            <div class="dropdown-menu">
                                                {{-- <a data-pengguna='@json($row)' data-toggle="modal" data-target="#modalPengguna" class="dropdown-item kaitkan" href="#"><i class="fas fa-link"> Kaitkan data</i></a> --}}
                                                <a data-edit='@json($row)' data-toggle="modal" data-target="#modalPengguna" class="dropdown-item edit" href="#"><i class="fas fa-pen"> Edit</i></a>
                                                <a data-id="{{ $row->id_tahun_ajaran }}" class="dropdown-item hapus" href="#"><i class="fas fa-trash"> Hapus</i></a>
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
                <form id="formku" action="{{ URL::to('/admin/create_tahun_ajaran') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tahun_ajaran">tahun_ajaran</label>
                        <input type="hidden" class="form-control" name="id" id="id">
                        <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran" >
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
            $('#formku').attr('action', '/admin/create_tahun_ajaran');
        })

        $('.tableku tbody').on('click', 'tr td a.edit', function(){
            let dataEdit = $(this).data('edit');
            $('#id').val(dataEdit.id_tahun_ajaran);
            $('#tahun_ajaran').val(dataEdit.tahun_ajaran);
            $('#formku').attr('action', '/admin/update_tahun_ajaran');
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
                        , url: '/admin/delete_tahun_ajaran'
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
