<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class JenisLayanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('jenis_layanan', function (Blueprint $table) {
            $table->uuid('jenis_layanan_id')->primary();
            $table->string('nama_layanan')->nullable();
            $table->string('penyedia_layanan')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE jenis_layanan ALTER COLUMN jenis_layanan_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_layanan');
    }
}
