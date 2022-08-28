@extends('layouts.app')

@section('content')

<div class="main">
    <div class="section section-basic" id="basic-elements">
    <div class="squares square3"></div>
    <div class="squares square7"></div>
    <div class="squares square2"></div>
    <div class="squares square1"></div>
      <div class="container" style="margin-top: 15mm">
        <div class="card">
            <div class="card-body" style="padding: 8mm">
                <h1>Sukses Check Out</h1>
                <h5>Pesanan anda sukses melakukan check out selanjutnya untuk pembayaran silahkan transfer direkening <strong>Bank BRI Nomor Rekening : 32114-821312-123</strong> dengan nominal <strong> Rp. {{ number_format($purchase->purchase_total) }} </strong></h5>
            </div>
        </div>
        <div class="card-body">
          <div class="row justify-content-between align-items-center">
            <h3>Detail Pemesanan</h3>
            <h3>{{ $purchase->code }}</h3>
          </div>
            <table class="table">
              <thead class="text-primary">
                <th>
                  No
                </th>
                <th>
                  Nama Barang
                </th>
                <th>
                  Harga Oksigen
                </th>
                <th>
                  Harga Tabung
                </th>
                <th>
                  Pinjam Tabung
                </th>
                <th>
                  Jumlah
                </th>
                <th>
                  Total
                </th>
              </thead>
              <tbody>
                
                @foreach($purchase_detail as $i=>$row)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$row->addproducts->product_name}}</td>
                    <td>Rp. {{number_format($row->addproducts->product_price)}}</td>

                    @if($row->loan_status == 0)
                      <td>Rp. {{number_format($row->addproducts->tube_price)}}</td>
                    @else
                      <td>-</td>
                    @endif
                    
                    @if($row->loan_status == 0)
                      <td>Tidak</td>
                    @else
                      <td>Pinjam</td>
                    @endif

                    <td>{{$row->total_product}}</td>
                    <td>Rp. {{number_format($row->total_detail)}}</td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="6"> <strong>Total Yang Harus Ditransfer : </strong> </td>
                  <td> <strong> Rp. {{ number_format($purchase->purchase_total) }} </strong> </td>
                </tr>
              </tbody>
            </table>
            <form action="{{ url('history') }}/{{ $purchase->id }}" method="post" enctype="multipart/form-data">
              @csrf
                {{-- <div class="form-group">
                  <a class="btn btn-primary btn-block" type="button" style="color: rgb(255, 255, 255)">
                      Pilih File Bukti Pembayaran
                  </a>
                  <input type="file" name="payment_image" value="{{ $purchase->payment_image }}" class="form-control">
                </div> --}}

                {{-- <div class="custom-file">
                  <input class="custom-file-input" id="customFile" type="file" name="payment_image" value="{{ $purchase->payment_image }}">
                  <label class="custom-file-label" for="customFile" style="color: rgb(197, 197, 197)">Masukkan bukti pembayaran</label>
                </div> --}}

                <div class="mb-2">
                  <label for="formFile" class="form-label" style="color: rgb(197, 197, 197);font-weight:600">Pilih bukti pembayaran</label>
                  <input class="form-control" id="formFile" type="file" name="payment_image" value="{{ $purchase->payment_image }}">
                </div>
                
                <button type="submit" class="btn btn-primary btn-block btn-round float-right" rel="tooltip" style="margin-top:5mm">Kirim Bukti Pembayaran</button>
            </form>
          </div>
      </div>
    </div>
</div>
@endsection