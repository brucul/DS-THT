<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rule;
use App\Penyakit;
use App\Gejala;
use App\ForwardChaining;
use Validator;
use DataTables;

class FCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $p_hidung = DB::table('penyakit')->where([['jenis', 'Hidung'],['deleted_at', null]])->get();
        $p_telinga = DB::table('penyakit')->where([['jenis', 'Telinga'],['deleted_at', null]])->get();
        $p_tenggorokan = DB::table('penyakit')->where([['jenis', 'Tenggorokan'],['deleted_at', null]])->get();

        if(request()->ajax())
        {
            return datatables()->of(
                    DB::table('fc_rules')
                        ->join('penyakit', 'fc_rules.penyakit', '=', 'penyakit.kode_penyakit')
                        ->select('fc_rules.*', 'penyakit.*')
                        ->get()
                    )
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $button = '<a class="edit btn btn-outline-warning btn-sm" href="'.url('admin/fc-rules/'.$data->id.'/tambah-rule').'">Edit</a>';
                        $button .= '&nbsp;&nbsp;';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.pages.fc-rule', [
            'p_telinga' => $p_telinga,
            'p_hidung' => $p_hidung,
            'p_tenggorokan' => $p_tenggorokan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $p_hidung = DB::table('penyakit')->where([['jenis', 'Hidung'],['deleted_at', null]])->get();
        $p_telinga = DB::table('penyakit')->where([['jenis', 'Telinga'],['deleted_at', null]])->get();
        $p_tenggorokan = DB::table('penyakit')->where([['jenis', 'Tenggorokan'],['deleted_at', null]])->get();
        $gejala = DB::table('gejala')->get();
        return view('admin.pages.form-fc-rule', [
            'p_telinga' => $p_telinga,
            'p_hidung' => $p_hidung,
            'p_tenggorokan' => $p_tenggorokan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fc = DB::table('fc_rules')
                ->where('fc_rules.id', $id)
                ->join('penyakit', 'fc_rules.penyakit', '=', 'penyakit.kode_penyakit')
                ->select('fc_rules.*', 'penyakit.*')
                ->first();
        $gejala=Gejala::all();
        return view('admin.pages.form-fc-rule', [
            'fc'=>$fc,
            'gejala' => $gejala,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('fc_rules')->where('penyakit' ,$request->penyakit)->update([$request->kode => $request->value]);
        return back()->with('toast_success', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
