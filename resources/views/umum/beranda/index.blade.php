@extends('umum.layouts.main')
@section('content')
<body>
  <div class="container"><br>
    
    <div class="shadow-lg p-3 mb-5 bg-body rounded">
      <div class="card text-center">
        <div class="card-header">
          <div class="d-flex justify-content-center bd-highlight dropdown">
            <a class="navbar-brand text-black">
              <img src="/images/logo.svg" alt="logo pemkot kupang" width="42" height="47"> SIMPEG
            </a>
          </div>
        </div>

        <div class="card-body">
          <h5 class="card-title"></h5>
          <iframe width="100%" height="380" src="https://www.youtube.com/embed/aKtb7Y3qOck" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
          <p class="card-text">Silahkan menyaksikan video di atas untuk melihat deskripsi aplikasi ini.</p>
          <a href="/login" class="btn btn-primary rounded-pill">Masuk</a>
        </div>
      </div>
    </div>

  </div>
</body>
@endsection