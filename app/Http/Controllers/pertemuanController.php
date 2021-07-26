<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class pertemuanController extends Controller
{
 
    public function add()
    {
        $posyandu = DB::table('posyandu')->join('users','posyandu.user_id','=','users.id')->select('posyandu.*')->get();
        return view('tambahpertemuan',['posyandu'=>$posyandu]);
    }

    public function proses(Request $request)
    {
        DB::table('pertemuan')->insert(
            ['id'=>$request->id,
            'posyandu_id'=>$request->posyandu_id,
            'operasional'=>$request->waktu,
            'sdm'=>$request->kader,
            'hari'=>$request->hari]
        );
        return redirect('home')->with('status', 'Data pertemuan berhasil ditambah');
    }

    public function edit($id)
    {
        $posyandu = DB::table('posyandu')->join('users','posyandu.user_id','=','users.id')->select('posyandu.*')->get();
        $pertemuan = DB::table('pertemuan')->join('posyandu','pertemuan.posyandu_id','=','posyandu.id')->select('pertemuan.*','posyandu.nama')->where('pertemuan.id',$id)->first();
        return view('editpertemuan',compact('pertemuan'),['posyandu'=>$posyandu]);
    }

    public function editproses(Request $request, $id)
    {
        DB::table('pertemuan')->where('id',$id)->update([
        'id'=>$request->id,
        'posyandu_id'=>$request->posyandu_id,
        'operasional'=>$request->waktu,
        'sdm'=>$request->kader,
        'hari'=>$request->hari
        ]);
        return redirect('home')->with('status', 'Data pertemuan berhasil diubah');
    }
}
