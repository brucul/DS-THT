<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('id_user');
            $table->string('nama');
            $table->set('jk', ['Laki-laki', 'Perempuan']);
            $table->char('no_hp');
            $table->longText('alamat');
            $table->string('diagnosis');
            $table->string('prosentase');
            $table->string('gejala');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
}
