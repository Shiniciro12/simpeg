<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create([
            'name' => 'root',
        ]);

        Role::create([
            'name' => 'bkppd',
        ]);

        Role::create([
            'name' => 'unit-kerja',
        ]);

        Role::create([
            'name' => 'client',
        ]);
    }
}
