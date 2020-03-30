<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTriggerInfoPenyakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER add_info_penyakit AFTER INSERT ON `penyakit` FOR EACH ROW
            BEGIN
                INSERT INTO `info_penyakit` (`kode`) VALUES (NEW.kode_penyakit);
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
        DB::unprepared('DROP TRIGGER `add_info_penyakit`');
    }
}
