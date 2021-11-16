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
            'pangkat_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79ee',
            'identitas_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79ee',
            'pejabat' => 'Gubernur NTT',
            'no_sk' => 'IV/a-93993',
            'tgl_sk' => '2019-01-11',
            'tmt_pangkat' => '2019-01-12',
            'sk_pangkat' => 'sk_pangkat.pdf',
        ]);

    }
}
