<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Noble<span>UI</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item {{ active_class(['admin.dashboard']) }}">
        <a href="{{ route('admin.dashboard')}}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dasbor</span>
        </a>
      </li>
      <li class="nav-item nav-category">Transaksi</li>
      <li class="nav-item {{ active_class(['admin.dashboard']) }}">
        <a href="{{ route('admin.dashboard')}}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Pemesanan</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['admin.dashboard']) }}">
        <a href="{{ route('admin.dashboard')}}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Konfirmasi Pembayaran</span>
        </a>
      </li>
      <li class="nav-item nav-category">Inventori</li>
      <li class="nav-item {{ active_class(['admin.products.index', 'admin.products.create', 'admin.products.edit']) }}">
        <a href="{{ route('admin.products.index')}}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Produk</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['admin.packages.index', 'admin.packages.create', 'admin.packages.edit']) }}">
        <a href="{{ route('admin.packages.index')}}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Paket</span>
        </a>
      </li>
      <li class="nav-item nav-category">Ekspedisi</li>
      <li class="nav-item {{ active_class(['admin.couriers.index', 'admin.couriers.create', 'admin.couriers.edit']) }}">
        <a href="{{ route('admin.couriers.index')}}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Kurir</span>
        </a>
      </li>
      <li class="nav-item nav-category">Pengguna</li>
      <li class="nav-item {{ active_class(['admin.users.index', 'admin.users.create', 'admin.users.edit', 'admin.users.show']) }}">
        <a href="{{ route('admin.users.index')}}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">User</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['admin.admins.index', 'admin.admins.create', 'admin.admins.edit']) }}">
        <a href="{{ route('admin.admins.index')}}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Admin</span>
        </a>
      </li>
    </ul>
  </div>
</nav>

