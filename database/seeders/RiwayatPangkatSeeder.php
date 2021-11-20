<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RiwayatPangkat;

class RiwayatPangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        RiwayatPangkat::create([
            'pangkat_id' => 'b90e84fc-8071-4ebe-aa6f-135025450317',
            'identitas_id' => '72b03b78-df19-446a-bdb5-b235380c01f8',
            'pejabat' => 'Gubernur NTT',
            'no_sk' => 'IV/a-939t93',
            'tgl_sk' => '2019-01-11',
            'tmt_pangkat' => '2019-01-12',
            'sk_pangkat' => 'sk_padkat.pdf',
        ]);
        RiwayatPangkat::create([
            'pangkat_id' => 'b90e84fc-8071-4ebe-aa6f-135024b50317',
            'identitas_id' => '72b03b78-df19-446a-bdb5-b235380c01f8',
            'pejabat' => 'Gubernur NTT',
            'no_sk' => 'IV/a-93e993',
            'tgl_sk' => '2019-01-11',
            'tmt_pangkat' => '2019-01-12',
            'sk_pangkat' => 'sk_pafkat.pdf',
        ]);
        RiwayatPangkat::create([
            'pangkat_id' => 'b90e84fc-8071-4ebe-aa6f-135055b50317',
            'identitas_id' => '72b03b78-df19-446a-bdb5-b235380c01f8',
            'pejabat' => 'Gubernur NTT',
            'no_sk' => 'IV/a-93gd993',
            'tgl_sk' => '2019-01-11',
            'tmt_pangkat' => '2019-01-12',
            'sk_pangkat' => 'sk_pang1at.pdf',
        ]);
        RiwayatPangkat::create([
            'pangkat_id' => 'b90e84fc-8071-4ebe-aa6f-135025b60317',
            'identitas_id' => '72b03b78-df19-446a-bdb5-b235380c01f8',
            'pejabat' => 'Gubernur NTT',
            'no_sk' => 'IV/a-93a993',
            'tgl_sk' => '2019-01-11',
            'tmt_pangkat' => '2019-01-12',
            'sk_pangkat' => 'sk_panakat.pdf',
        ]);
        RiwayatPangkat::create([
            'pangkat_id' => 'c90e84fc-8071-4ebe-aa6f-135025b60317',
            'identitas_id' => '72b03b78-df19-446a-bdb5-b235380c01f8',
            'pejabat' => 'Gubernur NTT',
            'no_sk' => 'IV/a-939g93',
            'tgl_sk' => '2019-01-11',
            'tmt_pangkat' => '2019-01-12',
            'sk_pangkat' => 'sk_pangkft.pdf',
        ]);
        RiwayatPangkat::create([
            'pangkat_id' => 'b90182fc-8071-4ebe-aa6f-135025b60317',
            'identitas_id' => '72b03b78-df19-446a-bdb5-b235380c01f8',
            'pejabat' => 'Gubernur NTT',
            'no_sk' => 'IV/a-939v93',
            'tgl_sk' => '2019-01-11',
            'tmt_pangkat' => '2019-01-12',
            'sk_pangkat' => 'sk_panskat.pdf',
        ]);
        RiwayatPangkat::create([
            'pangkat_id' => 'b90e81fc-8071-4ebe-aa6f-135025b60317',
            'identitas_id' => '72b03b78-df19-446a-bdb5-b235380c01f8',
            'pejabat' => 'Gubernur NTT',
            'no_sk' => 'IV/a-9a3993',
            'tgl_sk' => '2019-01-11',
            'tmt_pangkat' => '2019-01-12',
            'sk_pangkat' => 'sk_panvbat.pdf',
        ]);
        RiwayatPangkat::create([
            'pangkat_id' => 'b90e84fc-8021-4ebe-aa6f-135025b60317',
            'identitas_id' => '72b03b78-df19-446a-bdb5-b235380c01f8',
            'pejabat' => 'Gubernur NTT',
            'no_sk' => 'IV/a-93d993',
            'tgl_sk' => '2019-01-11',
            'tmt_pangkat' => '2019-01-12',
            'sk_pangkat' => 'sk_pangk123at.pdf',
        ]);
        RiwayatPangkat::create([
            'pangkat_id' => 'b90e84fc-8071-42be-aa6f-135025b60317',
            'identitas_id' => '72b03b78-df19-446a-bdb5-b235380c01f8',
            'pejabat' => 'Gubernur NTT',
            'no_sk' => 'IV/a-931993',
            'tgl_sk' => '2019-01-11',
            'tmt_pangkat' => '2019-01-12',
            'sk_pangkat' => 'sk_pangkagat.pdf',
        ]);
    }
}
