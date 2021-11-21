<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RiwayatPangkat;

class RiwayatPangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        RiwayatPangkat::create([
            'pangkat_id' => 'b90e84fc-8071-4ebe-aa6f-135025b50317',
            'identitas_id' => '72b03b78-df19-446a-bdb5-b235380c01f8',
            'masa_kerja_gol_bln' => '2',
            'masa_kerja_gol_tahun' => '8',
            'pejabat' => 'Gubernur NTT',
            'no_sk' => 'IV/a-93993',
            'tgl_sk' => '2019-01-11',
            'tmt_pangkat' => '2019-01-12',
            'sk_pangkat' => 'sk_pangkat.pdf',
        ]);
    }
}
