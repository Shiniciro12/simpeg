<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class TandaJasa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
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
        DB::statement('ALTER TABLE tanda_jasa ALTER COLUMN tanda_jasa_id SET DEFAULT uuid_generate_v4();');
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
