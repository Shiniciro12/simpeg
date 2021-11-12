<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'pegawai',
            'email' => 'pegawai@mail.com',
            'password' => '$2y$10$2xMLOZbu/CiXuM1URUseoeEstaH3272UdMpZfHNyEzqfzB3pczbMq',
            'active' => '1',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => '$2y$10$2xMLOZbu/CiXuM1URUseoeEstaH3272UdMpZfHNyEzqfzB3pczbMq',
            'active' => '1',
        ]);

        User::create([
            'name' => 'super admin',
            'email' => 'superadmin@mail.com',
            'password' => '$2y$10$2xMLOZbu/CiXuM1URUseoeEstaH3272UdMpZfHNyEzqfzB3pczbMq',
            'active' => '0',
        ]);
    }
}
