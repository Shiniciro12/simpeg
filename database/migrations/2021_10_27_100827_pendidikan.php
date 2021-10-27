<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pendidikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->uuid('pendidikan_id')->primary();
            $table->uuid('identitas_id');
            $table->string('tingkat_pendidikan');
            $table->string('jurusan');
            $table->string('nama_lembaga_pendidikan');
            $table->string('tempat');
            $table->string('nama_kepsek_rektor');
            $table->string('no_sttb')->unique();
            $table->date('tgl_sttb');
            $table->string('sttb');
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
        Schema::dropIfExists('pendidikan');
    }
}
