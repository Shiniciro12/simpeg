<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diklat;

class DiklatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Diklat::create([
            'identitas_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79ee',
            'status' => 'Diklat Struktural',
            'nama' => 'Diklat PIM IV',
            'tempat' => 'Geduang Negara',
            'penyelenggara' => 'Badan Kepegawaain Provinsi NTT',
            'angka' => '90.01',
            'tgl_mulai' => '2018-04-01',
            'tgl_selesai' => '2018-04-14',
            'jam' => '120',
            'no_sttp' => 'STTP-292992',
            'tgl_sttp' => '2018-05-01',
            'sertifikat' => 'diklat_struktural.pdf',
        ]);

    }
}
