<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kehadiranController extends Controller
{
    public function tampilData($id){
        $kehadiran = DB::table('kehadiran')->join('pertemuan','kehadiran.pertemuan_id','=','pertemuan.id')
        ->join('pasien','kehadiran.pasien_id','=','pasien.id')->select('kehadiran.*','pasien.*','pertemuan.*')->where('kehadiran.pertemuan_id','=',$id)->get();
        return view('kehadiran',['kehadiran'=>$kehadiran]);
}
    public function add()
    {
        $pertemuan = DB::table('pertemuan')->select('pertemuan.*')->get();
        $pasien = DB::table('pasien')->select('pasien.*')->get();
        return view ('tambahkehadiran',['pertemuan'=>$pertemuan,'pasien'=>$pasien]);
    }

    public function proses(Request $request)
    {
        DB::table('kehadiran')->insert(
            ['id'=>$request->id,
            'pasien_id'=>$request->pasien_id,
            'pertemuan_id'=>$request->pertemuan_id,
            // 'nama'=>$request->nama,
            // 'jenisKelamin'=>$request->jenisKelamin,
            // 'alamat'=>$request->alamat,
            // 'Telp'=>$request->telp
            'kondisi'=>$request->kondisi,
            'umur'=>$request->umur,
            'tinggi'=>$request->tinggi,
            'berat'=>$request->berat,
            'tekanan'=>$request->tekanan
            ]
        );
        return redirect('rekam')->with('status', 'Data kehadiran berhasil ditambah!');
    }
    public function edit($id)
    { 
        $kehadiran = DB::table('kehadiran')->join('pertemuan','kehadiran.pertemuan_id','=','pertemuan.id')
        ->join('pasien','kehadiran.pasien_id','=','pasien.id')->select('kehadiran.*','pasien.nama')->where('kehadiran.id',$id)->first();
        $pasien = DB::table('pasien')->select('pasien.*')->get();
        $pertemuan = DB::table('pertemuan')->join('posyandu','pertemuan.posyandu_id','=','posyandu.id')->select('pertemuan.*','posyandu.nama')->get();
        return view('editkehadiran',compact('kehadiran'),['pasien'=>$pasien,'pertemuan'=>$pertemuan]);
    }

    public function editproses(Request $request, $id)
    {
        DB::table('kehadiran')->where('id',$id)->update([
        // 'id'=>$request->id,
        'pasien_id'=>$request->pasien_id,
        'pertemuan_id'=>$request->pertemuan_id,
        // 'nama'=>$request->nama,
        // 'jenisKelamin'=>$request->jenisKelamin,
        // 'alamat'=>$request->alamat,
        // 'telp'=>$request->telp
        'kondisi'=>$request->kondisi,
        'umur'=>$request->umur,
        'tinggi'=>$request->tinggi,
        'berat'=>$request->berat,
        'tekanan'=>$request->tekanan
        ]);
        return redirect('rekam')->with('status', 'Data kehadiran berhasil diubah!');
    }
    public function delete($id)
    {
        DB::table('kehadiran')->where('id',$id)->delete();
        return redirect('rekam')->with('status', 'Data kehadiran berhasil dihapus!');

    }
}
