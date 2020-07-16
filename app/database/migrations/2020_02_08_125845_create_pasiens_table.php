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
            //$table->string('nama')->nullable();
            //$table->date('tgl_lahir')->nullable();
            //$table->set('jk', ['Laki-laki', 'Perempuan'])->nullable();
            //$table->char('no_hp')->unique()->nullable();
            //$table->longText('alamat')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('prosentase')->nullable();
            $table->string('gejala')->nullable();
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
        Schema::dropIfExists('pasien');
    }
}
