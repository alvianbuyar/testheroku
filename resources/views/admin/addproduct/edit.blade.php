@extends('admin.layout.master')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit Produk</h4>
            </div>
            <div class="card-body">

              @if($errors->any())

                <div class="alert alert-danger">
                  <div class="list-group">
                      @foreach($errors->all() as $error)
                      <li class="list-group-item">
                        {{$error}}
                      </li>
                      @endforeach
                  </div>
                </div>

              @endif

              <form action="{{route('addproduct.update', $data->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
              @method('PATCH')
              @csrf
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group" style="margin: 3mm">
                        <label for="text-input" class=" form-control-label ">Nomor Seri Produk</label>
                        <input type="text" id="text-input" name="txtproduct_seriesnumber" value="{{$data->product_seriesnumber}}" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group" style="margin: 3mm">
                        <label for="text-input" class="form-control-label">Nama Produk</label>
                        <input type="text" id="text-input" name="txtproduct_name" value="{{$data->product_name}}" class="form-control">
                      </div>
                    </div>
                      <div class="col-md-4">
                        <div class="form-group" style="margin: 3mm">
                          <label for="select" class=" form-control-label">Kategori</label>
                          <select name="txtid_categories" id="select" class="form-control">

                            @foreach($categories_data as $productcategories)
                            <option value={{$productcategories->id}} class="alert-primary"
                              @if($productcategories->id==$data->id_categories)
                                selected
                              @endif
                            >
                            {{$productcategories->categories_name}}</option>

                            @endforeach

                          </select>
                        </div>
                      </div>
                    {{-- <div class="col-md-12">
                      <div class="form-group" style="margin: 3mm">
                        <label for="text-input" class=" form-control-label">Stock</label>
                        <input type="text" id="text-input" name="txtstock" value="{{$data->stock}}" class="form-control">
                      </div>
                    </div> --}}
                    <div class="col-md-12 ">
                      <div class="form-control-group" style="margin: 3mm; margin-top: 10mm">
                        <label for="file">Pilih Gambar</label>
                        <input type="file" name="product_image" value="{{ $data->product_image }}" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group" style="margin: 3mm">
                        <label for="text-input" class=" form-control-label">Harga Oksigen</label>
                        <input type="text" id="text-input" name="txtproduct_price" value="{{$data->product_price}}" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group" style="margin: 3mm">
                        <label for="text-input" class=" form-control-label">Harga Tabung</label>
                        <input type="text" id="text-input" name="txttube_price" value="{{$data->tube_price}}" class="form-control">
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right">Save</button>
                  <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection