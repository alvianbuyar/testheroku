@extends('layouts.app')

@section('content')

<div class="wrapper" style="margin-bottom: -10mm">
    <div class="page-header">
      <img src="{{ asset('asset/img/path4.png') }}" class="path">
      <div class="container align-items-center" style="margin-top: 50mm">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            {{-- <h1 class="profile-title text-left"></h1> --}}
            <h5 class="text-on-back" style="margin-top: 8mm">Profile</h5>
            <p class="profile-description">Terimakasih sudah mempercayai kami untuk menyimpan infromasi pribadi anda. Silahkan lengkapi identitas anda sebelum melakukan transaksi.</p>
          </div>
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-coin card-plain">
              {{-- <div class="card-header">
                <img src="{{ asset('asset/img/mike.jpg') }}" class="img-center img-fluid rounded-circle">
              </div> --}}
              <div class="card-body">
                <div class="tab-content tab-subcategories">
                  <div class="tab-pane active" id="linka">
                    <div class="table-responsive">
                      <table class="table tablesorter " id="plain-table">
                        <thead>
                            <tr>
                                <td>Nama Pengguna</td>
                                <td>:</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <td>Nomor HP</td>
                                <td>:</td>
                                <td>{{ $user->phone_number }}</td>
                            </tr>
                        </thead>
                      </table>
                      <a href="{{ url('editprofile') }}" class="btn btn-primary btn-round" type="button" style="padding-inline: 22mm; margin-inline: 6mm">
                        Edit Profile 
                      </a>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection