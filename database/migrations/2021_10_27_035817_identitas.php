<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Identitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('identitas', function (Blueprint $table) {
            $table->uuid('identitas_id')->primary();
            $table->string('nip', 18)->unique();
            $table->string('password');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->string('nama');
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->char('jenis_kelamin', 1);
            $table->string('agama');
            $table->string('status_kepegawaian');
            $table->string('jenis_kepegawaian');
            $table->string('kedudukan_kepegawaian');
            $table->string('bantuan_bepetarum_pns');
            $table->string('tahun_bantuan_bepetarum_pns', 4);
            $table->string('status_kawin');
            $table->string('rt_rw', 7);
            $table->string('hp', 12)->unique();
            $table->string('telepon')->nullable();
            $table->uuid('kelurahan_id');
            $table->uuid('kecamatan_id');
            $table->string('golongan_darah', 2);
            $table->string('foto');
            $table->string('no_karpeg')->unique();
            $table->string('no_taspen')->unique();
            $table->string('npwp')->unique();
            $table->string('no_bpjs')->unique();
            $table->string('no_kariskarsu')->unique();
            $table->string('nik', 16)->unique();
            $table->uuid('pangkat_id');
            $table->uuid('jabatan_id');
            $table->uuid('unit_kerja_id');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE identitas ALTER COLUMN identitas_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identitas');
    }
}
