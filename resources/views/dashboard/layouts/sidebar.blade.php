<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "dashboard") ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        
        @can('akuarium')
        <li class="nav-item">
          <a class="nav-link {{ ($active === "akuarium") ? 'active' : '' }}" href="/dashboard/akuarium">
            <span data-feather="file-text"></span>
            Tabel Akuarium
          </a>
        </li>
        @endcan

        @can('pengiriman')
        <li class="nav-item">
          <a class="nav-link {{ ($active === "pengiriman") ? 'active' : '' }}" href="/dashboard/pengiriman">
            <span data-feather="truck"></span>
            Tabel Pengiriman
          </a>
        </li>
        @endcan

        @can('admin')
        <li class="nav-item">
          <a class="nav-link {{ ($active === "user") ? 'active' : '' }}" href="/dashboard/user">
            <span data-feather="user"></span>
            Tabel User
          </a>
        </li>
        @endcan
        <li class="nav-item">
          <a class="nav-link" href="/akuarium">
            <span data-feather="layout"></span>
            View Akuarium
          </a>
        </li>
      </ul>
    </div>
  </nav>