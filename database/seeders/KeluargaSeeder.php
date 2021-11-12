<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keluarga;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Keluarga::create([
            'identitas_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79ee',
            'nik' => '1234567890123456',
            'nama' => 'Andi',
            'tempat_lahir' => 'kupang',
            'tgl_lahir' => '1999-09-10',
            'jenis_kelamin' => 'L',
            'status_keluarga' => 'Saudara',
            'status_kawin' => 'Kawin',
            'tgl_kawin' => '2019-10-20',
            'status_tunjangan' => 'Tidak',
            'pendidikan' => 'S1',
            'pekerjaan' => 'Staf',
            'alamat' => 'Jl Timor Raya Km 9',
            'desa_kelurahan' => 'Oesapa',
            'kecamatan' => 'Kelapa Lima',
            'kabupaten_kota' => 'Kupang',
            'provinsi' => 'NTT',
            'hp' => '081111222333',
            'telepon' => '123456789',
            'kode_pos' => '77982',
            'dokumen' => 'dokumen_keluarga.pdf',
        ]);
    }
}
