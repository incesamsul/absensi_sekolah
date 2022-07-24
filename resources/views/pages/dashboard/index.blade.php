@extends('layouts.v_template')

@section('content')
<div class="row mt--2">
    <div class="col-md-6">
        <div class="card full-height">
            <div class="card-body">
                <div class="card-title">
                    <center>
                        <img src="{{ asset('img/smak.png') }}" width="100">
                        <br>
                        <b>SMA Kristen Elim</b>
                    </center>
                </div>
                <div class="card-category">
                    <center>
Jalan Perintis Kemerdekaan KM. 11, Pai, Makassar, Tamalanrea,<br> Kec. Tamalanrea, Provinsi Sulawesi Selatan, Kode Pos (90242) <br>
<b>Email : info@sekolahelimmakassar.sch.id, Telp 0411582155 </b>
                    </center>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
        <!-- 	<div class="card-header">
                <h4 class="card-title">Nav Pills With Icon (Horizontal Tabs)</h4>
            </div> -->
            <div class="card-body">

                <div class="row">

                        <div class="col-sm-6 col-md-6">
                            <div class="card card-stats card-secondary card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-users"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Siswa</p>
                                                <h4 class="card-title">{{ count($siswa) }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="card card-stats card-default card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Guru</p>
                                                <h4 class="card-title">{{ count($guru) }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="row mt--2">
    <div class="col-md-6">
        <div class="card full-height">
            <div class="card-body">
                <div class="card-title"> statistics Absen</div>
                <div class="card-category">Data realtime dari absen</div>
                <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div id="circles-1"></div>
                        <h6 class="fw-bold mt-3 mb-0">Rata rata Izin</h6>
                    </div>
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div id="circles-2"></div>
                        <h6 class="fw-bold mt-3 mb-0">Rata rata Alpa</h6>
                    </div>
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div id="circles-3"></div>
                        <h6 class="fw-bold mt-3 mb-0">Rata rata Hadir</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('script')
<script>
    var loadFile = function(event){
        var output = document.querySelector('#preview');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
    Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

    $('#liDahshboard').addClass('active');
</script>
@endsection

