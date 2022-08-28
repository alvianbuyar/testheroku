@extends('admin.layout.master')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit Profile</h4>
              <p class="card-category">Complete your profile</p>
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" style="margin: 3mm">
                      <label>Username</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" style="margin: 3mm">
                      <label>Email address</label>
                      <input type="email" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" style="margin: 3mm">
                      <label>Fist Name</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" style="margin: 3mm">
                      <label>Last Name</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" style="margin: 3mm">
                      <label>Adress</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" style="margin: 3mm">
                      <label>City</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" style="margin: 3mm">
                      <label>Country</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" style="margin: 3mm">
                      <label>Postal Code</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Update</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection