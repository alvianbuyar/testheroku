@extends('layouts.app')

@section('content')
<div class="section section-signup">
    <div class="container">
        <div class="squares square1"></div>
        <div class="squares square2"></div>
        <div class="squares square3"></div>
        <div class="squares square4"></div>
        <div class="squares square5"></div>
        <div class="squares square7"></div>
      <div class="row row-grid justify-content-between align-items-center">
        <div class="col-lg-6">
          <h3 class="display-3 text-white">Amankan Akun Anda
          </h3>
          <p class="text-white mb-3">Jaga akun anda agar tidak diketahui orang lain. Karena jika akun anda diketahui orang lain, memungkinkan orang itu dapat menyalahgunakan akun anda. Stay save!!</p>
        </div>
        <div class="col-lg-6 mb-lg-auto">
          <div class="card card-register">
            <div style="padding-top: 10mm; margin-left:5mm">
                <h3 class="display-3 text-white">{{ __('Reset Password') }}</h3>
            </div>
            <div class="card-body">

              @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
              @endif

              <form class="form" form method="POST" action="{{ route('password.email') }}">
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

                <div style="margin-top: 1cm;padding-bottom: 1cm">
                  <button type="submit" class="btn btn-info btn-round btn-lg">
                    {{ __('Send Password Reset Link') }}
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
