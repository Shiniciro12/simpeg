@extends('home.layouts.main')
@section('content')
<body>
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->
  <div class="container"><br>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ">
        
        </ul>
    </div> -->
<!-- </nav>  -->
<div class="shadow-lg p-3 mb-5 bg-body rounded">
<div class="card text-center">
    <div class="card-header"> 
<div class="d-flex flex-row-reverse justify-content-between bd-highlight dropdown">

  <div class="btn-lg btn-outline-primary rounded-pill dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
     Template Surat
    </div>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="/template_surat/Daftar Riwayat Hidup.pdf">Daftar Riwayat Hidup</a></li>
        <li><a class="dropdown-item" href="/template_surat/Lampiran Perkawinan.pdf">Lampiran Perkawinan</a></li>
    </ul>    
    <a class="navbar-brand">
      <img src="/images/logo.svg" alt="" width="42" height="40">
    </a>      
</div>
    </div>

  <div class="card-body">
    <h5 class="card-title"></h5>
    <iframe width="100%" height="380" src="https://www.youtube.com/embed/aKtb7Y3qOck" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary rounded-pill">Menu Login</a>
  </div>
</div>
</div>

  </div>
</body>
@endsection