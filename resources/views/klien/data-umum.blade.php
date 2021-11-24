@extends('klien.layouts.main')
@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h1 class="m-b-10" style="color:white">Data Umum (FIP)</h1>
                        <!-- <p class="m-b-0" style="font-size: 20px">Selamat datang di Sistem Informasi Pegawai</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <span>
                                        <h5>Progress Pengisian Data FIP</h5> <br>
                                    </span>
                                    <?php
                                        $persen = ($jumlah * 100) / 7;
                                        ?>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{ round($persen) }}%;" aria-valuenow="{{ round($persen) }}"
                                            aria-valuemin="0" aria-valuemax="100">{{ round($persen) }}%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- task, page, download counter  start -->
                        <div class="col-sm-4 mx-auto">
                            <a href="/klien/dataumum/identitas/edit">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h4 class="text-c-black">Data</h4>
                                                <h6 class="text-muted m-b-0">Identitas</h6>
                                            </div>
                                            <div class="col-4 text-right">
                                                <i class="fa fa-id-badge f-38 d-inline"></i>
                                            </div>
                                        </div>
                                    </div>
                            </a>
                            @if($identitas['status'] == '4')
                            <div class="card-footer bg-c-red">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0">Terverifkasi : Belum Terverifkasi</p>
                                    </div>
                                </div>
                            </div>
                            @elseif($identitas['status'] == '3')
                            <div class="card-footer bg-c-yellow">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0">Terverifkasi : Unit Kerja</p>
                                    </div>
                                </div>
                            </div>
                            @elseif($identitas['status'] == '2')
                            <div class="card-footer bg-c-green">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0">Terverifkasi : BKPPD</p>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="card-footer bg-c-blue">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0">Terverifkasi : Proses</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 mx-auto">
                        <a href="/klien/dataumum/riwayat-pangkat">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-black">Riwayat</h4>
                                            <h6 class="text-muted m-b-0">Pangkat/Golongan</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-reorder f-38"></i>
                                        </div>
                                    </div>
                                </div>
                        </a>

                        @if ($riwayatPangkat == true)
                        <div class="card-footer bg-c-green">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">Selesai</p>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="card-footer bg-c-yellow">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-black m-b-0">Belum Selesai</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="col-sm-4 mx-auto">
                    <a href="/klien/dataumum/riwayat-pendidikan">
                        <div class="card">
                            <div class="card-block">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="text-c-black">Riwayat</h4>
                                        <h6 class="text-muted m-b-0">Pendidikan</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <i class="fa fa-graduation-cap f-38"></i>
                                    </div>
                                </div>
                            </div>
                    </a>

                    @if ($riwayatPendidikan == true)
                    <div class="card-footer bg-c-green">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0">Selesai</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card-footer bg-c-yellow">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-black m-b-0">Belum Selesai</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-sm-4 mx-auto">
                <a href="/klien/dataumum/riwayat-jabatan">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-black">Riwayat</h4>
                                    <h6 class="text-muted m-b-0">Jabatan</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-braille f-38"></i>
                                </div>
                            </div>
                        </div>
                </a>
                @if ($jabatan == true)
                <div class="card-footer bg-c-green">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0">Selesai</p>
                        </div>
                    </div>
                </div>
                @else
                <div class="card-footer bg-c-yellow">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-black m-b-0">Belum Selesai</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <div class="col-sm-4 mx-auto">
            <a href="/klien/dataumum/diklat">
                <div class="card">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-black">Data</h4>
                                <h6 class="text-muted m-b-0">Diklat</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fa fa-toggle-up f-38"></i>
                            </div>
                        </div>
                    </div>
            </a>
            @if ($diklat == true)
            <div class="card-footer bg-c-green">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0">Selesai</p>
                    </div>
                </div>
            </div>
            @else
            <div class="card-footer bg-c-yellow">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-black m-b-0">Belum Selesai</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="col-sm-4 mx-auto">
        <a href="/klien/dataumum/keluarga">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-black">Data</h4>
                            <h6 class="text-muted m-b-0">Keluarga</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-users f-38"></i>
                        </div>
                    </div>
                </div>
        </a>
        @if ($keluarga == true)
        <div class="card-footer bg-c-green">
            <div class="row align-items-center">
                <div class="col-9">
                    <p class="text-white m-b-0">Selesai</p>
                </div>
            </div>
        </div>
        @else
        <div class="card-footer bg-c-yellow">
            <div class="row align-items-center">
                <div class="col-9">
                    <p class="text-black m-b-0">Belum Selesai</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<div class="col-sm-4 mx-auto">
    <a href="/klien/dataumum/tandajasa">
        <div class="card">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="text-c-black">Riwayat</h4>
                        <h6 class="text-muted m-b-0">Tanda Jasa</h6>
                    </div>
                    <div class="col-4 text-right">
                        <i class="fa fa-tags f-38"></i>
                    </div>
                </div>
            </div>
    </a>
    @if ($tandaJasa == true)
    <div class="card-footer bg-c-green">
        <div class="row align-items-center">
            <div class="col-9">
                <p class="text-white m-b-0">Selesai</p>
            </div>
        </div>
    </div>
    @else
    <div class="card-footer bg-c-yellow">
        <div class="row align-items-center">
            <div class="col-9">
                <p class="text-black m-b-0">Belum Selesai</p>
            </div>
        </div>
    </div>
    @endif
</div>
</div>

</div>
<!-- task, page, download counter  end -->
<!-- Page-body end -->
</div>
<div id="styleSelector"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection