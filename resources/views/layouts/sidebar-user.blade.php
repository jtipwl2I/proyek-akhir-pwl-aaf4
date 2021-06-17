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
        <a href="{{ route('identitasNasabah') }}" class="nav-link"><i class="fas fa-user"></i><span>Identitas Nasabah</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link has-dropdown"><i class="fas fa-money-bill-wave"></i><span>Saldo</span></a>
        <ul class="dropdown-menu">
          <li>
            <a class="nav-link" href="{{ route('tambahSaldo') }}">Topup Saldo</a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('transfer') }}">Transfer</a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('riwayatSaldo') }}">Riwayat</a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>
</div>