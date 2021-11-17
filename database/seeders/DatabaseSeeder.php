<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesSeeder::class);
        $this->call(IdentitasSeeder::class);
        $this->call(KecamatanSeeder::class);
        $this->call(KelurahanSeeder::class);
        $this->call(PangkatSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(UnitKerjaSeeder::class);
        $this->call(DokumenSeeder::class);
    }
}
