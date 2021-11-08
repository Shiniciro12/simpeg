@extends('home.layouts.main')
@section('content')
<div class="container">
    <div class="shadow-lg mb-5 bg-body rounded">
    <div class="card mt-5">
        <div class="card-body">
        <div class="row">
        <div class="col-sm-6">

    <iframe width="100%" height="480" src="https://www.youtube.com/embed/22UemOikenM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-title"><h2><center>Login</center></h2></div>
                <div class="card-body">
                   <center><img src="/images/logo.svg" alt="" width="80"></center>
<br>
                <form action="/login/add" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control">
                </div>
<br>
                <center><button type="submit" class="btn btn-primary">Login</button></center>
                
                </form>

                </div>
            </div>
            <div class="dropdown d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-outline-warning dropdown-toggle me-md-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Template Surat
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
        </div>
    </div>
        </div>
    </div>
 
    </div>
</div>
@endsection
