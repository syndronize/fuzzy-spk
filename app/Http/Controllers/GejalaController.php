<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class GejalaController extends Controller
{
    public function index(){
        return view('gejala.index');
    }

    public function data(){
        $data['gejala'] = DB::table('gejalas')->get();
        // dd($data);
        return view('gejala.isidata',$data);
    }

    public function store(Request $request, $id = null){
        $this->validate($request, [
            'nama' => 'required',
        ]);
        if($id == null){
            
            $data = array(
                'nama' => $request->nama,
            );
            $simpan = DB::table('gejalas')->insert($data);
        }else{
            $data = array(
                'nama' => $request->nama,
            );
            $simpan = DB::table('gejalas')
            ->where('id',$id)
            ->update($data);
        } 
        return response()->json(['bool' =>$simpan]);
    }

    public function destroy(Request $request, $id){
        $hapus = DB::table('gejalas')->where('id', $id)->delete();
        return response()->json(['bool' => $hapus]);
    }
}
