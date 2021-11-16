<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Layanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('layanan', function (Blueprint $table) {
            $table->uuid('layanan_id')->primary();
            $table->uuid('dokumen_id')->nullable();
            $table->string('sk')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE layanan ALTER COLUMN layanan_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layanan');
    }
}
