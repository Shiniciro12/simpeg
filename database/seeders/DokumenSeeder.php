<?php

namespace Database\Seeders;

use App\Models\Dokumen;
use Illuminate\Database\Seeder;

class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Dokumen::create([
            'dokumen' => '/layanan/dokumen',
            'identitas_id' => 'fb8c36c1-af6a-4cb6-b91c-32f6f7530435',
            'status' => '0',
            'unit_verif_at' => '',
            'bkppd_verif_at' => '',
            'unit_verif_by' => 'fb8c36c1-af6a-4cb6-b91c-32f6f7530435',
            'bkppd_verif_by' => 'fb8c36c1-af6a-4cb6-b91c-32f6f7530435',
            'jenis_layanan_id' => '78a77078-7a08-45eb-9977-2a692aacb122',
        ]);
    }
}
