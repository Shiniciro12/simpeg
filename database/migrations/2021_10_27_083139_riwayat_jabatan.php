<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RiwayatJabatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_jabatan', function (Blueprint $table) {
            $table->uuid('riwayat_jabatan_id')->primary();
            $table->uuid('jabatan_id');
            $table->uuid('identitas_id');
            $table->string('pejabat');
            $table->string('no_sk')->unique();
            $table->date('tgl_sk');
            $table->date('tmt_jabatan');
            $table->string('sk_jabatan');
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
        Schema::dropIfExists('riwayat_jabatan');
    }
}
