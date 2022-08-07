@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data Rekap Absen</h4>
                        <div class="table-tools d-flex justify-content-around ">
                            {{-- <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data Pengguna ..." id="searchbox"> --}}
                            <a href="{{ URL::to('/wali_kelas/cetak_absen') }}" type="button" class="btn btn-primary float-right" ><i class="fas fa-print"></i></a>
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





    });


    $('#liRekapAbsen').addClass('active');

</script>
@endsection
