<div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
  <div class="logo"><a class="simple-text logo-normal">
      CV Iswara
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      @role('Super Admin')
      <li class="nav-item ">
        <a class="nav-link" href="{{ url('/admin/users') }}">
          <i class="material-icons">person</i>
          <p>User</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ url('/admin/roles') }}">
          <i class="material-icons">verified_user</i>
          <p>Role</p>
        </a>
      </li>
      @endrole
      @role('Admin')
      <li class="nav-item ">
        <a class="nav-link" href="{{ url('/admin') }}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ url('/admin/addproduct') }}">
          <i class="material-icons">library_add</i>
          <p>Tambah Produk</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ url('/admin/productcategories') }}">
          <i class="material-icons">content_paste</i>
          <p>Kategori</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ url('/admin/task') }}">
          <i class="material-icons">library_books</i>
          <p>Task</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ url('/admin/cart') }}">
          <i class="material-icons">shopping_cart</i>
          <p>Keranjang</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ url('/admin/purchaselog') }}">
          <i class="material-icons">account_balance_wallet</i>
          <p>Pemesan</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ url('/admin/detail') }}">
          <i class="material-icons">auto_stories</i>
          <p>Detail</p>
        </a>
      </li>
      @endrole
    </ul>
  </div>
</div>