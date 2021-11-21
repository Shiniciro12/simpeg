<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class DataKhusus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('data_khusus', function (Blueprint $table) {
            $table->uuid('data_khusus_id')->primary();
            $table->string('nama_data_khusus')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE data_khusus ALTER COLUMN data_khusus_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_khusus');
    }
}
