<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Penyakit;
use Validator;
use DataTables;
use Illuminate\Validation\Rule;

class PenyakitController extends Controller
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
            return datatables()->of(Penyakit::all())
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
        return view('admin.pages.data-penyakit');
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
        $kode_penyakit = DB::table('penyakit')->count('kode_penyakit')+1;

        $penyakit = DB::table('penyakit')->where([['penyakit', $request->penyakit], ['deleted_at', '!=', null]])->count('penyakit');
        
        if ($penyakit >= 1) {
            DB::table('penyakit')->where('penyakit', $request->penyakit)->update(['deleted_at' => null, 'jenis' => $request->jenis]);
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            $rules = array(
            'penyakit' => 'required|unique:penyakit,penyakit',
            'jenis'=> 'required',
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails()){
                return response()->json(['errors' => $error->errors()->all()[0]]);
            }else{
                $form_data = array(
                    'kode_penyakit' => 'P'.$kode_penyakit,
                    'penyakit' => $request->penyakit,
                    'jenis' => $request->jenis,
                );

                Penyakit::create($form_data);
                return response()->json(['success' => 'Data Added successfully.']);
            }
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
            $data = Penyakit::findOrFail($id);
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
            'penyakit' => ['required',Rule::unique('penyakit')->ignore($request->hidden_id)],
            'jenis'=> 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()[0]]);
        }

        $form_data = array(
            'penyakit' => $request->penyakit,
            'jenis' => $request->jenis,
        );
        Penyakit::whereId($request->hidden_id)->update($form_data);

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
        $data = Penyakit::findOrFail($id);
        $data->delete();
            
        return response()->json(['success' => 'Data is successfully deleted']);
    }
}
