<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Berkas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('berkas', function (Blueprint $table) {
            $table->uuid('berkas_id')->primary();
            $table->uuid('data_khusus_id')->nullable();
            $table->uuid('layanan_id')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE berkas ALTER COLUMN berkas_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas');
    }
}
