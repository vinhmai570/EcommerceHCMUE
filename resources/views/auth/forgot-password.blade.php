@extends('layouts.auth')
@section('content')
<form action="{{ route('password.email') }}" method="POST">
	@csrf
	<h3>Forget Password ?</h3>

	<p>Enter your e-mail address below to reset your password.</p>

	<div class="form-group">
		<input class="form-control placeholder-no-fix" id="email" type="email" name="email" :value="old('email')" required autofocus />
	</div>

	<div class="form-actions">
		<button type="button" id="register-back-btn" class="btn btn-default" onclick="goBack()">Back</button>
		<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
	</div>

</form>
@endsection
