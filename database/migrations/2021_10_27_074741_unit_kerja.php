<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UnitKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('unit_kerja', function (Blueprint $table) {
            $table->uuid('unit_kerja_id')->primary();
            $table->string('nama_unit')->unique();
            $table->string('alamat');
            $table->float('latitude')->unique();
            $table->float('longitude')->unique();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE unit_kerja ALTER COLUMN unit_kerja_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit_kerja');
    }
}
