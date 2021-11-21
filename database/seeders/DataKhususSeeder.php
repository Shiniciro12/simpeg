<?php

namespace Database\Seeders;

use App\Models\DataKhusus;
use Illuminate\Database\Seeder;

class DataKhususSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DataKhusus::create([
            'nama_data_khusus' => 'Satya Lencana',
        ]);
    }
}
