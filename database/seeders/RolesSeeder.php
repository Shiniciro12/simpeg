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
            'role_name' => 'root',
        ]);

        Role::create([
            'role_name' => 'bkppd',
        ]);

        Role::create([
            'role_name' => 'unit-kerja',
        ]);

        Role::create([
            'role_name' => 'client',
        ]);
    }
}
