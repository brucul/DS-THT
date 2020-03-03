<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Penyakit;
use App\InfoPenyakit;
use Validator;

class InfoPenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyakit = DB::table('info_penyakit')
                    ->join('penyakit', 'info_penyakit.kode', '=', 'penyakit.kode_penyakit')
                    ->select('info_penyakit.*', 'penyakit.*')
                    ->where('penyakit.deleted_at', null)
                    ->get();
        return view('admin.pages.list-info-penyakit', ['penyakit' => $penyakit]);
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
        $penyakit = DB::table('info_penyakit')
                    ->join('penyakit', 'info_penyakit.kode', '=', 'penyakit.kode_penyakit')
                    ->select('info_penyakit.*', 'penyakit.penyakit')
                    ->where('kode', $id)
                    ->first();
        return view('admin.pages.form-info', ['penyakit' => $penyakit]);
        
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
            'detail'    => 'required|min:10',
        );

        //validasi
        $error = Validator::make($request->all(), $rules);
        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        //detail
        $detail=$request->input('detail');

        $dom = new \domdocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){
            $data = $img->getattribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);
            $image_name= time().$k.'.png';
            $path = public_path(). '/images/' . $image_name;
            //$path2 = 'app/public/images/'. $image_name;

            file_put_contents($path, $data);
            //file_put_contents($path2, $data);

            $img->removeattribute('src');
            $img->setattribute('src', '/sp/public/images/'.$image_name);
        }

        if ($detail == '') {
            $form_data = array(
                'kode' =>  $request->kode,
                'detail' =>  null,
            );
        } else {
            $form_data = array(
                'kode' =>  $request->kode,
                'detail' =>  $dom->saveHTML()
            );
        }

        InfoPenyakit::whereId($request->hidden_id)->update($form_data);

        return redirect()->route('admin.info.list')->with('success','Posted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //App\Flight::withTrashed()
        //->where('airline_id', 1)
        //->restore();
    }
}
