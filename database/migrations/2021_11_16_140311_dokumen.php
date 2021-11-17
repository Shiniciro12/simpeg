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
            $table->longText('dokumen')->nullable();
            $table->uuid('identitas_id')->nullable();
            $table->string('status')->nullable();
            $table->string('unit_verif_at')->nullable();
            $table->string('bkppd_verif_at')->nullable();
            $table->uuid('unit_verif_by')->nullable();
            $table->uuid('bkppd_verif_by')->nullable();
            $table->uuid('jenis_layanan_id')->nullable();
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
