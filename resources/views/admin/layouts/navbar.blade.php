<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 m-0 px-3" href="#"> <img src="/images/logo.svg" width="15" height="15"
      alt="logo pemkot kupang">
    SIMPEG</a>
  <form action="" method="get" class="my-2 w-100 mx-2">
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" name="search" placeholder="Cari..."
      aria-label="Search">
  </form>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="/logout" method="post" class="my-0">
        @csrf
        <button class="nav-link px-3 bg-dark border-0" type="submit">Keluar <span
            data-feather="log-out"></span></button>
      </form>
    </div>
  </div>
</header>