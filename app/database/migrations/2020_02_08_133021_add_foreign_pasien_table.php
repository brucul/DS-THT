<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignPasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pasien', function (Blueprint $table) {
            $table->foreign('id_user')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            //$table->foreign('gejala')->references('kode_gejala')->on('gejala')->onDelete('cascade');
            //$table->foreign('diagnosis')->references('kode_penyakit')->on('penyakit')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
