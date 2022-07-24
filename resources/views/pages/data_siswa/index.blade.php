@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data Siswa</h4>
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
                                <th>Kelas</th>
                                <th>Nis</th>
                                <th>Nama siswa</th>
                                {{-- <th>Tempat / tanggal lahir</th> --}}
                                <th>Jenis kelamin</th>
                                {{-- <th>alamat</th> --}}
                                <th>tahun angkatan</th>
                                <th>foto</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->kelas->nama_kelas }}</td>
                                    <td>{{ $row->nis }}</td>
                                    <td>{{ $row->nama_siswa }}</td>
                                    {{-- <td>{{ $row->tempat_lahir.'/'.$row->tanggal_lahir }}</td> --}}
                                    <td>{{ $row->jenis_kelamin = 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    {{-- <td>{{ $row->alamat }}</td> --}}
                                    <td>{{ $row->tahun_angkatan }}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#modalPreview" data-foto="{{ asset('data/foto_siswa/'.$row->foto) }}" class="btn btn-lihat btn-primary"><i class="fas fa-eye"></i> Lihat</button>
                                    </td>
                                    <td class="option">
                                        <div class="btn-group dropleft btn-option">
                                            <i type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </i>
                                            <div class="dropdown-menu">
                                                {{-- <a data-pengguna='@json($row)' data-toggle="modal" data-target="#modalPengguna" class="dropdown-item kaitkan" href="#"><i class="fas fa-link"> Kaitkan data</i></a> --}}
                                                <a data-edit='@json($row)' data-toggle="modal" data-target="#modalPengguna" class="dropdown-item edit" href="#"><i class="fas fa-pen"> Edit</i></a>
                                                <a  data-id="{{ $row->id_siswa }}" class="dropdown-item hapus" href="#"><i class="fas fa-trash"> Hapus</i></a>
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
  <div class="modal fade" id="modalPreview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Foto siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="" alt="foto siswa" class="img-thumbnail" id="preview_foto_siswa">
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
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
                <form id="formku" action="{{ URL::to('/admin/create_data_siswa') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="id_kelas">Kelas</label>
                        <input type="hidden" id="id" name="id">
                        <select name="id_kelas" id="id_kelas" class="form-control">
                            @foreach ($kelas as $row)
                                <option value="{{ $row->id_kelas }}">{{ $row->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nis">nis</label>
                        <input type="text" class="form-control" name="nis" id="nis">
                    </div>
                    <div class="form-group">
                        <label for="nama_siswa">nama_siswa</label>
                        <input type="text" class="form-control" name="nama_siswa" id="nama_siswa">
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">tempat_lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">tanggal_lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">jenis_kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat">
                    </div>
                    <div class="form-group">
                        <label for="tahun_angkatan">tahun_angkatan</label>
                        <input type="text" class="form-control" name="tahun_angkatan" id="tahun_angkatan">
                    </div>
                    <div class="form-group">
                        <label for="foto">foto</label>
                        <input type="file" class="form-control" name="foto" id="foto">
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

    $('#liDataSiswa').addClass('active');

</script>
@endsection
