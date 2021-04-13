<h3>Or register</h3>
<form class="form-horizontal" method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" placeholder="Your name" id="name" class="form-control" name="name" :value="old('name')" required autofocus>
    <input type="email" placeholder="Your mail" id="email" class="form-control" name="email" :value="old('email')" required>
    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required autocomplete="new-password">
    <input type="password" placeholder="confirmation Password" id="password_confirmation" class="form-control" name="password_confirmation" required>
    <button type="submit" class="link-button">register</button>
</form>

<h4>or register to</h4>
<div class="social">
    <a class="facebook" href="#" title="facebook"><i class="zmdi zmdi-facebook"></i></a>
    <a class="twitter" href="#" title="twitter"><i class="zmdi zmdi-twitter"></i></a>
    <a class="instagram" href="#" title="instagram"><i class="zmdi zmdi-instagram"></i></a>
    <a class="google" href="#" title="google"><i class="zmdi zmdi-google-glass"></i></a>
</div>
