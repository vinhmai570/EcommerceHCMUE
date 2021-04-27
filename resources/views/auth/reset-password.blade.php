<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>reset-password </title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="{{ asset('admin/pages/css/login.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- BEGIN THEME STYLES -->
	<link href="{{ asset('admin/css/components.css') }}" rel="stylesheet" type="text/css" />
	<!-- END THEME STYLES -->
</head>

<body class="login">
	<div class="menu-toggler sidebar-toggler"></div>
	<!-- BEGIN LOGO -->
	<div class="logo">
		<a href="{{route('home')}}">
			<img src="{{asset('frontend/images/Dana-menu-logo.png')}}" alt="" />
		</a>
	</div>

	<div class="content">
		<!-- BEGIN LOGIN FORM -->
		<form action="{{ route('password.update') }}" method="POST">
			@csrf
			<!-- Password Reset Token -->
			<input type="hidden" name="token" value="{{ $request->route('token') }}">

			<h3>Reset Password ?</h3>
			<x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />

			<!-- Validation Errors -->
			<x-auth-validation-errors class="mb-4 alert alert-danger " :errors="$errors" />

			<!-- Email Address -->
			<div class="form-group">
				<p>Email</p>
				<input class="form-control placeholder-no-fix" id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus />
			</div>

			<!-- Password -->
			<div class="form-group">
				<p>Password</p>
				<input class="form-control placeholder-no-fix" id="password" class="block mt-1 w-full" type="password" name="password" required />
			</div>

			<!-- Confirm Password -->
			<div class="form-group">
				<p>Confirm Password</p>
				<input class="form-control placeholder-no-fix" id="password_confirmation" type="password" name="password_confirmation" required />
			</div>
			
			<div class="form-actions">
				<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
			</div>
		</form>
	</div>
</body>
</html>

