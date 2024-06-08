<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use Validator;
class DashboardController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function home(){
        
        return view('home');
    }

    public function registerakun(Request $r){
        $validator = Validator::make($r->all(), [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }
        $data = array(
            'name' => $r->name,
            'username' => $r->username,
            'password' => Hash::make($r->password),
            'umur' => $r->umur,
            'alamat' => $r->alamat,
        );
        $simpan = DB::table('users')->insert($data);
        if($simpan){
            return redirect('/')->with('alert','Berhasil Menambahkan Data');
        }else{
            return redirect('/register')->with('alert','Gagal Menambahkan Data');
        }

    }

    public function aksiLogin(Request $r){
        $this->validate($r, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = DB::table('users')
                ->where('username',$r->username)
                ->where('status','=','Verifikasi')
                ->first();
        if($user){
            if(Hash::check($r->password,$user->password)){
                session()->put('id',$user->id);
                session()->put('name',$user->name);
                session()->put('level',$user->level);
                session()->put('status',$user->status);
                return redirect('/dashboard')->with('success','Selamat Datang');
            }else{
                return redirect('/')->with('error','Password Salah');
            }
        }else{
            return redirect('/')->with('error','Username Tidak Ditemukan');
        }
    }

    // public function chart1(){
    //     $data['semua'] = DB::table('users')
    //             ->where('status','=','Verifikasi')
    //             ->where('level','=','atlet')
    //             ->count();

    //     $data['pisau'] = DB::table('users')
    //             ->where('jenis_lempar','=','Pisau')
    //             ->where('status','=','Verifikasi')
    //             ->where('level','=','atlet')
    //             ->count();

    //     $data['kapak'] = DB::table('users')
    //             ->where('jenis_lempar','=','Kapak')
    //             ->where('status','=','Verifikasi')
    //             ->where('level','=','atlet')
    //             ->count();
                
    //     return response()->json($data);
    // }

    // public function chart2(){
    //     $pisau = DB::table('nilais')
    //             ->leftJoin('users','users.id','=','nilais.user_id')
    //             ->where('users.jenis_lempar','=','Pisau')
    //             ->get();
    //     $kapak = DB::table('nilais')
    //             ->leftJoin('users','users.id','=','nilais.user_id')
    //             ->where('users.jenis_lempar','=','Kapak')
    //             ->get();
    //     // GET NILAI 1 - 7
    //     foreach($pisau as $p){
            
    //         $nilai31 = $p->nilai31;
    //         $nilai32 = $p->nilai32;
    //         $nilai33 = $p->nilai33;
    //         $nilai41 = $p->nilai41;
    //         $nilai42 = $p->nilai42;
    //         $nilai43 = $p->nilai43;
    //         $nilai51 = $p->nilai51;
    //         $nilai52 = $p->nilai52;
    //         $nilai53 = $p->nilai53;

    //         $skor_jarak1 = $nilai31 + $nilai32 + $nilai33;
    //         $skor_jarak2 = $nilai41 + $nilai42 + $nilai43;
    //         $skor_jarak3 = $nilai51 + $nilai52 + $nilai53;

    //         $skor_lempar = $skor_jarak1 + $skor_jarak2 + $skor_jarak3;

    //         $array_nilai = array($nilai31,$nilai32,$nilai33,$nilai41,$nilai42,$nilai43,$nilai51,$nilai52,$nilai53);

    //         $presisi = Stand_deviation($array_nilai);

    //     }
    // }

    public function logout(){
        session()->flush();
        return redirect('/')->with('success','Berhasil Keluar');
    }
}
