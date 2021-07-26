<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class variabelController extends Controller
{
    public function tampilData()
    {
        $variabel = DB::table('variabel')->select('variabel.*')->get();
        $variabel_set = DB::table('variabel_set')->join('variabel','variabel_set.variabel_id','=','variabel.id')->select('variabel_set.*','variabel.nama as variabelnama')->get();
        return view('variabel',['variabel'=>$variabel,'variabel_set'=>$variabel_set]);
    }
    public function add()
    {
        $variabel = DB::table('variabel')->select('variabel.*')->get();
        return view('tambahvariabel',['variabel'=>$variabel]);
    }

    public function proses(Request $request)
    {
        DB::table('variabel')->insert(
            [
            'nama'=>$request->nama,
            'kategori'=>$request->kategori,
            ]
        );
        return redirect('variabel')->with('status', 'Variabel berhasil ditambah');
    }

    public function edit($id)
    {
        $variabel = DB::table('variabel')->select('variabel.*')->where('id',$id)->first();
        return view('editvariabel',['variabel'=>$variabel]);
    }

    public function editproses(Request $request, $id)
    {
        DB::table('variabel')->where('id',$id)->update([
            'nama'=>$request->nama,
            'kategori'=>$request->kategori,
        ]);
        return redirect('variabel')->with('status', 'Data variabel berhasil diubah');
    }

    public function delete($id)
    {
        DB::table('variabel')->where('id',$id)->delete();
        return redirect('variabel')->with('status', 'Data variabel berhasil dihapus!');

    }

    public function addset()
    {
        $variabel = DB::table('variabel')->select('variabel.*')->get();
        $variabel_set = DB::table('variabel_set')->join('variabel','variabel_set.variabel_id','=','variabel.id')->select('variabel_set.*','variabel.nama as variabelnama')->get();
        return view('tambahvariabelset',['variabel'=>$variabel,'variabel_set'=>$variabel_set]);
    }

    public function prosesset(Request $request)
    {
        DB::table('variabel_set')->insert(
            [
                'id'=>$request->id,
                'variabel_id'=>$request->variabel_id,
                'nama'=>$request->nama,
                'kode'=>$request->kode,
                'min'=>$request->min,
                'max'=>$request->max,
                'kurva'=>$request->kurva,
            ]
        );
        return redirect('variabel')->with('status', 'Himpunan berhasil ditambah');
    }

    public function editset($id)
    {
        $variabel = DB::table('variabel')->select('variabel.*')->get();
        $variabel_set = DB::table('variabel_set')->join('variabel','variabel_set.variabel_id','=','variabel.id')->select('variabel_set.*','variabel.nama as variabelnama')->where('variabel_set.id',$id)->first();
        return view('editvariabelset',['variabel'=>$variabel,'variabel_set'=>$variabel_set]);
    }

    public function editprosesset(Request $request, $id)
    {
        DB::table('variabel_set')->where('id',$id)->update([
            'id'=>$request->id,
            'variabel_id'=>$request->variabel_id,
            'nama'=>$request->nama,
            'kode'=>$request->kode,
            'min'=>$request->min,
            'max'=>$request->max,
            'kurva'=>$request->kurva,
        ]);
        return redirect('variabel')->with('status', 'Data himpunan berhasil diubah');
    }

    public function deleteset($id)
    {
        DB::table('variabel_set')->where('id',$id)->delete();
        return redirect('variabel')->with('status', 'Data himpunan berhasil dihapus!');

    }
}
