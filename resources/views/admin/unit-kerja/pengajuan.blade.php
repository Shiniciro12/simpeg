@extends('admin.layouts.main')
@include('admin.layouts.navbar')
@include('admin.layouts.sidenav')
@section('content')
<div class="pcoded-content">
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
                    <h3>Data Pengajuan Layanan OPD</h3>
                </div>
                <br>
                <div class="col-md-12">
                </div>

                {{--
                <!-- Modal Cek Dokumen -->
                <div class="modal fade" id="cekDokumen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="cekDokumenLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cekDokumenLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <iframe src="/unggah/dokumen-khusus/1637134069_drh.pdf#toolbar=0" width="100%"
                                    height="500px">
                                </iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection