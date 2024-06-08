<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;


class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function tabel(){
        $data['user'] = DB::table('users')->get();
        return view('user.tabel',$data);
    }
    public function store(Request $request, $id = null){
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'level' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
        ]);
        if($id == null){
            if ($request->password != NULL) {
                $data = array(
                    'name' => $request->name,
                    'username' => $request->username,
                    'umur' => $request->umur,
                    'status' => $request->status,
                    'alamat' => $request->alamat,
                    'password' => Hash::make($request->password),
                );
                dd($data);
                $simpan = DB::table('users')->insert($data);
            }else{
                return response()->json(['bool' => false,'alert' => 'Password is Required']);
            }
        }else{
            $x = $request->password; 
            // var_dump("asdasd",$request->password);die;
            if($x != null){
                // dd('gagal');
                $data = array(
                    'name' => $request->name,
                    'username' => $request->username,
                    'level' => $request->level,
                    'umur' => $request->umur,
                    'status' => $request->status,
                    'alamat' => $request->alamat,
                    'password' => Hash::make($request->password),
                );
            }else{
                $data = array(
                    'name' => $request->name,
                    'username' => $request->username,
                    'level' => $request->level,
                    'umur' => $request->umur,
                    'alamat' => $request->alamat,
                );
            }
            $simpan = DB::table('users')
            ->where('id',$id)
            ->update($data);
        }
        return response()->json(['bool' =>$simpan]);
    }

    public function update(Request $request, $id){
        // dd($request->password);
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'level' => 'required',
            'umur' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'password' => 'min:6',
        ]);
        $pass = $request->password;
        if($pass != NULL){

            $data = array(
                'name' => $request->name,
                'username' => $request->username,
                'level' => $request->level,
                'alamat' => $request->alamat,
                'status' => $request->status,
                'password' => Hash::make($request->password),
            );
        }else{
            $data = array(
                'name' => $request->name,
                'username' => $request->username,
                'level' => $request->level,
                'umur' => $request->umur,
                'status' => $request->status,
                'alamat' => $request->alamat,
            );
        }

        DB::table('users')->where('id', $id)->update($data);
        return back()->with('success', 'Data berhasil diubah');
    }

    public function destroy(Request $request, $id){
       
        $hapus = DB::table('users')->where('id', $id)->delete();
        return response()->json(['bool' => $hapus]);
    }
}
