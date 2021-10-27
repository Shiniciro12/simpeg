<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RiwayatPangkat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pangkat', function (Blueprint $table) {
            $table->uuid('riwayat_pangkat_id')->primary();
            $table->uuid('identitas_id');
            $table->uuid('pangkat_id');
            $table->string('pejabat');
            $table->string('no_sk')->unique();
            $table->date('tgl_sk');
            $table->date('tmt_pangkat');
            $table->string('sk_pangkat');
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
        Schema::dropIfExists('riwayat_pangkat');
    }
}
