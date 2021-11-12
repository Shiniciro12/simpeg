<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Identitas;
use App\Models\Role;
use App\Models\RoleUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class IdentitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 5; $i++) {
            Identitas::create([
                'nip' => '12345678901234567' . $i,
                'password' => Hash::make('admin1234'),
                'role_id' => $i, 
                'nama' => 'kenny perulu',
                'gelar_depan' => '', 'gelar_belakang' => 'S.Kom',
                'tempat_lahir' => 'dili', 'tgl_lahir' => '1997-11-28',
                'jenis_kelamin' => 'L',
                'agama' => 'Kristen',
                'status_kepegawaian' => 'PNS',
                'jenis_kepegawaian' => 'PNS',
                'kedudukan_kepegawaian' => 'Fungsional',
                'bantuan_bepetarum_pns' => 'Ya',
                'tahun_bantuan_bepetarum_pns' => '2021',
                'status_kawin' => 'Belum Menikah',
                'rt_rw' => '008/009',
                'hp' => '08124787845' . $i,
                'telepon' => '08124787841'. $i,
                'kelurahan_id' => '6c7ba355-ffae-4c03-bc22-1c99380b09cc',
                'kecamatan_id' => '6a7ba355-ffae-4c03-bc22-1c99380b09cd',
                'golongan_darah' => 'A',
                'foto' => $i."image.jpg",
                'no_karpeg' => '123456789' . $i,
                'no_taspen' => '123456789' . $i,
                'npwp' => '123456789' . $i,
                'no_bpjs' => '123456789' . $i,
                'no_kariskarsu' => '123456789' . $i,
                'nik' => '123456789012345' . $i,
                'pangkat_id' => '6d7ba355-ffae-4c03-bc22-1c99380b09ee',
                'jabatan_id' => '6e7ba355-ffae-4c03-bc22-1c99380b09fe',
                'unit_kerja_id' => '6f7ba355-ffae-4c03-bc22-1c99380b09ff'
            ]);
        }
    }
}
