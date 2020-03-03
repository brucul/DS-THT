<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gejala')->insert(
        	[ 'kode_gejala'=>'G1', 'gejala'=>'Amandel membengkak', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G2', 'gejala'=>'Batuk', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G3', 'gejala'=>'Bau mulut (halitosis)', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G4', 'gejala'=>'Benjolan kecil atau bisul di dekat saluran telinga', 'jenis'=>'Telinga' ],
        	[ 'kode_gejala'=>'G5', 'gejala'=>'Bersin', 'jenis'=>'Hidung' ],
        	[ 'kode_gejala'=>'G6', 'gejala'=>'Daun telinga bengkak dan merah', 'jenis'=>'Telinga' ],
        	[ 'kode_gejala'=>'G7', 'gejala'=>'Demam', 'jenis'=>'Umum' ],
        	[ 'kode_gejala'=>'G8', 'gejala'=>'Dering di telinga (tinnitus)', 'jenis'=>'Telinga' ],
        	[ 'kode_gejala'=>'G9', 'gejala'=>'Diare', 'jenis'=>'Umum' ],
        	[ 'kode_gejala'=>'G10', 'gejala'=>'Gangguan Tidur', 'jenis'=>'Umum' ],
        	[ 'kode_gejala'=>'G11', 'gejala'=>'Gatal dan merah di liang telinga', 'jenis'=>'Telinga' ],
        	[ 'kode_gejala'=>'G12', 'gejala'=>'Gatal pada hidung, mata, tenggorokan, kulit, atau area apa pun', 'jenis'=>'Umum' ],
        	[ 'kode_gejala'=>'G13', 'gejala'=>'Gejala sejenis eksim, misalnya kulit sangat kering dan gatal serta sering melepuh', 'jenis'=>'Umum' ],
        	[ 'kode_gejala'=>'G14', 'gejala'=>'Hidung berair dan produksi lendir berlebihan', 'jenis'=>'Hidung' ],
        	[ 'kode_gejala'=>'G15', 'gejala'=>'Hidung tersumbat', 'jenis'=>'Hidung' ],
        	[ 'kode_gejala'=>'G16', 'gejala'=>'Ingus berwarna kuning kehijauan', 'jenis'=>'Hidung' ],
        	[ 'kode_gejala'=>'G17', 'gejala'=>'Indera perasa berkurang ketajamannya', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G18', 'gejala'=>'Kehilangan keseimbangan', 'jenis'=>'Umum' ],
        	[ 'kode_gejala'=>'G19', 'gejala'=>'Keluar cairan bening yang tidak berbau dari telinga', 'jenis'=>'Telinga' ],
        	[ 'kode_gejala'=>'G20', 'gejala'=>'Keluar Cairan kuning, bening, nanah, atau darah dari telinga', 'jenis'=>'Telinga' ],
        	[ 'kode_gejala'=>'G21', 'gejala'=>'Kepala pusing / sakit kepala', 'jenis'=>'Umum' ],
        	[ 'kode_gejala'=>'G22', 'gejala'=>'Kesulitan membuka mulut', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G23', 'gejala'=>'Leher Kaku', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G24', 'gejala'=>'Lingkaran hitam di bawah mata', 'jenis'=>'Umum' ],
        	[ 'kode_gejala'=>'G25', 'gejala'=>'Mata Berair', 'jenis'=>'Umum' ],
        	[ 'kode_gejala'=>'G26', 'gejala'=>'Mendengkur', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G27', 'gejala'=>'Menurunnya fungsi indera penciuman', 'jenis'=>'Hidung' ],
        	[ 'kode_gejala'=>'G28', 'gejala'=>'Menurunnya nafsu makan', 'jenis'=>'Umum' ],
        	[ 'kode_gejala'=>'G29', 'gejala'=>'Mimisan', 'jenis'=>'Hidung' ],
        	[ 'kode_gejala'=>'G30', 'gejala'=>'Mual dan muntah', 'jenis'=>'Umum' ],
        	[ 'kode_gejala'=>'G31', 'gejala'=>'Mudah marah', 'jenis'=>'Umum' ],
        	[ 'kode_gejala'=>'G32', 'gejala'=>'Nyeri Otot', 'jenis'=>'Umum' ],
        	[ 'kode_gejala'=>'G33', 'gejala'=>'Nyeri pada bagian wajah/rahang dan terasa sakit ketika ditekan', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G34', 'gejala'=>'Nyeri pada telinga', 'jenis'=>'Telinga' ],
        	[ 'kode_gejala'=>'G35', 'gejala'=>'Pembengkakan di sekitar mata dan semakin parah pada pagi hari', 'jenis'=>'Umum' ],
        	[ 'kode_gejala'=>'G36', 'gejala'=>'Pembengkakan kelenjar getah bening di leher', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G37', 'gejala'=>'Penglihatan kabur atau berbayang', 'jenis'=>'Umum' ],
        	[ 'kode_gejala'=>'G38', 'gejala'=>'Penurunan kemampuan mendengar', 'jenis'=>'Telinga' ],
        	[ 'kode_gejala'=>'G39', 'gejala'=>'Sakit / radang tenggorokan', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G40', 'gejala'=>'Sakit Gigi', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G41', 'gejala'=>'Sakit kepala terus-menerus', 'jenis'=>'Umum' ],
        	[ 'kode_gejala'=>'G42', 'gejala'=>'Suara menjadi serak atau hilang', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G43', 'gejala'=>'Sulit bernafas', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G44', 'gejala'=>'Susah menelan', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G45', 'gejala'=>'Tenggorokan bengkak', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G46', 'gejala'=>'Tenggorokan gatal', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G47', 'gejala'=>'Terdapat benjolan pada tenggorokan', 'jenis'=>'Tenggorokan' ],
        	[ 'kode_gejala'=>'G48', 'gejala'=>'Wajah terasa nyeri atau mati rasa', 'jenis'=>'Umum' ],
        );
    }
}
