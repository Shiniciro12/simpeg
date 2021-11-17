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
            'pangkat_id' => '8bc252a6-9613-4da0-b4c6-ca90d83451b7',
            'identitas_id' => 'fb8c36c1-af6a-4cb6-b91c-32f6f7530435',
            'pejabat' => 'Gubernur NTT',
            'no_sk' => 'IV/a-93993',
            'tgl_sk' => '2019-01-11',
            'tmt_pangkat' => '2019-01-12',
            'sk_pangkat' => 'sk_pangkat.pdf',
        ]);

    }
}
