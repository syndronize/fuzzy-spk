<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class DiagnosisGejalaController extends Controller
{
    public function index(){
        $data['gejala'] = DB::table('gejalas')->get();
        return view('diagnosisgejala.index',$data);
    }
    public function data(){
        $data['dg'] = DB::table('diagnosagejalas')
                        ->leftJoin('diagnoses', 'diagnosagejalas.diagnoses_id', '=', 'diagnoses.id')
                        ->leftJoin('gejalas', 'diagnosagejalas.gejalas_id', '=', 'gejalas.id')
                        ->select('diagnoses.nama as diagnosa', 'gejalas.nama as gejala', 'diagnosagejalas.weight')
                        ->get();
        return view('diagnosisgejala.isidata',$data);
    }

    public function diagnose(Request $request){
        $symptom_map = [
            'status1' => 1, 'status2' => 2, 'status3' => 3, 'status4' => 4,
            'status5' => 5, 'status6' => 6, 'status7' => 7, 'status8' => 8,
            'status9' => 9, 'status10' => 10, 'status11' => 11, 'status12' => 12,
            'status13' => 13, 'status14' => 14, 'status15' => 15, 'status16' => 16,
            'status17' => 17, 'status18' => 18,
        ];
    
        $data = [
            'status1' => $request->status1, 'status2' => $request->status2,
            'status3' => $request->status3, 'status4' => $request->status4,
            'status5' => $request->status5, 'status6' => $request->status6,
            'status7' => $request->status7, 'status8' => $request->status8,
            'status9' => $request->status9, 'status10' => $request->status10,
            'status11' => $request->status11, 'status12' => $request->status12,
            'status13' => $request->status13, 'status14' => $request->status14,
            'status15' => $request->status15, 'status16' => $request->status16,
            'status17' => $request->status17, 'status18' => $request->status18,
        ];
        $score = 0;
        for ($i=1; $i <19 ; $i++) { 
            if($data['status'.$i] == "true"){
                $score+=1.5;
            }
        }
        // Fuzzy Logic Implementation
        $fuzzy_scores = [];
        if ($score >= 0 && $score <= 4) {
            $fuzzy_scores ['hasil']= 'normal';
            $fuzzy_scores ['nilai']= $score;
        } elseif ($score > 4 && $score <= 9) {
            $fuzzy_scores['hasil'] = 'ringan';
            $fuzzy_scores ['nilai']= $score;
        } elseif ($score > 9 && $score <= 14) {
            $fuzzy_scores['hasil'] = 'sedang';
            $fuzzy_scores ['nilai']= $score;
        } else {
            $fuzzy_scores['hasil'] = 'berat';
            $fuzzy_scores ['nilai']= $score;
        }
        
        $data['result'] = $fuzzy_scores;
        return response()->json($fuzzy_scores);
    }
    
    


    public function client(Request $req){
        $hasil = $req->hasil;
        $nilai = $req->nilai;
        $nama = $req->nama;

        if ($hasil == 'normal') {
            $data = [
                'nama' => $req->nama,
                'normal' => $nilai, 
            ];
        }
        if ($hasil == 'ringan') {
            $data = [
                'nama' => $req->nama,
                'ringan' => $nilai, 
            ];
        }
        if ($hasil == 'sedang') {
            $data = [
                'nama' => $req->nama,
                'sedang' => $nilai, 
            ];
        }
        if ($hasil == 'berat') {
            $data = [
                'nama' => $req->nama,
                'berat' => $nilai, 
            ];
        }

        

        $save = DB::table('clients')->insert($data);
        return response()->json(['bool' =>$save]);
        
    }
    
}
