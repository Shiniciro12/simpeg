<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <div class="btn-md btn-outline-warning rounded-pill">
          <a class="nav-link link-dark" aria-current="page" href="/klien/dashboard">
            <i class="bi bi-house-door-fill"></i>
            Dashboard
          </a>
        </div>
      </li>
      <li class="nav-item">
        <div class="btn-md btn-outline-warning rounded-pill">
          <a class="nav-link link-dark" href="/klien/dataumum">
            <i class="bi bi-grid-fill"></i>
            Data Umum
          </a>
        </div>
      </li>
      <li class="nav-item">
        <div class="btn-md btn-outline-warning rounded-pill">
          <a class="nav-link link-dark" href="/klien/datakhusus">
            <i class="bi bi-grid-fill"></i>
            Data Khusus
          </a>
        </div>
      </li>
    </ul>
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Halo {{ explode(' ', trim(auth()->user()->nama))[0]; }}!</span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item text-nowrap">
        <form action="/logout" method="post">
          @csrf
          <button class="nav-link px-3 link-dark border-0" style="background-color: #F8F9FA" type="submit"><i
              class="bi bi-box-arrow-left"></i>
            Keluar</button>
        </form>
      </li>
    </ul>
  </div>
</nav>