<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class posyanduController extends Controller
{
    public function showData()
    {
        $posyandu = DB::table('posyandu')->join('users','posyandu.user_id','=','users.id')->select('posyandu.*')->get();
        $pertemuan = DB::table('pertemuan')->join('posyandu','pertemuan.posyandu_id','=','posyandu.id')->select('pertemuan.*')->get();
        $pasien = DB::table('pasien')->select('pasien.*')->get();
        return view('home',['posyandu'=>$posyandu,'pertemuan'=>$pertemuan,'pasien'=>$pasien]);

    }
}
