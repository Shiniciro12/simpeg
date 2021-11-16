<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Keluarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('keluarga', function (Blueprint $table) {
            $table->uuid('keluarga_id')->primary();
            $table->uuid('identitas_id');
            $table->string('nik', 16)->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->char('jenis_kelamin', 1);
            $table->string('status_keluarga');
            $table->string('status_kawin');
            $table->date('tgl_kawin');
            $table->string('status_tunjangan');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('desa_kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten_kota');
            $table->string('provinsi');
            $table->string('hp', 12);
            $table->string('telepon')->nullable();
            $table->string('kode_pos', 5);
            $table->string('dokumen');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE keluarga ALTER COLUMN keluarga_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keluarga');
    }
}
