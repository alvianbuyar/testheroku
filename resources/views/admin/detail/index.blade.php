@extends('admin.layout.master')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary d-flex justify-content-between align-items-center">
              <h4 class="card-title" style="margin-left: 5mm">Detail's Table</h4>
              <div id="export-button"></div>
            </div>
            {{-- <form action="{{ route('search') }}" method="POST">
              @csrf
              <br>
              <div class="container">
                <div class="row">
                  <div class="container-fluid">
                    <div class="form-group row">
                      <label for="date" class="col-form-label col-sm-2">Tanggal Awal</label>
                      <div class="col-sm-3">
                        <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required/>
                      </div>
                      <label for="date" class="col-form-label col-sm-2">Ke Tanggal</label>
                      <div class="col-sm-3">
                        <input type="date" class="form-control input-sm" id="toDate" name="toDate" required/>
                      </div>
                      <div class="col-sm-2">
                        <button type="submit" class="btn" name="search" title="Seach">cari</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form> --}}
            <div class="card-body">
              <div class="table-responsive table-striped table-bordered">
                <table id="datatable" class="table">
                  <thead class=" text-primary" style="background-color: #202940">
                    <th>
                      Kode
                    </th>
                    <th>
                      Series
                    </th>
                    <th>
                      Produk
                    </th>
                    <th>
                      Nama
                    </th>
                    <th>
                      Alamat
                    </th>
                    <th>
                      Nomor HP
                    </th>
                    <th>
                      Pinjam
                    </th>
                    <th>
                      Tanggal Pesan
                    </th>
                    <th>
                      Status Tabung
                    </th>
                    <th class="not-export-col">
                      Status Tabung
                    </th>
                    {{-- <th>
                      Delete
                    </th> --}}
                  </thead>

                  <tbody style="background-color: #202940">

                      @foreach($data as $i=>$row)
                        @if($row->purchaselogs->purchase_status !=0)
                          @if($row->purchaselogs->proof !=0)
                            <tr>
                              <td>{{$row->purchaselogs->code}}</td>
                              <td>{{$row->addproducts->product_seriesnumber}}</td>
                              <td>{{$row->addproducts->product_name}}</td>
                              <td>{{$row->purchaselogs->users->name}}</td>
                              <td>{{$row->purchaselogs->users->address}}</td>
                              <td>{{$row->purchaselogs->users->phone_number}}</td>

                              @if($row->loan_status == 0)
                                <td>Tidak</td>
                              @else
                                <td>Pinjam</td>
                              @endif

                              <td>{{$row->purchaselogs->purchase_date}}</td>

                              @if($row->loan_status == 0)
                                <td>Dibeli</td>
                              @else
                                @if($row->tube_status == 0)
                                  <td>Belum kembali</td>
                                @else
                                  <td>Sudah kembali</td>
                                @endif
                              @endif
                              @if($row->loan_status == 0)
                                <td class="not-export-col"><a href="#" class='btn btn-danger'>Edit</a></td>
                              @else
                                @if($row->tube_status == 0)
                                  <td class="not-export-col"><a href="{{route('detail.edit', $row->id)}}" class='btn btn-success'>Edit</a></td>
                                @else
                                  <td class="not-export-col"><a href="{{route('detail.edit', $row->id)}}" class='btn btn-danger'>Edit</a></td>
                                @endif
                              @endif
                            </tr>
                          @endif
                        @endif  
                      @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

@endsection