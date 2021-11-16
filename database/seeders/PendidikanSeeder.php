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
            'identitas_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79ee',
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
