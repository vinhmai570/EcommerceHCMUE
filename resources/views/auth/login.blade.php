<h3>My account</h3>
<form class="form-horizontal" method="POST" action="{{route('login')}}">
    @csrf
    <div class="acc-name">
        <input class="form-control" type="text" placeholder="Account name" id="inputacname" name="email" :value="old('email')" required autofocus>
    </div>
    <div class="acc-pass">
        <input class="form-control" placeholder="Password" id="inputpass" type="password" name="password" required autocomplete="current-password">
    </div>
    <div class="remember">
        <input type="checkbox" id="me" name="remember" />
        <label for="me">remember me</label>
        <a class="help" href="#" title="help ?">help?</a>
    </div>
    <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
        <a class="help" href="{{ route('password.request') }}" title="help ?">{{ __('Forgot your password?') }}</a>
        </a>
        @endif
    </div>
    <button type="submit" class="link-button">Submit</button>
</form>