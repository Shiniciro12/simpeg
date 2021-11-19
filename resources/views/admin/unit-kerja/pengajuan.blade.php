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
                <h3>Data Pengajuan Layanan</h3>
                <button class="btn btn-success shadow" data-bs-toggle="modal" data-bs-target="#layananModal"><i
                        class="bi bi-plus"></i></button>
            </div>
            <br>
            <div class="col-md-12">
                <form action="" method="get">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" placeholder="Cari..." name="search">
                        <button class="btn btn-outline-secondary" type="submit" id="search">Cari</button>
                    </div>
                </form>
                <div class="table-responsive shadow px-2">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Data Umum</th>
                                <th scope="col">Data Khusus</th>
                                <th scope="col">Waktu Verifikasi</th>
                                <th scope="col">Jenis Layanan</th>
                                <th scope="col">Ket</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($rows as $row)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $row['nip'] }}</td>
                                <td>{{ $row['nama'] }}</td>
                                <td><button class="btn btn-sm btn-info text-dark" data-bs-toggle="modal"
                                        data-bs-target="#cekDokumen">Cek</button></td>
                                <td><button class="btn btn-sm btn-info text-dark" data-bs-toggle="modal"
                                        data-bs-target="#cekDokumen">Cek</button></td>
                                <td>{{ $row['unit_verif_at'] ? date('Y-m-d H:m:s', $row['unit_verif_at']) : '' }}</td>
                                <td>{{ $row['nama_layanan'] }}</td>
                                <td>
                                    @if ($row['status'] == '2')
                                    <button class=" btn btn-sm btn-success p-2">
                                        <i class="bi bi-check-square"></i>
                                    </button>
                                    @elseif ($row['status'] == '3')
                                    <button class="btn btn-sm btn-warning p-2">
                                        <i class="bi bi-check-square"></i>
                                    </button>
                                    @else
                                    <form action="/admin/unit-kerja/pengajuan" method="post">
                                        @csrf
                                        <input type="hidden" name="dokumen_id" value="{{ $row['dokumen_id'] }}">
                                        <button class="btn btn-sm btn-danger">Verifikasi</button>

                                    </form>
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

        <!-- Modal Cek Dokumen -->
        <div class="modal fade" id="cekDokumen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="cekDokumenLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cekDokumenLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe src="/unggah/dokumen-khusus/1637134069_drh.pdf#toolbar=0" width="100%" height="500px">
                        </iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Pengajuan Layanan -->
        <div class="modal fade" id="layananModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="layananModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="layananModalLabel">Pengajuan Layanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/unit-kerja/buat/layanan" method="post">
                            @csrf
                            <label for="nip" class="form-label">Nama/NIP Pegawai <span
                                    class="text-danger">*</span></label>
                            <input type="text" list="identitas" name="nip" id="nip" class="form-control" required
                                value="{{old('identitas_id')}}">
                            <datalist id="identitas">
                                @foreach ($rowsIdentitas as $rowIdentitas)
                                <option {{old('nip')==$rowIdentitas['nip'] ? 'selected' : '' }}
                                    value="{{ $rowIdentitas['nip'] }}">{{ $rowIdentitas['nama']
                                    }}</option>
                                @endforeach
                            </datalist>
                            @error('nip')
                            <div id="nip" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                    </div>
                    <div class="m-3">
                        <label for="layanan" class="form-label">Layanan</label>
                        <select id="layanan" name="jenis_layanan_id" class="form-select">
                            <option>Pilih Layanan</option>
                            @foreach ($rowsJenisLayanan as $rowJenisLayanan)
                            <option {{old('jenis_layanan_id')==$rowJenisLayanan['jenis_layanan_id'] ? 'selected' : '' }}
                                value="{{ $rowJenisLayanan['jenis_layanan_id'] }}">{{ $rowJenisLayanan['nama_layanan']
                                }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection