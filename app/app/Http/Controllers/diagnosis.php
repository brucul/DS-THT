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
                ->select('ds_rules.id as id_ds', 'ds_rules.bobot', 'penyakit.*', 'gejala.*')
                ->where('ds_rules.deleted_at', null)
                ->get()
            )
            ->addIndexColumn()
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" id="'.$data->id_ds.'" class="edit btn btn-outline-warning btn-sm">Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id_ds.'" class="delete btn btn-outline-danger btn-sm">Delete</button>';
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

    public function fc(Request $request)
    {
        $qry='select penyakit as id from fc_rules where ';
        // array_pop($_POST);
        $input=array();
        foreach ($request->evidence as $where) {
            $qry.=$where."=1 and ";
            array_push($input,$where);
        }
        $qry.="1=1";
        $data=DB::select($qry, []);
        $id='';

        $arr = DB::table('fc_rules')
                ->select('penyakit as id','G1','G2','G3','G4','G5','G6','G7','G8','G9','G10','G11','G12','G13','G14','G15','G16','G17','G18','G19','G20','G21','G22','G23','G24','G25','G26','G27','G28','G29','G30','G31','G32','G33','G34','G35','G36','G37','G38','G39','G40','G41','G42','G43','G44','G45','G46','G47','G48')
                ->get();
        $arr_rule = json_decode(json_encode($arr), true);

        //mencari value dari  yg memiliki nilai 1 dan akan di simpan dalam array rule
        $rule=array();
        for ($i=0; $i <sizeof($arr_rule) ; $i++) { 
            $key=array_keys($arr_rule[$i]);
            $val=$arr_rule[$i];
            $sub_rule=array();
            for($j=0;$j<(sizeof($key));$j++){
                if($val[$key[$j]]==1)
                    $sub_rule[]=$key[$j];
            }
            $rule[]=$sub_rule;
        }
        $status=false;
        // 
        // print_r($input);
        // echo "<br/>";
        foreach ($input as $value) {
            $hilang[]=substr($value, 1);
        }
        sort($hilang);
        foreach ($hilang as $value) {
            $rule_input[]="G".$value;
        }
        // print_r($rule_input);
        // echo "<br/>";
        // foreach ($rule as $key => $value) {
        //     print_r($value);
        //     echo "<br/>";
        // }
        
        // foreach ($rule as $key => $value) {
        //     print_r($value);
        // }

        // mencocokan gejala yang di inputkan user dengan rule yang ada
        // for ($i=0; $i <9 ; $i++) {
        //     $result=($rule_input==$rule[$i]);
        //     if ($result) {
        //         $status=true;
        //     }
        // }
        // print_r($rule_input);
        // echo "<br/>";
        $count=0;
        // foreach ($rule as $value) {
        //     print_r($value);
        //     echo "<br/>";
        //     $count=0;
        //     foreach ($rule_input as $val) {
        //         if (in_array($val, $value)) {
        //             $count++;
        //             echo $count;
        //             if ($count<sizeof($value)) {
        //                 $status='false';
        //             }else{
        //                 $status='true';
        //             }
        //         }
        //     }
        // }

        // echo $status;
        $p=0;

        for ($i=0; $i <sizeof($rule); $i++) {
            // print_r($rule[$i]);
            // echo "<br/>";
            $count=0;
            foreach ($rule_input as $val) {
                if (in_array($val, $rule[$i])) {
                    $count++;
                    if ($count>=sizeof($rule[$i])) {
                        // print_r(array_keys($rule[$i]));
                        $status=true;
                        break;
                    }
                    // if ($count<sizeof($rule[$i])) {
                    //     $status=false;
                    // }
                }
            }
        }
        
        // echo $status."<br/>";
        // print_r($data);
        // if (in_array($rule_input, $rule)) {
        //     $status=true;
        // }
        // for ($i=0; $i <sizeof($rule); $i++) {
        //     $result=($rule_input==$rule[$i]);
        //     if ($result) {
        //         $status=true;
        //     }
        // }

        //jika di temukan akan menampilkan info dan solusi dari penyakit yang di derita
        if($status==true){
            foreach ($data as $key => $value) {
                $id = $value->id;
            }
            $diagnosis=DB::table('penyakit')->where('kode_penyakit', $id)->get();
            foreach ($diagnosis as $key => $value) {
                $hasil_fc=$value->penyakit;
            }

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
            $sql="SELECT GROUP_CONCAT(penyakit) AS name, GROUP_CONCAT(kode_penyakit) AS kode_penyakit FROM penyakit WHERE penyakit IN('".implode("','",$final_codes)."')"; 
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
                'diagnosis' => $row[0][0],
                'prosentase' => round($densitas_baru[$codes[0]]*100,2),
                'gejala' => implode(',',$request->evidence),
            );
            Pasien::create($form_data);
            return view('user.pages.hasil-diagnosis',[
                'list'=>$list_densitas, 
                'ranking'=>$perangkingan, 
                'kode_penyakit'=>$row[0]['kode_penyakit'],
                // 'hasil_fc'=>$hasil_fc,
                'penyakit'=>$row[0][0], 
                'rate'=>round($densitas_baru[$codes[0]]*100,2), 
                'ev'=>$gejala,
                'hasil'=>''
            ]);
        }else{
            $sql="SELECT gejala FROM gejala WHERE kode_gejala IN('".implode("','",$request->evidence)."')";
            $gejala = DB::select($sql);
            return view('user.pages.hasil-diagnosis',['ev'=>$gejala,'hasil'=>'no']);
        }
    }

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
        $cek = DB::table('ds_rules')
                    ->where([
                        ['id_penyakit', $request->penyakit], 
                        ['id_gejala', $request->gejala],
                        ['deleted_at', null]])
                    ->count('id');

        if ($cek >= 1) {
            return response()->json(['errors' => 'Data already exists.']);
        } else {
            $rules = array(
                'penyakit' => 'required',
                'gejala' => 'required',
                'bobot' => 'required|numeric',
            );

            $error = Validator::make($request->all(), $rules);
            if($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()[0]]);
            } else {
                $form_data = array(
                    'id_penyakit' => $request->penyakit,
                    'id_gejala' => $request->gejala,
                    'bobot' => $request->bobot,
                );

                Rule::create($form_data);
                return response()->json(['success' => 'Data added successfully.']);
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
        $cek = DB::table('ds_rules')
                    ->where([
                        ['id_penyakit', $request->penyakit], 
                        ['id_gejala', $request->gejala],
                        ['deleted_at', null]])
                    ->count('id');

        if ($cek >= 1) {
            return response()->json(['errors' => 'Data already exists.']);
        } else {
            $rules = array(
                'penyakit' => 'required',
                'gejala' => 'required',
                'bobot' => 'required|numeric',
            );

            $error = Validator::make($request->all(), $rules);
            if($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()[0]]);
            } else {
                $form_data = array(
                    'id_penyakit' => $request->penyakit,
                    'id_gejala' => $request->gejala,
                    'bobot' => $request->bobot,
                );

                Rule::create($form_data);
                return response()->json(['success' => 'Data added successfully.']);
            }
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
        $data = Rule::findOrFail($id);
        $data->delete();

        return response()->json(['success' => 'Data is successfully deleted']);
    }
}
