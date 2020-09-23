<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFCRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fc_rules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('penyakit');
            $table->softDeletes();
            $table->timestamps();
            $table->boolean('G1')->default(0);
            $table->boolean('G2')->default(0);
            $table->boolean('G3')->default(0);
            $table->boolean('G4')->default(0);
            $table->boolean('G5')->default(0);
            $table->boolean('G6')->default(0);
            $table->boolean('G7')->default(0);
            $table->boolean('G8')->default(0);
            $table->boolean('G9')->default(0);
            $table->boolean('G10')->default(0);
            $table->boolean('G11')->default(0);
            $table->boolean('G12')->default(0);
            $table->boolean('G13')->default(0);
            $table->boolean('G14')->default(0);
            $table->boolean('G15')->default(0);
            $table->boolean('G16')->default(0);
            $table->boolean('G17')->default(0);
            $table->boolean('G18')->default(0);
            $table->boolean('G19')->default(0);
            $table->boolean('G20')->default(0);
            $table->boolean('G21')->default(0);
            $table->boolean('G22')->default(0);
            $table->boolean('G23')->default(0);
            $table->boolean('G24')->default(0);
            $table->boolean('G25')->default(0);
            $table->boolean('G26')->default(0);
            $table->boolean('G27')->default(0);
            $table->boolean('G28')->default(0);
            $table->boolean('G29')->default(0);
            $table->boolean('G30')->default(0);
            $table->boolean('G31')->default(0);
            $table->boolean('G32')->default(0);
            $table->boolean('G33')->default(0);
            $table->boolean('G34')->default(0);
            $table->boolean('G35')->default(0);
            $table->boolean('G36')->default(0);
            $table->boolean('G37')->default(0);
            $table->boolean('G38')->default(0);
            $table->boolean('G39')->default(0);
            $table->boolean('G40')->default(0);
            $table->boolean('G41')->default(0);
            $table->boolean('G42')->default(0);
            $table->boolean('G43')->default(0);
            $table->boolean('G44')->default(0);
            $table->boolean('G45')->default(0);
            $table->boolean('G46')->default(0);
            $table->boolean('G47')->default(0);
            $table->boolean('G48')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fc_rules');
    }
}
