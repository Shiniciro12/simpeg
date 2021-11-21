<?php

namespace Database\Seeders;

use App\Models\Berkas;
use Illuminate\Database\Seeder;

class BerkasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Berkas::create([
            'data_khusus_id' => '6c7ba355-ffae-4c03-bc22-1c99380b09cc',
            'layanan_id' => '6c7ba355-ffae-4c03-bc22-1c99380b09cc',
        ]);
    }
}
