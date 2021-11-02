<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Jabatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('jabatan', function (Blueprint $table) {
            $table->uuid('jabatan_id')->primary();
            $table->string('nama_jabatan');
            $table->string('eselon');
            $table->string('kelas');
            $table->uuid('unit_kerja_id');
            $table->string('jenis_jabatan');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE jabatan ALTER COLUMN jabatan_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jabatan');
    }
}
