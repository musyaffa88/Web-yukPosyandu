<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pasienController extends Controller
{
    public function tampilData($id){
            $pasien = DB::table('pasien')->join('pertemuan','pasien.pertemuan_id','=','pertemuan.id')->select('pasien.*')->where('pasien.pertemuan_id','=',$id)->get();
            return view('pasien',['pasien'=>$pasien]);
    }
    public function add()
    {
        $pertemuan = DB::table('pertemuan')->select('pertemuan.*')->get();
        return view('tambahpasien',['pertemuan'=>$pertemuan]);
    }

    public function proses(Request $request)
    {
        DB::table('pasien')->insert(
            ['id'=>$request->id,
            // 'pertemuan_id'=>$request->pertemuan_id,
            'nama'=>$request->nama,
            'jenisKelamin'=>$request->jenisKelamin,
            'alamat'=>$request->alamat,
            'Telp'=>$request->telp
            // 'kondisi'=>$request->kondisi,
            // 'umur'=>$request->umur,
            // 'tinggi'=>$request->tinggi,
            // 'berat'=>$request->berat,
            // 'tekanan'=>$request->tekanan
            ]
        );
        return redirect('home')->with('status', 'Data pasien berhasil ditambah!');
    }
    public function edit($id)
    {
        // $pertemuan = DB::table('pertemuan')->select('pertemuan.*')->get();
        $pasien = DB::table('pasien')->where('id',$id)->first();
        return view('editpasien',compact('pasien'));
    }

    public function editproses(Request $request, $id)
    {
        DB::table('pasien')->where('id',$id)->update([
        'id'=>$request->id,
        // 'pertemuan_id'=>$request->pertemuan_id,
        'nama'=>$request->nama,
        'jenisKelamin'=>$request->jenisKelamin,
        'alamat'=>$request->alamat,
        'telp'=>$request->telp
        // 'kondisi'=>$request->kondisi,
        // 'umur'=>$request->umur,
        // 'tinggi'=>$request->tinggi,
        // 'berat'=>$request->berat,
        // 'tekanan'=>$request->tekanan
        ]);
        return redirect('home')->with('status', 'Data pasien berhasil diubah!');
    }
    public function delete($id)
    {
        DB::table('pasien')->where('id',$id)->delete();
        return redirect('home')->with('status', 'Data pasien berhasil dihapus!');

    }
    public function riwayat($id){
        $kehadiran = DB::table('kehadiran')->join('pertemuan','kehadiran.pertemuan_id','=','pertemuan.id')
        ->join('pasien','kehadiran.pasien_id','=','pasien.id')->select('kehadiran.*','pasien.*','pertemuan.*')->where('kehadiran.pasien_id','=',$id)->get();
        return view('riwayat',['kehadiran'=>$kehadiran]);
}
}
