<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rule;
use App\Penyakit;
use App\Gejala;
use Validator;
use DataTables;

class RulesController extends Controller
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

        $g_hidung = DB::table('gejala')->where([['jenis', 'Hidung'],['deleted_at', null]])->get();
        $g_telinga = DB::table('gejala')->where([['jenis', 'Telinga'],['deleted_at', null]])->get();
        $g_tenggorokan = DB::table('gejala')->where([['jenis', 'Tenggorokan'],['deleted_at', null]])->get();
        $g_umum = DB::table('gejala')->where([['jenis', 'Umum'],['deleted_at', null]])->get();
        
        
        if(request()->ajax())
        {
            return datatables()->of(
                    DB::table('rules')
                        ->join('penyakit', 'rules.id_penyakit', '=', 'penyakit.kode_penyakit')
                        ->join('gejala', 'rules.id_gejala', '=', 'gejala.kode_gejala')
                        ->select('rules.*', 'penyakit.*', 'gejala.*')
                        ->get()
                    )
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-outline-warning btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-outline-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.pages.rule', [
            'p_telinga' => $p_telinga,
            'p_hidung' => $p_hidung,
            'p_tenggorokan' => $p_tenggorokan,
            'g_telinga' => $g_telinga,
            'g_hidung' => $g_hidung,
            'g_tenggorokan' => $g_tenggorokan,
            'g_umum' => $g_umum
        ]);
    }

    public function ShowPenyakit()
    {
        $penyakit = Penyakit::all();
        return view('admin.pages.rule', ['penyakit' => $penyakit]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'penyakit' => 'required',
            'gejala' => 'required',
            'bobot' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $form_data = array(
            'id_penyakit' => $request->penyakit,
            'id_gejala' => $request->gejala,
            'bobot' => $request->bobot,
        );

        Rule::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
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
        if(request()->ajax())
        {
            $data = Rule::findOrFail($id);
            return response()->json(['data' => $data]);
        }
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
        $rules = array(
            'penyakit' => 'required',
            'gejala' => 'required',
            'bobot' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'id_penyakit' => $request->penyakit,
            'id_gejala' => $request->gejala,
            'bobot' => $request->bobot,
        );
        Rule::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Rule::findOrFail($id);
        $data->delete();
            
        return response()->json(['success' => 'Data is successfully deleted']);
    }
}
