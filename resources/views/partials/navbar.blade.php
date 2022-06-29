
  <div class="">
    <nav class="navbar static-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="/" class="navbar-brand">Marlyn Aquatic</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="/" class="nav-item nav-link px-2 {{ ($active === "home") ? 'text-white' : 'text-secondary' }}">Home</a>
                    <a href="/akuarium" class="nav-item nav-link px-2 {{ ($active === "akuarium") ? 'text-white' : 'text-secondary' }}">Akuarium</a>
                    <a href="/kategoris" class="nav-item nav-link px-2 {{ ($active === "kategori") ? 'text-white' : 'text-secondary' }}">Kategori</a>
                  </div>


                  <div class="navbar-nav ms-auto">
                    @auth
                  <div class="nav-item dropdown dropdown-menu-end">
                      <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">{{ auth()->user()->name }}</a>
                      <div class="dropdown-menu dropdown-menu-dark">
                          <a href="/dashboard" class="dropdown-item"><span data-feather="layout"></span> Dashboard</a>
                          <hr class="dropdown-divider">
                          <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                              <span data-feather="log-out"></span> Logout
                            </button>
                          </form>
                      </div>
                  </div>
                  @else
                  <a href="/login" class="nav-link"><button type="button" class="btn btn-outline-light btn-sm {{ ($active === "ceklogin") ? 'active' : '' }}">Login</button></a>
                  @endauth
                </div>
            </div>
        </div>
    </nav>
</div>