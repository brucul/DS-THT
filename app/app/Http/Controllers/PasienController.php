<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pasien;
use Validator;
use DataTables;
use Carbon\Carbon;
use PDF;

class PasienController extends Controller
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
            return datatables()
                ->of(DB::table('pasien')
                    ->select('pasien.id as id_pasien', 'pasien.diagnosis', 'penyakit.penyakit', 'users.*')
                    ->where('pasien.deleted_at', null)
                    ->join('penyakit', 'pasien.diagnosis', '=', 'penyakit.kode_penyakit')
                    ->join('users', 'pasien.id_user', '=', 'users.id')
                    ->get())
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    //$button = '<button type="button" name="edit" id="'.$data->id_pasien.'" class="edit btn btn-outline-warning btn-sm">Edit</button>';
                    //$button .= '&nbsp;&nbsp;';
                    $button = '<button type="button" name="delete" id="'.$data->id_pasien.'" class="delete btn btn-outline-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.data-pasien');
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
        if(request()->ajax())
        {
            $data = DB::table('pasien')
                        ->join('users', 'users.id', '=', 'pasien.id_user')
                        ->where('id_pasien', $id)
                        ->first();
            $tgl = Carbon::parse($data->tgl_lahir)->format('Y-m-d');
            $sql="SELECT gejala FROM pasien WHERE id_pasien=".$id;
            $list = DB::select($sql);

            $kode=explode(',', $list[0]->gejala);

            $sql="SELECT gejala FROM gejala WHERE kode_gejala IN ('".implode("','",$kode)."')";
            $gejala = DB::select($sql);

            return response()->json(['data' => $data, 'tgl' => $tgl, 'gejala' => $gejala]);
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
            'nama'=>  'required',
            'tanggal'=> 'required|before:today',
            'jenis_kelamin'=> 'required',
            'no_hp'=> 'required|numeric',
            'alamat'=> 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()[0]]);
        }

        $form_data = array(
            'nama' =>   $request->nama,
            'tgl_lahir' => $request->tanggal,
            'jk' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        );
        Pasien::whereId($request->hidden_id)->update($form_data);

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
        //DB::table('pasien')->where('id_pasien', $id)->delete();
        Pasien::findOrFail($id)->delete();
        return response()->json(['success' => 'Data is successfully deleted']);
    }

    public function riwayatPDF()
    {
        // $id_user = Crypt::decrypt($id);
        $data = DB::table('pasien')
                    ->join('users', 'pasien.id_user', '=', 'users.id')
                    ->join('penyakit', 'pasien.diagnosis', '=', 'penyakit.kode_penyakit')
                    ->select('pasien.*', 'users.*', 'penyakit.penyakit')
                    ->orderBy('name')
                    // ->where('id_user', $id_user)
                    ->get();
        $pdf = PDF::loadview('admin.pages.riwayat-diagnosa-pdf', ['pasien'=>$data]);
  
        //return view('user.pages.riwayat-diagnosa-pdf', ['pasien'=>$data]);
        return $pdf->download('riwayat.pdf');
    }
}
