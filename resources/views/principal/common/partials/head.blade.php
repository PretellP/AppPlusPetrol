<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title', 'APP | PlusPetrol')</title>

	<link rel="stylesheet" href="{{asset('assets/principal/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">

	<!-- General CSS Files -->
	<link rel="stylesheet" href="{{asset('assets/principal/modules/bootstrap/css/bootstrap.min.css')}}">

	<script src="https://kit.fontawesome.com/469f55554f.js" crossorigin="anonymous"></script>

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="{{asset('assets/principal/modules/jqvmap/dist/jqvmap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/principal/modules/summernote/summernote-bs4.css')}}">

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	{{-- Date range picker --}}
	<link rel="stylesheet" href="{{asset('assets/principal/modules/bootstrap-daterangepicker/daterangepicker.css')}}">

	<!-- Template CSS -->
	<link rel="stylesheet" href="{{asset('assets/principal/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/principal/css/components.css')}}">
	<link rel="stylesheet" href="{{asset('assets/principal/css/custom.css')}}">
	<link rel="stylesheet" href="{{asset('assets/common/css/fonts.css')}}">

	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

	@yield('extra-head')

</head>