<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Pasien;
use App\Gejala;
use App\Penyakit;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.pages.home');
    }
    
    public function adminHome()
    {
        $telinga = DB::table('penyakit')
                    ->join('pasien', 'pasien.diagnosis', '=', 'penyakit.kode_penyakit')
                    ->select('penyakit.penyakit', DB::raw('count(pasien.diagnosis) as jumlah'))
                    ->where('penyakit.jenis', 'Telinga')
                    ->groupBy('penyakit.penyakit')
                    ->get();

        $hidung = DB::table('penyakit')
                    ->join('pasien', 'pasien.diagnosis', '=', 'penyakit.kode_penyakit')
                    ->select('penyakit.penyakit', DB::raw('count(pasien.diagnosis) as jumlah'))
                    ->where('penyakit.jenis', 'Hidung')
                    ->groupBy('penyakit.penyakit')
                    ->get();

        $tenggorokan = DB::table('penyakit')
                    ->join('pasien', 'pasien.diagnosis', '=', 'penyakit.kode_penyakit')
                    ->select('penyakit.penyakit', DB::raw('count(pasien.diagnosis) as jumlah'))
                    ->where('penyakit.jenis', 'Tenggorokan')
                    ->groupBy('penyakit.penyakit')
                    ->get();
        return view('admin.pages.home', ['telinga' => $telinga, 'hidung' => $hidung, 'tenggorokan' => $tenggorokan]);
    }
    
}
