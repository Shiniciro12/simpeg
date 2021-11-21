<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Dokumen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('dokumen', function (Blueprint $table) {
            $table->uuid('dokumen_id')->primary();
            $table->uuid('identitas_id')->nullable();
            $table->uuid('data_khusus_id')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE dokumen ALTER COLUMN dokumen_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen');
    }
}
