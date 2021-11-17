<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisLayanan;

class JenisLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        JenisLayanan::create([
            'nama_layanan' => 'Satya Lencana',
            'penyedia_layanan' => 'Bidang Pengembbangan',
        ]);

        JenisLayanan::create([
            'nama_layanan' => 'IBEL/TUBEL',
            'penyedia_layanan' => 'Bidang Pengembangan',
        ]);

        JenisLayanan::create([
            'nama_layanan' => 'Mutasi kenaikan pangkat penyesuaian ijazah',
            'penyedia_layanan' => 'Bidang Mutasi',
        ]);

        JenisLayanan::create([
            'nama_layanan' => 'Mutasi pelayanan kenaikan pangkat jabatan fungsional tertentu',
            'penyedia_layanan' => 'Bidang Mutasi',
        ]);
        
        JenisLayanan::create([
            'nama_layanan' => 'Pelayanan Kenaikan pangkat reguler',
            'penyedia_layanan' => 'Bidang Mutasi',
        ]);
        
        JenisLayanan::create([
            'nama_layanan' => 'Kenaikan pangkat jabatan struktural',
            'penyedia_layanan' => 'Bidang Mutasi',
        ]);
        
        JenisLayanan::create([
            'nama_layanan' => 'Kelengkapan mutasi struktural',
            'penyedia_layanan' => 'Bidang Mutasi',
        ]);
        
        JenisLayanan::create([
            'nama_layanan' => 'Pengurusan sk pensiun BUP',
            'penyedia_layanan' => 'Bidang Mutasi',
        ]);
        
        JenisLayanan::create([
            'nama_layanan' => 'Pengurusan sk pensiun dini',
            'penyedia_layanan' => 'Bidang Mutasi',
        ]);
        
        JenisLayanan::create([
            'nama_layanan' => 'Pengurusan sk pensiun janda/duda',
            'penyedia_layanan' => 'Bidang Mutasi',
        ]);
    }
}
