@extends('layouts.app')

@section('content')

<div class="section section-nucleo-icons" style="margin-top: 8mm">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12">
          <h2 class="title">CV Iswara Tiga Putra</h2>
          <h4 class="description">
            Kami menyediakan oksigen + regulator, silahkan anda pilih produk yang sudah kami tawarkan. Anda dapat meminjam tabung ketika melakukan proses transaksi.
          </h4>
        </div>
      </div>
    </div>
    <div class="row justify-content-center" style="margin: 2cm">

      @foreach($data as $i=>$row)
        @if($row->trigger!=0)
          <div class="col-md-3 mb-3">
            <div class="card">
              <div class="card-body" style="margin-bottom: -3mm">
                <img src="{{ asset('public/productImage/'. $row->product_image) }}" height="160px" width="235px">
              </div>
              <div class="card-footer text-center">
                <h6>{{$row->product_name}}</h6>
                <p style="margin: -2mm auto 4mm auto">Rp. {{number_format($row->product_price)}}</p>
                <a href="{{ url('pesan') }}/{{ $row->id }}" class="btn btn-primary btn-block">Pesan</a>
              </div>
            </div>
          </div>
        @endif
      @endforeach

    </div>
  </div>
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h1 class="title">CV Iswara</h1>
        </div>
        <div class="col-md-3">
          <ul class="nav">
            <li class="nav-item">
              <a href="./index.html" class="nav-link">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a href="./examples/landing-page.html" class="nav-link">
                Landing
              </a>
            </li>
            <li class="nav-item">
              <a href="./examples/register-page.html" class="nav-link">
                Register
              </a>
            </li>
            <li class="nav-item">
              <a href="./examples/profile-page.html" class="nav-link">
                Profile
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul class="nav">
            <li class="nav-item">
              <a href="https://creative-tim.com/contact-us" class="nav-link">
                Contact Us
              </a>
            </li>
            <li class="nav-item">
              <a href="https://creative-tim.com/about-us" class="nav-link">
                About Us
              </a>
            </li>
            <li class="nav-item">
              <a href="https://creative-tim.com/blog" class="nav-link">
                Blog
              </a>
            </li>
            <li class="nav-item">
              <a href="https://opensource.org/licenses/MIT" class="nav-link">
                License
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h3 class="title">Follow us:</h3>
          <div class="btn-wrapper profile">
            <a target="_blank" href="https://twitter.com/creativetim" class="btn btn-icon btn-neutral btn-round btn-simple" data-toggle="tooltip" data-original-title="Follow us">
              <i class="fab fa-twitter"></i>
            </a>
            <a target="_blank" href="https://www.facebook.com/creativetim" class="btn btn-icon btn-neutral btn-round btn-simple" data-toggle="tooltip" data-original-title="Like us">
              <i class="fab fa-facebook-square"></i>
            </a>
            <a target="_blank" href="https://dribbble.com/creativetim" class="btn btn-icon btn-neutral  btn-round btn-simple" data-toggle="tooltip" data-original-title="Follow us">
              <i class="fab fa-dribbble"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>
@endsection
