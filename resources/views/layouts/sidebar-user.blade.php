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
    </ul>
  </aside>
</div>