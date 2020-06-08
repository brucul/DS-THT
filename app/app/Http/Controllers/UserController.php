<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Validator;
use App\User;
use App\Penyakit;
use App\InfoPenyakit;
Use Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->where('is_admin', null)->get();
        return view('admin.pages.user-account', ['users'=>$users]);
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
        $id_user = Crypt::decrypt($id);
        $user = User::findOrFail($id_user);
        return view('admin.pages.edit-user', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_profil(Request $request)
    {
        $id=$request->id;
        $email = DB::table('users')->where([['id', '!=', $id], ['email', '=', $request->email]])->count();

        $rules = array(
            'nama' =>  'required|alpha|max:100',
            'email' => 'required|email|min:10',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return back()->with('toast_error', $error->errors()->first());
        } elseif ($email >=1 ) {
            return back()->with('toast_error', 'Email '.$request->email.' Sudah Digunakan !');
        } else {
            $form_data = array(
                'name' => $request->nama,
                'email' => $request->email,
                'email_verified_at' => $request->v_email,
            );
            User::whereId($id)->update($form_data);
            return back()->with('toast_success', 'Data Berhasil Diubah !');
        }
    }

    public function update_pass_admin(Request $request)
    {
        $id=$request->id;
        $rules = array(
            'new_pass' => 'required|min:8',
            'new_pass2' => 'required|min:8',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()){
            return back()->with('toast_error', $error->errors()->first());
            //return response()->json(['ERROR!' => $error->errors()->all()]);
        } elseif ($request->new_pass != $request->new_pass2) {
            return back()->with('toast_error', 'Password Baru Tidak Cocok !');
            //return response()->json(['ERROR!' => 'Password Baru Tidak Cocok']);
        } else {
            $form_data = array(
                'password' => Hash::make($request->new_pass),
            );
            User::whereId($id)->update($form_data);

            return back()->with('toast_success', 'Password Berhasil Diubah !');
        }
    }

    public function update_pass(Request $request)
    {
        $id=$request->id;
        $password = User::find($id)->password;
        $rules = array(
            'old_pass' => 'required|min:8',
            'new_pass' => 'required|min:8',
            'new_pass2' => 'required|min:8',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()){
            return back()->with('toast_error', $error->errors()->first());
            //return response()->json(['ERROR!' => $error->errors()->all()]);
        } elseif ($request->new_pass != $request->new_pass2) {
            return back()->with('toast_error', 'Password Baru Tidak Cocok !');
            //return response()->json(['ERROR!' => 'Password Baru Tidak Cocok']);
        } elseif ((Hash::check($request->old_pass, $password)) != 1) {
            return back()->with('toast_error', 'Password Lama Tidak Cocok !');
            //return response()->json(['ERROR!' => 'Password Lama Tidak Cocok']);
        } else {
            $form_data = array(
                'password' => Hash::make($request->new_pass),
            );
            User::whereId($id)->update($form_data);

            return back()->with('toast_success', 'Password Berhasil Diubah !');
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
        //
    }

    public function diagnosa()
    {
        $g_hidung = DB::table('gejala')->where('jenis', '=', 'Hidung')->get();
        $g_telinga = DB::table('gejala')->where('jenis', '=', 'Telinga')->get();
        $g_tenggorokan = DB::table('gejala')->where('jenis', '=', 'Tenggorokan')->get();
        $g_umum = DB::table('gejala')->where('jenis', '=', 'Umum')->get();
        return view('user.pages.diagnosa', [
            'g_telinga' => $g_telinga, 
            'g_hidung' => $g_hidung, 
            'g_tenggorokan' => $g_tenggorokan,
            'g_umum' => $g_umum
        ]);
    }

    public function riwayatDiagnosa($id)
    {
        $id_user = Crypt::decrypt($id);
        $riwayat = DB::table('pasien')
                    ->join('users', 'pasien.id_user', '=', 'users.id')
                    ->join('penyakit', 'pasien.diagnosis', '=', 'penyakit.kode_penyakit')
                    ->select('pasien.*', 'users.*', 'penyakit.penyakit')
                    ->where('id_user', $id_user)
                    ->get();
        return view('user.pages.riwayat-diagnosa', ['riwayat'=>$riwayat]);
    }

    public function profil($id)
    {
        $id_user = Crypt::decrypt($id);
        $user = User::findOrFail($id_user);
        return view('user.pages.form-data-diri', ['user'=>$user]);
    }

    public function info()
    {
        $penyakit = DB::table('info_penyakit')
                    ->join('penyakit', 'penyakit.kode_penyakit', '=', 'info_penyakit.kode')
                    ->select('penyakit.*', 'info_penyakit.*')
                    //->where('info_penyakit.detail', '!=', '')
                    ->get();
        $info = count($penyakit);
        return view('user.pages.info-penyakit', (['penyakit' => $penyakit, 'info' => $info]));
    }

    public function showInfo($id)
    {
        $penyakit = InfoPenyakit::where('kode', $id)->first();
        return view('user.pages.detail-info-penyakit', ['penyakit' => $penyakit]);
    }
}
