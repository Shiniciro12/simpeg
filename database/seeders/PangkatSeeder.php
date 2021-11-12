<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pangkat;

class PangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pangkat::create([
            'pangkat' => 'IV/a',
            'golongan' => 'I/a',
        ]);
    }
}
