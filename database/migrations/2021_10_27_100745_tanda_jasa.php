<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TandaJasa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanda_jasa', function (Blueprint $table) {
            $table->uuid('tanda_jasa_id')->primary();
            $table->uuid('identitas_id');
            $table->string('nama');
            $table->string('no_sk')->unique();
            $table->date('tgl_sk');
            $table->string('tahun', 4);
            $table->string('asal_perolehan');
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
        Schema::dropIfExists('tanda_jasa');
    }
}
