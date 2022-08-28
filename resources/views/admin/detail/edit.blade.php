@extends('admin.layout.master')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit Status Tabung</h4>
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

              <form action="{{route('detail.update', $data->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @method('PATCH')
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" style="margin: 3mm; margin-top: 10mm">
                      <label for="text-input" class=" form-control-label">Status Tabung</label>
                      <select name="txttube_status" class="form-control" style="background: #202940">
                        <option value="0">Tabung Belum Kembali</option>
                        <option value="1">Tabung Sudah Kembali</option>
                      </select>
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