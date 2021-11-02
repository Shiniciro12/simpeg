<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class RiwayatPangkat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('riwayat_pangkat', function (Blueprint $table) {
            $table->uuid('riwayat_pangkat_id')->primary();
            $table->uuid('pangkat_id');
            $table->uuid('identitas_id');
            $table->string('pejabat');
            $table->string('no_sk')->unique();
            $table->date('tgl_sk');
            $table->date('tmt_pangkat');
            $table->string('sk_pangkat');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE riwayat_pangkat ALTER COLUMN riwayat_pangkat_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_pangkat');
    }
}
