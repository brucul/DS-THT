<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTriggerForwardChaining extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER add_penyakit_forward_chaining AFTER INSERT ON `info_penyakit` FOR EACH ROW
            BEGIN
                INSERT INTO `fc_rules` (`penyakit`) VALUES (NEW.kode);
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `add_penyakit_forward_chaining`');
    }
}
