<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Gejala;
use Validator;
use DataTables;
use Alert;
use Illuminate\Validation\Rule;

class GejalaController extends Controller
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
        if(request()->ajax())
        {
            return datatables()->of(Gejala::all())
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
        return view('admin.pages.data-gejala');
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
        $kode_gejala = DB::table('gejala')->count('kode_gejala')+1;

        $gejala = DB::table('gejala')->where([['gejala', $request->gejala], ['deleted_at', '!=', null]])->count('gejala');
        $rules = array(
            'gejala' =>  'required|unique:gejala,gejala',
            'jenis' => 'required',
        );

        $error = Validator::make($request->all(), $rules);
        
        if ($gejala >= 1) {
            DB::table('gejala')->where('gejala', $request->gejala)->update(['deleted_at' => null, 'jenis' => $request->jenis]);
            return response()->json(['success' => 'Data Added successfully.']);
        } elseif($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()[0]]);
        } else {
            $form_data = array(
                'kode_gejala' => 'G'.$kode_gejala,
                'gejala' => $request->gejala,
                'jenis' => $request->jenis,
            );
            Gejala::create($form_data);
            return response()->json(['success' => 'Data Added successfully.']);
        }
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
            $data = Gejala::findOrFail($id);
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
            'gejala'     =>  ['required',Rule::unique('gejala')->ignore($request->hidden_id)],
            'jenis'=> 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()[0]]);
        } else {
            $form_data = array(
                'gejala'     =>   $request->gejala,
                'jenis' => $request->jenis,
            );
            Gejala::whereId($request->hidden_id)->update($form_data);

            return response()->json(['success' => 'Data is successfully updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Gejala::findOrFail($id);
        $data->delete();
            
        return response()->json(['success' => 'Data is successfully deleted']);
    }
}
