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
            'jabatan_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79ee',
            'identitas_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79ee',
            'pejabat' => 'Walikota Kupang',
            'no_sk' => 'KABID-93993',
            'tgl_sk' => '2019-10-11',
            'tmt_jabatan' => '2019-10-12',
            'sk_jabatan' => 'sk_jabatan.pdf',
        ]);
    }
}
