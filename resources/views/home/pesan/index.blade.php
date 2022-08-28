@extends('layouts.app')

@section('content')

<div class="main">
    <div class="section section-basic" id="basic-elements">
      <div class="container" style="margin-top: 30mm">
        <div class="container">
            <div class="row justify-content-between align-items-center">
              <div class="col-lg-5 mb-5 mb-lg-0 ">
                <h2 class="text-white font-weight-light">{{ $data->product_name }}</h2>
                  <form action="#" method="post">
                  @csrf
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Harga Oksigen</td>
                                <td>:</td>
                                <td>Rp. {{number_format($data->product_price)}}</td>
                            </tr>
                            <tr>
                                <td>Harga Tabung</td>
                                <td>:</td>
                                <td>Rp. {{number_format($data->tube_price)}}</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td>{{$data->productcategory->categories_name}}</td>
                            </tr>
                            {{-- <tr>
                                <td>Jumlah Pesan</td>
                                <td>:</td>
                                <td>
                                  <input type="text" name="total" class="form-control" required="" value="1">
                                </td>
                            </tr> --}}
                            <tr>
                              <td>Pinjam Tabung</td>
                              <td>:</td>
                              <td>
                                  <select name="loan" class="form-control" style="background: #171941">
                                    <option value="0">Tidak</option>
                                    <option value="1">Pinjam</option>
                                  </select>
                                  {{-- <input type="text" name="loan" class="form-control" required="" value="1"> --}}
                              </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('home') }}" class="btn btn-warning" style="margin-right: 3mm">Kembali</a>
                    <button type="submit" class="btn btn-primary" style="padding-inline: 17mm">Masukkan Keranjang</button>
                  </form>
              </div>
              <div class="col-lg-6">
                <div id="carousel">
                  <div class="carousel">
                      <img class="d-block w-100" src="{{ asset('productImage/'. $data->product_image) }}" height="380px" width="235px" alt="Product Image">
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection