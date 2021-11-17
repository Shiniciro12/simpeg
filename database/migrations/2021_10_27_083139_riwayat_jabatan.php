<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class RiwayatJabatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('riwayat_jabatan', function (Blueprint $table) {
            $table->uuid('riwayat_jabatan_id')->primary();
            $table->uuid('jabatan_id');
            $table->uuid('identitas_id');
            $table->string('pejabat');
            $table->string('no_sk')->unique();
            $table->date('tgl_sk');
            $table->date('tmt_jabatan');
            $table->string('sk_jabatan');
            $table->string('pak')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE riwayat_jabatan ALTER COLUMN riwayat_jabatan_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_jabatan');
    }
}
