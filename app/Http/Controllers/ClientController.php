<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClientController extends Controller
{
    public function index(){
        $data['client'] = DB::table('clients')->get();
        return view('client.index',$data);
    }
}
