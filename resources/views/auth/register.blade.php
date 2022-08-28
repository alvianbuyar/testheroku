@extends('layouts.app')

@section('content')
<div class="section section-signup">
    <div class="container" style="margin: -3mm auto -2cm auto">
        <div class="squares square1"></div>
        <div class="squares square2"></div>
        <div class="squares square3"></div>
        <div class="squares square4"></div>
        <div class="squares square5"></div>
        <div class="squares square7"></div>
        <div class="row row-grid justify-content-between align-items-center">
        <div class="col-lg-6">
          <h3 class="display-3 text-white">Daftarkan Diri Anda
          </h3>
          <p class="text-white mb-3">Pastikan untuk melakukan pendaftaran akun untuk anda yang ingin melakukan transaksi oksigen dan temukan penawaran menarik hanya di CV.Iswara Tiga Putra</p>
        </div>
        <div class="col-lg-6 mb-lg-auto">
          <div class="card card-register">
            <div class="card-header">
              <img class="card-img" src="asset/img/square1.png" alt="Card image">
              <h4 class="card-title">{{ __('Register') }}</h4>
            </div>
            <div class="card-body">
              <form class="form" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="tim-icons icon-single-02"></i>
                    </div>
                  </div>
                  <input placeholder="Name" input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="tim-icons icon-email-85"></i>
                    </div>
                  </div>
                  <input placeholder="Email" input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                  <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                  @error('password')
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
                  <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div style="margin-top: 1cm;padding-bottom: 6mm">
                  <button type="submit" class="btn btn-info btn-round btn-lg">
                    {{ __('Register') }}
                  </button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
