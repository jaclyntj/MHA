@extends('layouts.app')

@section('content')

<p class="login-box-msg">Log in</p>

@if ($message = Session::get('error'))
  <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <p>{{ $message }}</p>
  </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
  <div class="input-group mb-4">
    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Alamat Email') }}</label>

    <div class="col-md-8">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
  </div>
  <div class="input-group mb-3">
    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Kata Sandi') }}</label>

    <div class="col-md-8">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
  </div>
  <div class="row">
    <div class="col-8">
      <div class="icheck-primary">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

        <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
        </label>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-4">
        <button type="submit" class="btn btn-primary" style="background-color: #ff530a; border:#ff530a">
            {{ __('Login') }}
        </button>
    </div>
    <!-- /.col -->
  </div>
</form>


<!-- /.social-auth-links -->
<br>
<p>
    @if (Route::has('password.request'))
    <a style="color:#ff530a" href="{{ route('password.request') }}">
        {{ __('Lupa Kata Sandi?') }}
    </a>
    @endif
</p>
<p>
  <a style="color:#ff530a" href="{{ route('register') }}" class="text-center">Registrasi Akun Baru</a>
</p>
@endsection
