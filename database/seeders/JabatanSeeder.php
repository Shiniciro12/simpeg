<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Jabatan::create([
            'nama_jabatan' => 'Kabid IV Bidang Layanan',
            'eselon' => 'IV/a',
            'kelas' => '',
            'unit_kerja_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79fe',
            'jenis_jabatan' => 'Struktural',
        ]);

    }
}
