<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class select_list extends Controller
{
    public function function1(){
        
        $data = DB::table('store_list')->get();
        dd($data);
    }
}
