@extends('layouts.auth')
@section('content')
<form class="login-form" method="POST" action="{{route('login')}}" novalidate="novalidate" style="display: block;">
    @csrf
    <h3 class="form-title">Sign In</h3>

    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Username</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" placeholder="Username" name="email" :value="old('email')" required autofocus>
    </div>

    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="password"  placeholder="Password" name="password" required autocomplete="current-password">
    </div>
    
    <div class="form-actions">
        <button type="submit" class="btn btn-success uppercase">Login</button>
        <label class="rememberme check">
           <span><input type="checkbox" name="remember" value="1"></span>Remember
        </label>
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" id="forget-password" class="forget-password">Forgot Password?</a>
        @endif
    </div>
    
    <div class="create-account">
        <p>
            <a href="{{ route('register') }}" id="register-btn" class="uppercase">Create an account</a>
        </p>
    </div>
</form>
@endsection
