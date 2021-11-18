<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RiwayatJabatan;

class RiwayatJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     */
    public function run()
    {
        //
        RiwayatJabatan::create([
            'jabatan_id' => '0d06498a-6757-44ec-a463-3670067c4224',
            'identitas_id' => '72b03b78-df19-446a-bdb5-b235380c01f8',
            'pejabat' => 'Walikota Kupang',
            'no_sk' => 'KABID-93993',
            'tgl_sk' => '2019-10-11',
            'tmt_jabatan' => '2019-10-12',
            'sk_jabatan' => 'sk_jabatan.pdf',
        ]);
    }
}
