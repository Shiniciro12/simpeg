<?php

namespace Database\Seeders;

use App\Models\Verifikasi;
use Illuminate\Database\Seeder;

class VerifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Verifikasi::create([
            'docx_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79ee',
            'identitas_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79ee',
            'status' => '1',
            'unit_verif_at' => '1637488098',
            'bkppd_verif_at' => '1637488125',
            'unit_verif_by' => '',
            'bkppd_verif_by' => '',
            'jenis_data' => 'Satya Lencana',
        ]);
    }
}
