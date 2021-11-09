<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Identitas;

class IdentitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i <10 ; $i++) { 
            Identitas::create([
                'nip' => '7477474'.$i,
                'nama' => 'kenny perulu'.$i,
                'gelar_depan' => '',
                'gelar_belakang' => 'S.Kom'.$i,
                'tempat_lahir' => 'dili'.$i,
                'tgl_lahir' => '1997-11-28',
                'jenis_kelamin' => 'L',
                'agama' => 'Kristen',
                'status_kepegawaian' => 'PNS'.$i,
                'jenis_kepegawaian' => 'PNS'.$i,
                'kedudukan_kepegawaian' => 'Fungsional',
                'bantuan_bepetarum_pns' => 'Ya',
                'tahun_bantuan_bepetarum_pns' => '2021',
                'status_kawin' => 'Belum Menikah',
                'rt_rw' => '008/009',
                'hp' => '081246'.$i,
                'telepon' => '081247569523',
                'kelurahan_id' => '6c7ba355-ffae-4c03-bc22-1c99380b09cc',
                'kecamatan_id' => '6c7ba355-ffae-4c03-bc22-1c99380b09cd',
                'golongan_darah' => 'A',
                'foto' => "image$i.jpg",
                'no_karpeg' => '17177'.$i,
                'no_taspen' => '123456789'.$i,
                'npwp' => '123456789'.$i,
                'no_bpjs' => '123456789'.$i,
                'no_kariskarsu' => '123456789'.$i,
                'nik' => '123456789'.$i,
                'pangkat_id' => '6c7ba355-ffae-4c03-bc22-1c99380b09ee',
                'jabatan_id' => '6c7ba355-ffae-4c03-bc22-1c99380b09fe',
                'unit_kerja_id' => '6c7ba355-ffae-4c03-bc22-1c99380b09ff',
            ]);
        }
    }
}
