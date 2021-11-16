<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TandaJasa;

class TandaJasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TandaJasa::create([
            'identitas_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79ee',
            'nama' => 'Tanda jasa',
            'no_sk' => 'KLL-02929',
            'tgl_sk' => '2018-09-11',
            'tahun' => '2018',
            'asal_perolehan' => 'Lembaga lain',
            'sertifikat' => 'tanda_jasa.pdf',
        ]);

    }
}
