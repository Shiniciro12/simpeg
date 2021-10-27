<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Diklat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diklat', function (Blueprint $table) {
            $table->uuid('diklat_id')->primary();
            $table->uuid('identitas_id');
            $table->string('status');
            $table->string('nama');
            $table->string('tempat');
            $table->string('penyelenggara');
            $table->float('angka');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->integer('jam');
            $table->string('no_sttp')->unique();
            $table->date('tgl_sttp');
            $table->string('sertifikat');
            $table->timestamps();
        });
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
