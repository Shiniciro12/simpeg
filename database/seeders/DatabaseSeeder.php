<?php

namespace Database\Seeders;

use App\Models\Diklat;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Identitas;
use App\Models\Jabatan;
use App\Models\Kecamatan;
use App\Models\Keluarga;
use App\Models\Kelurahan;
use App\Models\Pangkat;
use App\Models\Pendidikan;
use App\Models\RiwayatJabatan;
use App\Models\RiwayatPangkat;
use App\Models\TandaJasa;
use App\Models\UnitKerja;

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
        User::create([
            'name' => 'pegawai',
            'email' => 'pegawai@mail.com',
            'password' => '$2y$10$2xMLOZbu/CiXuM1URUseoeEstaH3272UdMpZfHNyEzqfzB3pczbMq',
            'role_id' => '1',
            'active' => '1',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => '$2y$10$2xMLOZbu/CiXuM1URUseoeEstaH3272UdMpZfHNyEzqfzB3pczbMq',
            'role_id' => '2',
            'active' => '1',
        ]);

        User::create([
            'name' => 'super admin',
            'email' => 'superadmin@mail.com',
            'password' => '$2y$10$2xMLOZbu/CiXuM1URUseoeEstaH3272UdMpZfHNyEzqfzB3pczbMq',
            'role_id' => '3',
            'active' => '0',
        ]);

        // for ($i=0; $i <3000 ; $i++) { 
        //     Identitas::create([
        //         'nip' => '7477474'.$i,
        //         'nama' => 'kenny perulu'.$i,
        //         'gelar_depan' => '',
        //         'gelar_belakang' => 'S.Kom'.$i,
        //         'tempat_lahir' => 'dili'.$i,
        //         'tgl_lahir' => '1997-11-28',
        //         'jenis_kelamin' => 'L',
        //         'agama' => 'Kristen',
        //         'status_kepegawaian' => 'PNS'.$i,
        //         'jenis_kepegawaian' => 'PNS'.$i,
        //         'kedudukan_kepegawaian' => 'Fungsional',
        //         'bantuan_bepetarum_pns' => 'Ya',
        //         'tahun_bantuan_bepetarum_pns' => '2021',
        //         'status_kawin' => 'Belum Menikah',
        //         'rt_rw' => '008/009',
        //         'hp' => '081246'.$i,
        //         'telepon' => '081247569523',
        //         'kelurahan_id' => '6c7ba355-ffae-4c03-bc22-1c99380b09cc',
        //         'kecamatan_id' => '6c7ba355-ffae-4c03-bc22-1c99380b09cd',
        //         'golongan_darah' => 'A',
        //         'foto' => "image$i.jpg",
        //         'no_karpeg' => '17177'.$i,
        //         'no_taspen' => '123456789'.$i,
        //         'npwp' => '123456789'.$i,
        //         'no_bpjs' => '123456789'.$i,
        //         'no_kariskarsu' => '123456789'.$i,
        //         'nik' => '123456789'.$i,
        //         'pangkat_id' => '6c7ba355-ffae-4c03-bc22-1c99380b09ee',
        //         'jabatan_id' => '6c7ba355-ffae-4c03-bc22-1c99380b09fe',
        //         'unit_kerja_id' => '6c7ba355-ffae-4c03-bc22-1c99380b09ff',
        //     ]);
        // }
        
        Kecamatan::create([
            'nama_kecamatan' => 'Kelapa Lima',
        ]);

        Kelurahan::create([
            'nama_kelurahan' => 'Oesapa',
            'kode_pos' => '97668',
        ]);
                
        
        UnitKerja::create([
            'nama_unit' => 'Dinas Komunikasi & Informatika Kota Kupang',
            'alamat' => 'Jalan Inaboi',
            'latitude' => '-9.9299299292',
            'longitude' => '3.9299292929',
        ]);

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
        ]);

        TandaJasa::create([
            'identitas_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79ee',
            'nama' => 'Tanda jasa',
            'no_sk' => 'KLL-02929',
            'tgl_sk' => '2018-09-11',
            'tahun' => '2018',
            'asal_perolehan' => 'Lembaga lain',
            'sertifikat' => 'tanda_jasa.pdf',
        ]);

        Diklat::create([
            'identitas_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79ee',
            'status' => 'Diklat Struktural',
            'nama' => 'Diklat PIM IV',
            'tempat' => 'Geduang Negara',
            'penyelenggara' => 'Badan Kepegawaain Provinsi NTT',
            'angka' => '90.01',
            'tgl_mulai' => '2018-04-01',
            'tgl_selesai' => '2018-04-14',
            'jam' => '120',
            'no_sttp' => 'STTP-292992',
            'tgl_sttp' => '2018-05-01',
            'sertifikat' => 'diklat_struktural.pdf',
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Kabid IV Bidang Layanan',
            'eselon' => 'IV/a',
            'kelas' => '',
            'unit_kerja_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79fe',
            'jenis_jabatan' => 'Struktural',
        ]);

        RiwayatJabatan::create([
            'jabatan_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79ee',
            'identitas_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79ee',
            'pejabat' => 'Walikota Kupang',
            'no_sk' => 'KABID-93993',
            'tgl_sk' => '2019-10-11',
            'tmt_jabatan' => '2019-10-12',
            'sk_jabatan' => 'sk_jabatan.pdf',
        ]);

        Pangkat::create([
            'pangkat' => 'IV/a',
            'golongan' => 'I/a',
        ]);

        RiwayatPangkat::create([
            'pangkat_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79ee',
            'identitas_id' => '6c7ba355-ffae-4c03-bc22-1c99380b79ee',
            'pejabat' => 'Gubernur NTT',
            'no_sk' => 'IV/a-93993',
            'tgl_sk' => '2019-01-11',
            'tmt_pangkat' => '2019-01-12',
            'sk_pangkat' => 'sk_pangkat.pdf',
        ]);

    }
}
