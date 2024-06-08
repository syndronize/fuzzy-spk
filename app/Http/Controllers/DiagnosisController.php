<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class DiagnosisController extends Controller
{
    public function index(){
        return view('diagnosis.index');
    }

    public function data(){
        $data['diagnosis'] = DB::table('diagnoses')->get();
        // dd($data);
        return view('diagnosis.isidata',$data);
    }

    public function store(Request $request, $id = null){
        $this->validate($request, [
            'nama' => 'required',
        ]);
        if($id == null){
            
            $data = array(
                'nama' => $request->nama,
            );
            $simpan = DB::table('diagnoses')->insert($data);
        }else{
            $data = array(
                'nama' => $request->nama,
            );
            $simpan = DB::table('diagnoses')
            ->where('id',$id)
            ->update($data);
        } 
        return response()->json(['bool' =>$simpan]);
    }

    public function destroy(Request $request, $id){
        $hapus = DB::table('diagnoses')->where('id', $id)->delete();
        return response()->json(['bool' => $hapus]);
    }
}
