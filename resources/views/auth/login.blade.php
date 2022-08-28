@extends('layouts.app')

@section('content')
<div class="section section-signup">
    <div class="container" style="margin-bottom: -2cm">
        <div class="squares square1"></div>
        <div class="squares square2"></div>
        <div class="squares square3"></div>
        <div class="squares square4"></div>
        <div class="squares square5"></div>
        <div class="squares square7"></div>
      <div class="row row-grid justify-content-between align-items-center">
        <div class="col-lg-6">
          <h3 class="display-3 text-white">Silahkan Login Terlebih Dahulu
          </h3>
          <p class="text-white mb-3">Lakukan login sebelum anda melakukan transaksi dan peminjaman tabung oksigen. Jika anda masih belum mempunyai akun silahkan melakukan pendaftaran terlebih dahulu</p>
          <div class="btn-wrapper">
            <a href="{{ route('register') }}" class="btn btn-info">Daftar Akun</a>
          </div>
        </div>
        <div class="col-lg-6 mb-lg-auto">
          <div class="card card-register">
            <div class="card-header">
              <img class="card-img" src="asset/img/square1.png" alt="Card image">
              <h4 class="card-title">{{ __('Login') }}</h4>
            </div>
            <div class="card-body">
              <form class="form" form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="tim-icons icon-email-85"></i>
                    </div>
                  </div>
                  <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="tim-icons icon-lock-circle"></i>
                    </div>
                  </div>
                  <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                
                <div class="form-check text-left">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="form-check-sign" for="remember"></span>
                    {{ __('Remember Me') }}
                  </label>
                </div>

                <div style="margin-top: 1cm;padding-bottom: 1cm">
                  <button type="submit" class="btn btn-info btn-round btn-lg">
                    {{ __('Login') }}
                  </button>
      
                  @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                      </a>
                  @endif
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
