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
            'status1' => 1, 
            'status2' => 2,
            'status3' => 3,
            'status4' => 4,
            'status5' => 5,
            'status6' => 6,
            'status7' => 7,
            'status8' => 8,
            'status9' => 9,
            'status10' => 10,
            'status11' => 11,
            'status12' => 12,
            'status13' => 13,
            'status14' => 14,
        ];
        $data = [
            'status1' => $request->status1,
            'status2' => $request->status2,
            'status3' => $request->status3,
            'status4' => $request->status4,
            'status5' => $request->status5,
            'status6' => $request->status6,
            'status7' => $request->status7,
            'status8' => $request->status8,
            'status9' => $request->status9,
            'status10' => $request->status10,
            'status11' => $request->status11,
            'status12' => $request->status12,
            'status13' => $request->status13,
            'status14' => $request->status14,
        ];
    
        // Initialize diagnosis scores with all possible diagnosis IDs set to zero
        $diagnosis_scores = DB::table('diagnoses')->pluck('id')->flip()->map(function () {
            return 0;
        })->toArray(); // Convert to array explicitly
    
        // Process each status as a symptom
        foreach ($data as $key => $value) {
            // dd($value);
            if ($value == "true") { // If symptom is reported
                $symptom_id = $symptom_map[$key]; // Get the symptom ID from the mapping
                // dd($symptom_id);
                // Get the weights associated with the symptom_id
                $weights = DB::table('diagnosagejalas')
                    ->where('gejalas_id', $symptom_id)
                    ->get();
    
                    foreach ($weights as $weight) {
                        if (isset($diagnosis_scores[$weight->diagnoses_id])) { // Always good to check if key exists
                            $diagnosis_scores[$weight->diagnoses_id] += $weight->weight;
                        }
                    }
            }
        }
    
        // Calculate total weight to normalize the scores
        $total_weight = array_sum($diagnosis_scores);
        // dd($total_weight);  
$diagnosis_scores = array_map(function ($score) use ($total_weight) {
    return $total_weight > 0 ? ($score / $total_weight) * 100 : 0;
}, $diagnosis_scores);
    // dd($diagnosis_scores);
    $diagnosis_scores = collect($diagnosis_scores);
    // dd($diagnosis_scores);
        // Retrieve diagnosis names
        $diagnosis_names = DB::table('diagnoses')->pluck('nama', 'id');
    //    dd($diagnosis_names);
        $diagnosis_scores = $diagnosis_scores->mapWithKeys(function ($score, $id) use ($diagnosis_names) {
            return [$diagnosis_names[$id] => $score];
        });
        // Return the result view with diagnosis scores
        // dd($diagnosis_scores);
        $data['result'] = $diagnosis_scores;
        // return view('diagnosis.result', $data);
        return response()->json($diagnosis_scores);
    }
    
}
