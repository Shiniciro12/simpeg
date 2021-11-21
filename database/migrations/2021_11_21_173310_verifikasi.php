<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Verifikasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('verifikasi', function (Blueprint $table) {
            $table->uuid('verifikasi_id')->primary();
            $table->uuid('docx_id')->nullable();
            $table->uuid('identitas_id')->nullable();
            $table->string('status')->nullable();
            $table->string('unit_verif_at')->nullable();
            $table->string('bkppd_verif_at')->nullable();
            $table->string('unit_verif_by')->nullable();
            $table->string('bkppd_verif_by')->nullable();
            $table->string('jenis_data')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE verifikasi ALTER COLUMN verifikasi_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verifikasi');
    }
}
