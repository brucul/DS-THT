<?php

use Illuminate\Database\Seeder;

class PenyakitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penyakit')->insert(
        	['kode_penyakit'=>'P1', 'penyakit'=>'Otitis Eksterna', 'jenis'=>'Telinga'],
        	['kode_penyakit'=>'P2', 'penyakit'=>'Otitis Media', 'jenis'=>'Telinga'],
        	['kode_penyakit'=>'P3', 'penyakit'=>'Rhinitis', 'jenis'=>'Hidung'],
        	['kode_penyakit'=>'P4', 'penyakit'=>'Sinusitis', 'jenis'=>'Hidung'],
        	['kode_penyakit'=>'P5', 'penyakit'=>'Polip Hidung', 'jenis'=>'Hidung'],
        	['kode_penyakit'=>'P6', 'penyakit'=>'Kanker Nasofaring', 'jenis'=>'Hidung'],
        	['kode_penyakit'=>'P7', 'penyakit'=>'Faringitis (Radang Tenggorokan)', 'jenis'=>'Tenggorokan'],
        	['kode_penyakit'=>'P8', 'penyakit'=>'Tonsilitis (Radang Amandel)', 'jenis'=>'Tenggorokan'],
        	['kode_penyakit'=>'P9', 'penyakit'=>'Laringitis (Radang Pita Suara)', 'jenis'=>'Tenggorokan'],
        );
    }
}
