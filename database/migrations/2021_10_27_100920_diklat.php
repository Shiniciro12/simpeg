<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Diklat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('diklat', function (Blueprint $table) {
            $table->uuid('diklat_id')->primary();
            $table->uuid('identitas_id');
            $table->string('status');
            $table->string('nama');
            $table->string('tempat');
            $table->string('penyelenggara');
            $table->float('angka')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->integer('jam')->nullable();
            $table->string('no_sttp')->unique();
            $table->date('tgl_sttp');
            $table->string('sertifikat');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE diklat ALTER COLUMN diklat_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diklat');
    }
}
