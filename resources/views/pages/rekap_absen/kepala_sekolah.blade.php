@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data Rekap Absen</h4>
                        {{-- <div class="table-tools d-flex justify-content-around ">
                            <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data Pengguna ..." id="searchbox">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" id="btn-tambah" data-target="#modalPengguna"><i class="fas fa-plus"></i></button>
                        </div> --}}
                        <a data-id_kelas="{{$id_kelas}}" href="" type="button" class="btn btn-primary btn-cetak float-right" ><i class="fas fa-print"></i></a>
                </div>
                <div class="card-body">
                    @if(count($siswa) == 0)
                    <div class="alert alert-warning">Belum ada data siswa</div>
                    @endif
                    @foreach ($siswa as $row)
                    <div class="absensi-group">
                        <label for="siswa" class="my-2">{{ $row->nama_siswa }}</label>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $row->absensi->count() * 10 }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $row->absensi->count() * 10 }}%</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
<script>
    $(document).ready(function() {


        $('.btn-cetak').on('click', function(e){
            e.preventDefault();
            let id_kelas = $(this).data('id_kelas');
            document.location.href = '/kepala_sekolah/cetak_absen/' + id_kelas;
        })


    });


    $('#liPresentasiKehadiran').addClass('active submenu');
    $('#liPresentasiKehadiran #base').addClass('show');
    $('#liKelas' + {{ $id_kelas }}).addClass('active');

</script>
@endsection
