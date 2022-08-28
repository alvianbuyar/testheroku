@extends('layouts.app')

@section('content')

<div class="main">
    <div class="section section-basic" id="basic-elements">
    <div class="squares square3"></div>
    <div class="squares square7"></div>
    {{-- <div class="squares square5"></div> --}}
      <div class="container" style="margin-top: 28mm">
        <div class="card-body">
            <h3>Check out</h3>
            {{-- ketika keranjang memiliki barang --}}
            @if(!empty($purchase))
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
                  Total
                </th>
                <th>
                  Delete
                </th>
              </thead>
              <tbody>
                
                @foreach($detail as $i=>$row)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$row->addproducts->product_name}}</td>
                    <td>Rp. {{number_format($row->addproducts->product_price)}}</td>

                    @if($row->loan_status!=1)
                      <td>Rp. {{number_format($row->addproducts->tube_price)}}</td>
                    @else
                      <td>-</td>
                    @endif

                    @if($row->loan_status!=0)
                      <td>Pinjam</td>
                    @else
                      <td>Tidak</td>
                    @endif

                    <td>Rp. {{number_format($row->total_detail)}}</td>
                    <td>
                        <form action="{{ url('checkout') }}/{{ $row->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm btn-round btn-icon" type="submit">
                              <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="5"> <strong>Total Harga : </strong> </td>
                  <td> <strong> Rp. {{number_format($purchase->purchase_total)}} </strong> </td>
                  <td></td>
                </tr>
              </tbody>
            </table>
            <a href="{{ url('confirmation') }}" class="btn btn-primary btn-block">Checkout</a>

            @else

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
                  Total
                </th>
                <th>
                  Delete
                </th>
              </thead>
              <tbody>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tbody>
            </table>
                
            @endif
          </div>
      </div>
    </div>
</div>
@endsection