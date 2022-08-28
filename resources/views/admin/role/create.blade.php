@extends('admin.layout.master')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Add New Role</h4>
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

              <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" style="margin: 3mm; margin-top: 10mm">
                      <label for="text-input" class=" form-control-label">Role Name</label>
                      <input type="text" id="text-input" name="txtnama_role" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" style="margin: 3mm">
                      <label for="select" class=" form-control-label">Permission</label>
                      <select name="optionid_permission[]" id="select" class="form-control" style="background: #202940">

                        @foreach($allPermission as $permission)
                          <option value={{$permission->id}}>
                              {{$permission -> name}}
                          </option>
                        @endforeach
                        
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