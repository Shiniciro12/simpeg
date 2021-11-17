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
            'jabatan_id' => 'f797f7c4-abb4-4be8-af6a-0e8570464f1e',
            'identitas_id' => 'fb8c36c1-af6a-4cb6-b91c-32f6f7530435',
            'pejabat' => 'Walikota Kupang',
            'no_sk' => 'KABID-93993',
            'tgl_sk' => '2019-10-11',
            'tmt_jabatan' => '2019-10-12',
            'sk_jabatan' => 'sk_jabatan.pdf',
        ]);
    }
}
