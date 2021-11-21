<?php

namespace Database\Seeders;

use App\Models\Persyaratan;
use Illuminate\Database\Seeder;

class PersyaratanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persyaratan::create([
            'layanan_id' => '6c7ba355-ffae-4c03-bc22-1c99380b09cc',
            'dokumen_id' => '6c7ba355-ffae-4c03-bc22-1c99380b09cc',
        ]);
    }
}
