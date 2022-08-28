@extends('admin.layout.master')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary d-flex justify-content-between align-items-center">
              <h4 class="card-title" style="margin-left: 5mm">Tabel Data Produk</h4>
              <a href="{{route('addproduct.create')}}" class="btn btn-success btn-round">Add</a>
            </div>
            <div class="card-body">
              <div class="table-responsive table-striped table-bordered">
                <table id="datatables" class="table">
                  <thead class="text-primary" style="background-color: #202940">
                    <th>
                      Series
                    </th>
                    <th>
                      Produk
                    </th>
                    <th>
                      Kategori
                    </th>
                    {{-- <th>
                      Stock
                    </th> --}}
                    <th>
                      Gambar
                    </th>
                    <th>
                      Harga Produk
                    </th>
                    <th>
                      Harga Tabung
                    </th>
                    <th>
                      Status
                    </th>
                    <th>
                      Edit
                    </th>
                    <th>
                      Delete
                    </th>
                  </thead>
                  <tbody style="background-color: #202940">
                    
                    @foreach($data as $i=>$row)
                    <tr>
                        <td>{{$row->product_seriesnumber}}</td>
                        <td>{{$row->product_name}}</td>
                        <td>{{$row->productcategory->categories_name}}</td>
                        {{-- <td>{{$row->stock}}</td> --}}
                        <td>{{$row->product_image}}</td>
                        <td>{{number_format($row->product_price)}}</td>
                        <td>{{number_format($row->tube_price)}}</td>

                        @if($row->stock!=0)
                          <td>Ada</td>
                        @else
                          <td>Dipesan</td>
                        @endif

                        <td><a href="{{route('addproduct.edit', $row->id)}}" class='btn btn-success'>Edit</a></td>
                        <td>
                            <form action="{{route('addproduct.destroy', $row->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
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