@extends('admin.layout.master')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit User</h4>
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

              <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @method('PATCH')
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" style="margin: 3mm; margin-top: 10mm">
                        <label for="text-input" class=" form-control-label">Nama User</label>
                        <input type="text" id="text-input" name="txtnama_user" value="{{$user->name}}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" style="margin: 3mm">
                        <label for="text-input" class=" form-control-label">Email</label>
                        <input type="text" id="text-input" name="txtemail_user" value="{{$user->email}}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" style="margin: 3mm">
                        <label for="text-input" class=" form-control-label">Password</label>
                        <input type="text" id="text-input" name="txtpassword_user" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" style="margin: 3mm">
                        <label for="text-input" class=" form-control-label">Konfirmasi Password</label>
                        <input type="text" id="text-input" name="txtkonfirmasiPassword_user" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" style="margin: 3mm">
                      <label for="select" class=" form-control-label">Role</label>
                      <select name="role_user" id="select" class="form-control" style="background: #202940">

                        @foreach($allRoles as $role)
                          <option value="{{$role->id}}"
                            @if (in_array($role->id, $userRole))
                              selected
                            @endif>
                            {{$role->name}}
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