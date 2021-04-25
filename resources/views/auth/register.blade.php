@extends('layouts.auth')
@section('content')
<form class="register-form" method="POST" action="{{ route('register') }}" novalidate="novalidate" style="display: block;">
    @csrf

    <h3>Sign Up</h3>
    <p class="hint">
        Enter your personal details below:
    </p>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Full Name</label>
        <input class="form-control placeholder-no-fix" type="text" placeholder="Your name" name="name" :value="old('name')" required autofocus>
    </div>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" :value="old('email')" required>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <input class="form-control placeholder-no-fix" type="password" id="register_password" placeholder="Password" name="password" required autocomplete="new-password">
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="confirmation Password" name="password_confirmation" required>
    </div>
    <div class="form-actions">
        <button type="button" id="register-back-btn" class="btn btn-default" onclick="goBack()">Back</button>
        <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
    </div>
</form>
@endsection
