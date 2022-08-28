@extends('admin.layout.master')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Tambah Produk Baru</h4>
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

              <form action="{{route('addproduct.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group" style="margin: 3mm; margin-top: 10mm">
                        <label for="text-input" class=" form-control-label ">Nomor Seri Produk</label>
                        <input type="text" id="text-input" name="txtproduct_seriesnumber" value="100" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="form-group" style="margin: 3mm">
                        <label for="text-input" class="form-control-label">Nama Produk</label>
                        <input type="text" id="text-input" name="txtproduct_name" value="Oksigen" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group" style="margin: 3mm">
                        <label for="select" class=" form-control-label">Kategori</label>
                        <select name="txtid_categories" id="select" class="form-control" style="background: #202940">

                          @foreach($categories_data as $productcategories)
                          <option value={{$productcategories->id}} class="alert-primary">
                          {{$productcategories->categories_name}}</option>
                          @endforeach

                        </select>
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-control-group" style="margin: 3mm">
                        <label for="file">Pilih Gambar</label>
                        <input type="file" name="product_image" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group" style="margin: 3mm">
                        <label for="text-input" class=" form-control-label">Harga Oksigen</label>
                        <input type="text" id="text-input" name="txtproduct_price" value="100000" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group" style="margin: 3mm">
                        <label for="text-input" class=" form-control-label">Harga Tabung</label>
                        <input type="text" id="text-input" name="txttube_price" value="2000000" class="form-control">
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right" style="padding-inline: 15mm">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection