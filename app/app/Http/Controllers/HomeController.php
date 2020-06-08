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
    
    public function trial($id){
        $sql="SELECT gejala FROM pasien WHERE id=".$id;
        $list = DB::select($sql);

        $kode=explode(',', $list[0]->gejala);

        $sql="SELECT gejala FROM gejala WHERE kode_gejala IN ('".implode("','",$kode)."')";
        $list = DB::select($sql);

        foreach ($list as $key => $value) {
            echo $value->gejala;
            echo "<br/>";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(isset($request->evidence)){
            if(count($request->evidence)<2){
                echo "Pilih minimal 2 gejala";
            }else{
                /*$result=DB::table('ds_rules')
                    ->join('ds_problems', 'ds_rules.id_problem', '=', 'ds_problems.id')
                    ->select(array(DB::raw('group_concat(ds_problems.code) as code'), 'ds_rules.cf'))
                    ->whereIn('ds_rules.id_evidence', [implode(',',$request->evidence)])
                    ->groupBy('ds_rules.id_evidence')
                    ->get();*/
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
                    //echo "<br/>";
                    //print_r($list_densitas);
                }

                //--- perangkingan
                //echo "<br/>== PERANGKINGAN ==<br/>";
                unset($densitas_baru["&theta;"]);
                arsort($densitas_baru);
                $perangkingan=$densitas_baru;
                //print_r($perangkingan);
                    
                //--- menampilkan hasil akhir
                //echo "<br/>== HASIL AKHIR ==<br/>";
                $codes=array_keys($densitas_baru); 
                $final_codes=explode(',',$codes[0]);
                $sql="SELECT GROUP_CONCAT(penyakit) AS name FROM penyakit WHERE penyakit IN('".implode("','",$final_codes)."')"; 
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
                return view('user.pages.hasil-diagnosis',['list'=>$list_densitas, 'ranking'=>$perangkingan, 'penyakit'=>$row[0][0], 'rate'=>round($densitas_baru[$codes[0]]*100,2), 'ev'=>$gejala]);
            }
        }else{
            echo "pilih gejala";
        }
    }
}
