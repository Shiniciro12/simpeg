<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pendidikan;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pendidikan::create([
            'identitas_id' => '72b03b78-df19-446a-bdb5-b235380c01f8',
            'tingkat_pendidikan' => 'S1',
            'jurusan' => 'Teknik Mesin',
            'nama_lembaga_pendidikan' => 'Universitas Nusa Cendana',
            'tempat' => 'Jl Eltari 2',
            'nama_kepsek_rektor' => 'Budi',
            'no_sttb' => 'KL-99992',
            'tgl_sttb' => '2010-09-17',
            'sttb' => 'ijazah.pdf',
            'transkrip' => 'transkrip.pdf',
        ]);
    }
}
