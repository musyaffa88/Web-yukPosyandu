<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class rekamController extends Controller
{
    public function tampilData()
    {
        $kehadiran = DB::table('kehadiran')->join('pertemuan','kehadiran.pertemuan_id','=','pertemuan.id')
        ->join('pasien','kehadiran.pasien_id','=','pasien.id')->select('kehadiran.*','pasien.nama','pasien.jenisKelamin')->get();
        $pertemuan = DB::table('pertemuan')->join('posyandu','pertemuan.posyandu_id','=','posyandu.id')->select('pertemuan.*','posyandu.nama')->get();
        return view('rekam',['pertemuan'=>$pertemuan,'kehadiran'=>$kehadiran]);
    }
}
