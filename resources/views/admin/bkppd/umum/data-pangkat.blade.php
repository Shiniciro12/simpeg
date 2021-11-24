@extends('admin.layouts.main')
@include('admin.layouts.navbar')
@include('admin.layouts.sidebar')
@section('content')
<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="text-center my-3">
                <h3>Data dokumen pangkat</h3>
            </div>
            <br>
            <div class="col-md-12">
                <div class="table-responsive shadow px-2">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">SK Pangkat</th>
                                <th scope="col">Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($rows as $row)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $row['nip'] }}</td>
                                <td>{{ $row['nama'] }}</td>
                                <td><a href="{{ $row['sk_pangkat'] }}">Lihat Dokumen</a></td>
                                <td>
                                    @if (auth()->user()->role_id == '2' && $row['bkppd_verif_by'] == '')
                                    <form action="/admin/bkppd/berkas/verifikasi" method="post">
                                        @csrf
                                        <input type="hidden" name="verifikasi_id" value="{{ $verifikasi_id }}">
                                        <button class="btn btn-primary btn-sm" type="submit">Verifikasi</button>
                                    </form>
                                    @else
                                    <div class="badge bg-success p-2">
                                        Terverifikasi
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            {{$rows->links()}}
        </div>
    </div>
</div>
@endsection