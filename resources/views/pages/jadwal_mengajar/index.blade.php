@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data Jadwal Mengajar</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data Pengguna ..." id="searchbox">
                        @if (auth()->user()->role == 'Administrator')
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" id="btn-tambah" data-target="#modalPengguna"><i class="fas fa-plus"></i></button>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover tableku table-action-hover" id="table-data">
                        <thead>
                            <tr>
                                <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
                                <th>Guru</th>
                                <th>MataPelajaran </th>
                                <th>Kelas</th>
                                <th>TA/Semester</th>
                                <th>Hari/Jam</th>
                                <th>Jam ke</th>
                                @if (auth()->user()->role == 'Administrator')
                                <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal_mengajar as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->guru->name }}</td>
                                    <td>{{ $row->mataPelajaran->nama_mata_pelajaran }}</td>
                                    <td>{{ $row->kelas->nama_kelas }}</td>
                                    <td>{{ $row->tahunAjaran->tahun_ajaran . '/' . $row->semester->semester }}</td>
                                    <td>{{ $row->hari . '/' . $row->jam_mengajar }}</td>
                                    <td>{{ $row->jam_ke }}</td>
                                    @if (auth()->user()->role == 'Administrator')
                                    <td class="option">
                                        <div class="btn-group dropleft btn-option">
                                            <i type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </i>
                                            <div class="dropdown-menu">
                                                {{-- <a data-pengguna='@json($row)' data-toggle="modal" data-target="#modalPengguna" class="dropdown-item kaitkan" href="#"><i class="fas fa-link"> Kaitkan data</i></a> --}}
                                                <a data-edit='@json($row)' data-toggle="modal" data-target="#modalPengguna" class="dropdown-item edit" href="#"><i class="fas fa-pen"> Edit</i></a>
                                                <a data-id_guru="{{ $row->id_guru }}" data-id="{{ $row->id_jadwal_mengajar }}" class="dropdown-item hapus" href="#"><i class="fas fa-trash"> Hapus</i></a>
                                            </div>
                                        </div>
                                    </td>
                                    @endif
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
                <h5 class="modal-title" id="ModalLabel">Tambah jadwal mengajar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="main-body">
                <form id="formku" action="{{ URL::to('/admin/create_jadwal_mengajar') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_guru">Guru</label>
                        <input type="hidden" class="form-control" name="id" id="id">
                        <select name="id_guru" id="id_guru" class="form-control">
                            @foreach ($guru as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_kelas">Kelas</label>
                        <select name="id_kelas" id="id_kelas" class="form-control">
                            @foreach ($kelas as $row)
                                <option value="{{ $row->id_kelas }}">{{ $row->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_mata_pelajaran">Mata Pelajaran</label>
                        <select name="id_mata_pelajaran" id="id_mata_pelajaran" class="form-control">
                            @foreach ($mata_pelajaran as $row)
                                <option value="{{ $row->id_mata_pelajaran }}">{{ $row->nama_mata_pelajaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <select name="hari" id="hari" class="form-control" >
                                <option>senin</option>
                                <option>selasa</option>
                                <option>rabu</option>
                                <option>kamis</option>
                                <option>jumat</option>
                                <option>sabtu</option>
                                <option>minggu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jam_mengajar">jam mengajar</label>
                        <input type="time" name="jam_mengajar" id="jam_mengajar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jam_ke">Jam ke</label>
                        <input type="number" name="jam_ke" id="jam_ke" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="id_semester">Semester</label>
                        <select name="id_semester" id="id_semester" class="form-control" readonly>
                                <option value="{{ $semester->id_semester }}">{{ $semester->semester }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_tahun_ajaran">Tahun ajaran</label>
                        <select name="id_tahun_ajaran" id="id_tahun_ajaran" class="form-control" readonly>
                                <option value="{{ $tahun_ajaran->id_tahun_ajaran }}">{{ $tahun_ajaran->tahun_ajaran }}</option>
                        </select>
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
            $('#formku').attr('action', '/admin/create_jadwal_mengajar');
        })

        $('.tableku tbody').on('click', 'tr td a.edit', function(){
            let dataEdit = $(this).data('edit');
            $('#id').val(dataEdit.id_jadwal_mengajar);
            $('#id_guru').val(dataEdit.id_guru);
            $('#id_kelas').val(dataEdit.id_kelas);
            $('#id_mata_pelajaran').val(dataEdit.id_mata_pelajaran);
            $('#id_semester').val(dataEdit.id_semester);
            $('#id_tahun_ajaran').val(dataEdit.id_tahun_ajaran);
            $('#jam_mengajar').val(dataEdit.jam_mengajar);
            $('#jam_ke').val(dataEdit.jam_ke);
            $('#formku').attr('action', '/admin/update_jadwal_mengajar');
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
                        , url: '/admin/delete_jadwal_mengajar'
                        , method: 'post'
                        , dataType: 'json'
                        , data: {
                            id: id,
                            id_guru: idGuru
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

    $('#liJadwalMengajar').addClass('active');

</script>
@endsection
