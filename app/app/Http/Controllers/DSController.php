<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rule;
use App\Penyakit;
use App\Gejala;
use App\Pasien;
use Validator;
use DataTables;

class DSController extends Controller
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
                DB::table('ds_rules')
                ->join('penyakit', 'ds_rules.id_penyakit', '=', 'penyakit.kode_penyakit')
                ->join('gejala', 'ds_rules.id_gejala', '=', 'gejala.kode_gejala')
                ->select('ds_rules.*', 'penyakit.*', 'gejala.*')
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
        return view('admin.pages.ds-rule', [
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
        return view('admin.pages.ds-rule', ['penyakit' => $penyakit]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function diagnosis(Request $request)
    {
        $rules = array(
            'nama' => 'required',
            'tanggal' => 'required|before:today',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
            'evidence' => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()){
            return back()->with('toast_error', $error->errors()->all()[0]);
        } else {
            $sql = "SELECT GROUP_CONCAT(b.penyakit) AS code, a.bobot
            FROM ds_rules a
            JOIN penyakit b ON a.id_penyakit=b.kode_penyakit
            WHERE a.id_gejala IN('".implode("','",$request->evidence)."')
            GROUP BY a.id_gejala";
            $list = DB::select($sql, []);
            //mengubah ke array multidimensional
            $evidence = json_decode(json_encode($list), true);
            //mengubah array key
            foreach ( $evidence as $k=>$v ) {
                $evidence[$k] [0] = $evidence[$k] ['code'];
                $evidence[$k] [1] = $evidence[$k] ['bobot'];
                unset($evidence[$k]['code']);
                unset($evidence[$k]['bobot']);
            }
            //--- menentukan environement
            $sql="SELECT GROUP_CONCAT(penyakit) AS code FROM penyakit";
            $list = DB::select($sql);
            //mengubah ke array multidimensional
            $listArr = json_decode(json_encode($list), true);
            //mengubah array key
            foreach ( $listArr as $k=>$v ) {
                $listArr[$k] [0] = $listArr[$k] ['code'];
                unset($listArr[$k]['code']);
            }
            $fod=$listArr[0][0];

            //--- menentukan nilai densitas
            //echo "== MENENTUKAN NILAI DENSITAS ==<br/>";
            $densitas_baru=array();
            while(!empty($evidence)){
                $densitas1[0]=array_shift($evidence);
                $densitas1[1]=array($fod,1-$densitas1[0][1]);
                $densitas2=array();
                if(empty($densitas_baru)){
                    $densitas2[0]=array_shift($evidence);
                }else{
                    foreach($densitas_baru as $k=>$r){
                        if($k!="&theta;"){
                            $densitas2[]=array($k,$r);
                        }
                    }
                }
                $theta=1;
                foreach($densitas2 as $d) $theta-=$d[1];
                $densitas2[]=array($fod,$theta);
                $m=count($densitas2);
                $densitas_baru=array();
                for($y=0;$y<$m;$y++){
                    for($x=0;$x<2;$x++){
                        if(!($y==$m-1 && $x==1)){
                            $v=explode(',',$densitas1[$x][0]);
                            $w=explode(',',$densitas2[$y][0]);
                            sort($v);
                            sort($w);
                            $vw=array_intersect($v,$w);
                            if(empty($vw)){
                                $k="&theta;";
                            }else{
                                $k=implode(',',$vw);
                            }
                            if(!isset($densitas_baru[$k])){
                                $densitas_baru[$k]=$densitas1[$x][1]*$densitas2[$y][1];
                            }else{
                                $densitas_baru[$k]+=$densitas1[$x][1]*$densitas2[$y][1];
                            }
                        }
                    }
                }
                foreach($densitas_baru as $k=>$d){
                    if($k!="&theta;"){
                        $densitas_baru[$k]=$d/(1-(isset($densitas_baru["&theta;"])?$densitas_baru["&theta;"]:0));
                    }
                }
                $list_densitas=$densitas_baru;
            }

            //--- perangkingan
            //echo "<br/>== PERANGKINGAN ==<br/>";
            unset($densitas_baru["&theta;"]);
            arsort($densitas_baru);
            $perangkingan=$densitas_baru;
            //--- menampilkan hasil akhir
            //echo "<br/>== HASIL AKHIR ==<br/>";
            $codes=array_keys($densitas_baru); 
            $final_codes=explode(',',$codes[0]);
            $sql="SELECT GROUP_CONCAT(penyakit) AS name, kode_penyakit FROM penyakit WHERE penyakit IN('".implode("','",$final_codes)."')"; 
            $list = DB::select($sql);
            $row = json_decode(json_encode($list), true);
                    //mengubah array key
            foreach ( $row as $k=>$v ) {
                $row[$k] [0] = $row[$k] ['name'];
                unset($row[$k]['name']);
            }
                    //echo "Terdeteksi penyakit <b>{$row[0][0]}</b> dengan derajat kepercayaan ".round($densitas_baru[$codes[0]]*100,2)."%";
            $sql="SELECT gejala FROM gejala WHERE kode_gejala IN('".implode("','",$request->evidence)."')";
            $gejala = DB::select($sql);
            $form_data = array(
                'id_user' => auth()->user()->id,
                'nama' => $request->nama,
                'tgl_lahir' => $request->tanggal,
                'jk' => $request->jenis_kelamin,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'diagnosis' => $row[0]['kode_penyakit'],
                'prosentase' => round($densitas_baru[$codes[0]]*100,2),
                'gejala' => implode(',',$request->evidence),
            );
            Pasien::create($form_data);
            return view('user.pages.hasil-diagnosis',[
                'list'=>$list_densitas, 
                'ranking'=>$perangkingan, 
                'kode_penyakit'=>$row[0]['kode_penyakit'],
                'penyakit'=>$row[0][0], 
                'rate'=>round($densitas_baru[$codes[0]]*100,2), 
                'ev'=>$gejala
            ]);
        }
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
            'bobot' => 'required|numeric',
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
        if(request()->ajax())
        {
            $gejala = DB::table('gejala')->whereId($id);
            //$sql="SELECT gejala FROM gejala WHERE kode_gejala IN('".implode("','",$request->evidence)."')";
            //$gejala = DB::select($sql);
            $data = Rule::findOrFail($id);
            return response()->json(['data' => $data]);
        }
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
            'bobot' => 'required|numeric',
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
