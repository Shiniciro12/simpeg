<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Persyaratan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('persyaratan', function (Blueprint $table) {
            $table->uuid('persyaratan_id')->primary();
            $table->uuid('layanan_id')->nullable();
            $table->uuid('dokumen_id')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE persyaratan ALTER COLUMN persyaratan_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persyaratan');
    }
}
