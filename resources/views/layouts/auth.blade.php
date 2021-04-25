<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>auth </title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="{{ asset('admin/pages/css/login.css') }}" rel="stylesheet" type="text/css" />

	<!-- BEGIN THEME STYLES -->
	<link href="{{ asset('admin/css/components.css') }}" rel="stylesheet" type="text/css" />

	<!-- END THEME STYLES -->
</head>

<body class="login">
	<div class="menu-toggler sidebar-toggler">
	</div>

	<!-- BEGIN LOGO -->
	<div class="logo">
		<a href="{{route('home')}}">
			<img src="{{asset('frontend/images/Dana-menu-logo.png')}}" alt="" />
		</a>
	</div>

	<div class="content">
		<!-- Session Status -->
		<x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />
		<!-- Validation Errors -->
		<x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />
		<!-- BEGIN LOGIN FORM -->

		@yield('content')

	</div>

	<script>
		function goBack() {
			window.history.back();
		}
	</script>
</body>

</html>