<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Kelurahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('kelurahan', function (Blueprint $table) {
            $table->uuid('kelurahan_id')->primary();
            $table->string('nama_kelurahan')->unique();
            $table->string('kode_pos', 5)->unique();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE kelurahan ALTER COLUMN kelurahan_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelurahan');
    }
}
