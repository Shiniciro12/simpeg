@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                        <div class="table-responsive">

            <table id="datatablesSimple" class="text-center">
                <thead>
                    <tr>
                        <th style="text-align: center">#</th>
                        <th style="text-align: center">NIP</th>
                        <th style="text-align: center">Nama</th>
                        <th style="text-align: center">Gelar (Depan)</th>
                        <th style="text-align: center">Gelar (Belakang)</th>
                        <th style="text-align: center">Tempat Lahir</th>
                        <th style="text-align: center">Tanggal Lahir</th>
                        <th style="text-align: center">Agama</th>
                        <th style="text-align: center">Status Kepegawaian</th>
                        <th style="text-align: center">Jenis Kepegawaian</th>
                        <th style="text-align: center">Kedudukan Kepegawaian</th>
                        <th style="text-align: center">Bantuan Bepetarum pns</th>
                        <th style="text-align: center">Tahun Bepetarum pns</th>
                        <th style="text-align: center">Status Kawin</th>
                        <th style="text-align: center">RT/RW</th>
                        <th style="text-align: center">HP</th>
                        <th style="text-align: center">Telepon</th>
                        <th style="text-align: center">Kode Pos</th>
                        <th style="text-align: center">Kelurahan</th>
                        <th style="text-align: center">Kecamatan</th>
                        <th style="text-align: center">Gol.Darah</th>
                        <th style="text-align: center">Foto</th>
                        <th style="text-align: center">No Karpeg</th>
                        <th style="text-align: center">No Taspen</th>
                        <th style="text-align: center">NPWP</th>
                        <th style="text-align: center">BPJS</th>
                        <th style="text-align: center">No Kariskarsu</th>
                        <th style="text-align: center">NIK</th>
                        <th style="text-align: center">Pangkat</th>
                        <th style="text-align: center">Jabatan</th>
                        <th style="text-align: center">Unit</th>
                      </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th style="text-align: center">#</th>
                        <th style="text-align: center">NIP</th>
                        <th style="text-align: center">Nama</th>
                        <th style="text-align: center">Gelar (Depan)</th>
                        <th style="text-align: center">Gelar (Belakang)</th>
                        <th style="text-align: center">Tempat Lahir</th>
                        <th style="text-align: center">Tanggal Lahir</th>
                        <th style="text-align: center">Agama</th>
                        <th style="text-align: center">Status Kepegawaian</th>
                        <th style="text-align: center">Jenis Kepegawaian</th>
                        <th style="text-align: center">Kedudukan Kepegawaian</th>
                        <th style="text-align: center">Bantuan Bepetarum pns</th>
                        <th style="text-align: center">Tahun Bepetarum pns</th>
                        <th style="text-align: center">Status Kawin</th>
                        <th style="text-align: center">RT/RW</th>
                        <th style="text-align: center">HP</th>
                        <th style="text-align: center">Telepon</th>
                        <th style="text-align: center">Kode Pos</th>
                        <th style="text-align: center">Kelurahan</th>
                        <th style="text-align: center">Kecamatan</th>
                        <th style="text-align: center">Gol.Darah</th>
                        <th style="text-align: center">Foto</th>
                        <th style="text-align: center">No Karpeg</th>
                        <th style="text-align: center">No Taspen</th>
                        <th style="text-align: center">NPWP</th>
                        <th style="text-align: center">BPJS</th>
                        <th style="text-align: center">No Kariskarsu</th>
                        <th style="text-align: center">NIK</th>
                        <th style="text-align: center">Pangkat</th>
                        <th style="text-align: center">Jabatan</th>
                        <th style="text-align: center">Unit</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($rows as $row)
                        <tr>
                            <td><?= $i++ ?></td>
                            <td>{{ $row["nip"] }}</td>
                            <td>{{ $row["nama"] }}</td>
                            <td>{{ $row["gelar_depan"] }}</td>
                            <td>{{ $row["gelar_belakang"] }}</td>
                            <td>{{ $row["tempat_lahir"] }}</td>
                            <td>{{ $row["tgl_lahir"] }}</td>
                            <td>{{ $row["agama"] }}</td>
                            <td>{{ $row["status_kepegawaian"] }}</td>
                            <td>{{ $row["jenis_kepegawaian"] }}</td>
                            <td>{{ $row["kedudukan_kepegawaian"] }}</td>
                            <td>{{ $row["bantuan_bepetarum_pns"] }}</td>
                            <td>{{ $row["tahun_bantuan_bepetarum_pns"] }}</td>
                            <td>{{ $row["status_kawin"] }}</td>
                            <td>{{ $row["rt_rw"] }}</td>
                            <td>{{ $row["hp"] }}</td>
                            <td>{{ $row["telepon"] }}</td>
                            <td>{{ $row["kode_pos"] }}</td>
                            <td>{{ $row["kelurahan_id"] }}</td>
                            <td>{{ $row["kecamatan_id"] }}</td>
                            <td>{{ $row["golongan_darah"] }}</td>
                            <td><img src="{{ $row["foto"] }}"></td>
                            <td>{{ $row["no_karpeg"] }}</td>
                            <td>{{ $row["no_taspen"] }}</td>
                            <td>{{ $row["npwp"] }}</td>
                            <td>{{ $row["no_bpjs"] }}</td>
                            <td>{{ $row["no_kariskarsu"] }}</td>
                            <td>{{ $row["nik"] }}</td>
                            <td>{{ $row["pangkat_id"] }}</td>
                            <td>{{ $row["jabatan_id"] }}</td>
                            <td>{{ $row["unit_kerja_id"] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

@endsection
