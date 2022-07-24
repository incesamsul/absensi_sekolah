<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Absensi siswa</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('/atlantis/assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/atlantis/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
{{-- csrf token --}}
<meta name="csrf-token" content="{{ csrf_token() }}" />
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('atlantis/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('atlantis/assets/css/atlantis.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>


@if (session('message'))
{{ sweetAlert(session('message'), 'success') }}
@endif
@if (session('error'))
{{ sweetAlert(session('error'), 'warning') }}
@endif
<div id="my-loader">
    <img src="{{ asset('img/svg_animated/loading.svg') }}" alt="loading">
</div>
