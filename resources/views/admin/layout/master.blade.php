<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.layout.top')
</head>

<body class="dark-edition">
  <div class="wrapper ">
    {{-- navigation --}}
      @include('admin.layout.navigation')
    {{-- navigation --}}
    <div class="main-panel">
      <!-- Navbar -->
        @include('admin.layout.head')
      <!-- End Navbar -->
      
      {{-- Dashboard --}}
        @yield('content')
      {{-- Dashboard --}}
    </div>
  </div>

  {{-- theme navigation --}}
    {{-- @include('admin.layout.theme') --}}
  {{-- theme navigation --}}

  {{-- bottom --}}
    @include('admin.layout.bottom')
  {{-- bottom --}}
</body>

</html>