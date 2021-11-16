<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnitKerja;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        UnitKerja::create([
            'nama_unit' => 'Dinas Komunikasi & Informatika Kota Kupang',
            'alamat' => 'Jalan Inaboi',
            'latitude' => '-9.9299299292',
            'longitude' => '3.9299292929',
        ]);
    }
}
