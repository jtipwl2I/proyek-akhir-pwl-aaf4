<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">{{ substr(config('app.name'), 0, 2) }}</a>
    </div>
    <ul class="sidebar-menu">
      <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a href="{{ route('identitasNasabah') }}" class="nav-link"><i class="fas fa-fire"></i><span>Identitas Nasabah</span></a>
      </li>
      <li class="nav-item">
        <a href="{{ route('tambahSaldo') }}" class="nav-link"><i class="fas fa-fire"></i><span>Tambah Saldo</span></a>
      </li>
      <li class="nav-item">
        <a href="{{ route('transfer') }}" class="nav-link"><i class="fas fa-fire"></i><span>Transfer</span></a>
      </li>
    </ul>
  </aside>
</div>