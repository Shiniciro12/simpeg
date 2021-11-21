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
            'identitas_id' => 'fb8c36c1-af6a-4cb6-b91c-32f6f7530435',
            'data_khusus_id' => 'fb8c36c1-af6a-4cb6-b91c-32f6f7530437',
            'file_path' => '/unggah/layanan-sk/dokumen',
        ]);
    }
}
