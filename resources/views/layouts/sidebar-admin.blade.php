<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">{{ config('app.name') }} Admin</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">{{ substr(config('app.name'), 0, 2) }}</a>
    </div>
    <ul class="sidebar-menu">
      <li class="nav-item dropdown">
        <a href="{{ route('admin.dashboard') }}" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="nav-item dropdown">
        <a href="{{ route('admin.nasabah') }}" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Kelola nasabah</span></a>
      </li>
    </ul>
  </aside>
</div>