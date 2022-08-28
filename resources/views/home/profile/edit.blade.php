@extends('layouts.app')

@section('content')

<div class="wrapper" style="margin-bottom: -10mm">
    <div class="page-header">
      <img src="{{ asset('asset/img/path4.png') }}" class="path">
      <div class="container align-items-center" style="margin-top: 50mm">
        <div class="row">
          <div class="col-lg-5 col-md-5" style="margin-right: 20mm">
            <h5 class="text-on-back" style="margin-top: 8mm">Profile</h5>
            <p class="profile-description">Silahkan Lengkapi identitas untuk mempermudah kami mengenai identitas customer. Terimakasih sudah mempercayai identitas anda kepada kami</p>
          </div>
              <div class="card-body">
                <form action="{{ url('updateprofile') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Pengguna</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="text" name="phone_number" class="form-control" value="{{ $user->phone_number }}">
                      </div>
                    </div>
                    {{-- <div class="col-md-12">
                      <div class="form-group">
                        <label for="file">Foto KTP</label>
                        <a class="btn btn-simple btn-block" type="button" style="color: grey">
                            Pilih File
                        </a>
                        <input type="file" name="ktp_image" value="{{ $user->ktp_image }}" class="form-control">
                      </div>
                    </div> --}}

                    <div class="col-md-12">
                      <div class="mb-2">
                        <label for="formFile" class="form-label">Masukkan Foto KTP</label>
                        <input class="form-control" id="formFile" type="file" name="ktp_image" value="{{ $user->ktp_image }}">
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block btn-round float-right" rel="tooltip" style="margin-top:5mm">Update</button>
                </form>
              </div>
        </div>
      </div>
    </div>
</div>

@endsection