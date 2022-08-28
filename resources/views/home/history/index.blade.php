@extends('layouts.app')

@section('content')

<div class="main">
    <div class="section section-basic" id="basic-elements">
    <div class="squares square3"></div>
    <div class="squares square7"></div>
    {{-- <div class="squares square5"></div> --}}
      <div class="container" style="margin-top: 28mm">
        <div class="card-body">
            <h3>Check out History</h3>

            <table class="table">
              <thead class="text-primary">
                <th>
                    No
                </th>
                <th>
                    Tanggal
                </th>
                <th>
                    Kode
                </th>
                <th>
                    Bukti Pembayaran
                </th>
                <th>
                    Status
                </th>
                <th>
                    Jumlah Harga
                </th>
                <th>
                    Detail
                </th>
              </thead>
              <tbody>

                @foreach($purchase as $i=>$row)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{ $row->purchase_date }}</td>
                  <td>{{ $row->code }}</td>
                  <td>
                    @if($row->purchase_status == 1)
                      <strong>Belum </strong>mengirim bukti pembayaran
                    @endif
                    @if($row->purchase_status == 2)
                      <strong>Sudah </strong>mengirim bukti pembayaran
                    @endif
                  </td>
                  <td>
                    @if($row->proof != 1)
                      <strong>Tunggu </strong>validasi admin
                    @endif
                    @if($row->purchase_status == 2)
                      <strong>Proses pengiriman</strong>
                    @endif
                  </td>
                  <td>Rp. {{ number_format($row->purchase_total) }}</td>
                  <td>
                    <a href="{{ url('history') }}/{{ $row->id }}" class="btn btn-primary btn-round" type="button">
                      Detail
                    </a>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
      </div>
    </div>
</div>
@endsection