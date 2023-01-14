@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data Rekap Absen</h4>
                        <div class="table-tools d-flex justify-content-around ">
                        <select id="kelas" class="form-control mx-2">
                                <option value="0">--pilih Kelas --</option>
                                @foreach ($kelas as $row)
                                <option {{ $id_kelas == $row->id_kelas ? "selected" :'' }} value="{{ $row->id_kelas}}">{{ $row->nama_kelas }}</option>
                                @endforeach
                            </select>
                            <select id="semester" class="form-control mx-2">
                                <option value="0">--pilih Semester --</option>
                                @foreach ($semester as $row)
                                <option {{ $id_semester == $row->id_semester ? "selected" :'' }} value="{{ $row->id_semester }}">{{ $row->semester }}</option>
                                @endforeach
                            </select>
                            <select id="jadwal_mengajar" class="form-control mx-2">
                                <option value="0">--pilih Mata pelajaran --</option>
                                @foreach ($jadwal_mengajar as $row)
                                <option {{ $id_mata_pelajaran == $row->id_mata_pelajaran ? "selected" :'' }} value="{{ $row->id_mata_pelajaran }}">{{ $row->mataPelajaran->id_mata_pelajaran }} - {{ $row->mataPelajaran->kode_mata_pelajaran
                                    }} - {{ $row->mataPelajaran->nama_mata_pelajaran }} - {{ $row->kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                            <a href="" type="button" class="btn btn-primary btn-cetak float-right" ><i class="fas fa-print"></i></a>
                        </div>
                </div>
                <div class="card-body">
                    @foreach ($anak_wali as $row)
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

        $('#jadwal_mengajar').on('change',function(){
            let id_jadwal = $(this).val();
            let id_semester = $('#semester').val();
            let id_kelas = $('#kelas').val();
            document.location.href = '/wali_kelas/rekap_absen/' + id_jadwal + '/' + id_semester + '/' + id_kelas;
        });
        
        $('#semester').on('change',function(){
            let id_semester = $(this).val();
            let id_kelas = $('#kelas').val();
            let id_jadwal = $('#jadwal_mengajar').val();
            document.location.href = '/wali_kelas/rekap_absen/' + id_jadwal + '/' + id_semester + '/' + id_kelas;
        });

        $('#kelas').on('change',function(){
            let id_semester = $('#semester').val();
            let id_jadwal = $('#jadwal_mengajar').val();
            let id_kelas = $(this).val();
            document.location.href = '/wali_kelas/rekap_absen/' + id_jadwal + '/' + id_semester + '/' + id_kelas;
        });
        
        $('.btn-cetak').on('click', function(e){
            e.preventDefault();
            let id_jadwal = $('#jadwal_mengajar').val();
            let id_semester = $('#semester').val();
            let id_kelas = $('#kelas').val();
            document.location.href = '/wali_kelas/cetak_absen/' + id_jadwal + '/' + id_semester + '/' + id_kelas;
        })




    });


    $('#liRekapAbsen').addClass('active');

</script>
@endsection
