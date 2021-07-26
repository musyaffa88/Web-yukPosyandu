<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class perhitunganController extends Controller
{
    public function tampilData()
    {
        // $kehadiran = DB::table('kehadiran')->join('pertemuan','kehadiran.pertemuan_id','=','pertemuan.id')
        // ->join('pasien','kehadiran.pasien_id','=','pasien.id')->select('kehadiran.*','pasien.*','pertemuan.*')->get();
        $pertemuan = DB::table('pertemuan')->join('posyandu','pertemuan.posyandu_id','=','posyandu.id')->select('pertemuan.*','posyandu.nama')->get();
        return view('perhitungan',['pertemuan'=>$pertemuan]);
    }
    public function tampilHitung($id)
    {
        $kehadiran = DB::table('kehadiran')->join('pertemuan','kehadiran.pertemuan_id','=','pertemuan.id')
        ->join('pasien','kehadiran.pasien_id','=','pasien.id')->select('kehadiran.*','pasien.*','pertemuan.*')->where('kehadiran.pertemuan_id',$id)->get();
    
        
        // @php
    //     foreach ($kehadiran as $k) {
            
         
    //     $alpha = array();
    //     $z = array();
    //     $miu = 0;
    //     $miu_umur = 0;
    //     $miu_waktu = 0;
    //     if ($k->umur < 45) {
    //         $miu_pralansia1 = 0;
    //     }
    //     if ($k->umur >= 45 and $k->umur <= 80) {
    //         $miu_pralansia2 = (59-$k->umur)/19;
    //         $miu_lansia1 = ($k->umur-60)/20;
    //     }
    //     if ($k->umur > 80) {
    //         $miu_lansia2 = 0;
    //     }
    //     if($k->kondisi == 'PAHAM'){
    //         $miu_paham = 1;
    //     }
    //     if($k->kondisi == 'TIDAK PAHAM'){
    //         $miu_tidakpaham = 0;
    //     }
    //     if($k->operasional >= 0 and $k->operasional <=240){
    //         $miu_sebentar = (120-$k->operasional)/120;
    //         $miu_lama = ($k->operasional-120)/120;
    //     }
    //     if($k->operasional > 240){
    //         $miu_operasional3 = 1;
    //     }

    //     if($k->sdm >= 0 and $k->sdm <= 6){
    //         $miu_sdm1 = (3-$k->sdm)/3;
    //         $miu_sdm2 = ($k->sdm-3)/3;
    //     }
    //     if($k->sdm > 6){
    //         $miu_sdm3 = 1;
    //     }
    //     if($k->hari == 'Weekend'){
    //         $miu_weekend = 1;
    //     }
    //     if($k->hari == 'Weekday'){
    //         $miu_weekday = 0;
    //     }

    //     // $minimum1 = min($miu_sebentar,$miu_lama);

    //     //RULES 1
    //     if(($k->umur >=45 and $k->umur <=59) 
    //     and ($k->kondisi == 'PAHAM') 
    //     and ($k->hari == 'Weekend') 
    //     and ($k->operasional >=120 and $k->operasional <=240) 
    //     and ($k->sdm >= 3 and $k->sdm <=6)){
    //         $minimum = min($miu_pralansia2 , $miu_paham , $miu_weekend , $miu_lama, $miu_sdm2);
    //         array_push($alpha, $minimum);
    //         $hitung = ($minimum*100)+0;
    //         array_push($z, $hitung);
    //     }
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->kondisi == 'PAHAM') 
    //         and ($k->hari == 'Weekend') 
    //         and ($k->operasional >=120 and $k->operasional <=240) 
    //         and ($k->sdm >= 0 and $k->sdm <=3)){
    //             $minimum = min($miu_pralansia2,$miu_paham,$miu_weekend,$miu_lama,$miu_sdm1);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->kondisi == 'PAHAM') 
    //         and ($k->hari == 'Weekend') 
    //         and ($k->operasional >=0 and $k->operasional <=120) 
    //         and ($k->sdm >= 3 and $k->sdm <=6)){
    //             $minimum = min($miu_pralansia2,$miu_paham,$miu_weekend,$miu_sebentar,$miu_sdm2);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->kondisi == 'PAHAM') 
    //         and ($k->hari == 'Weekend') 
    //         and ($k->operasional >=0 and $k->operasional <=120) 
    //         and ($k->sdm >= 0 and $k->sdm <=3)){
    //             $minimum = min($miu_pralansia2,$miu_paham,$miu_weekend,$miu_sebentar,$miu_sdm1);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->kondisi == 'PAHAM') 
    //         and ($k->hari == 'Weekday') 
    //         and ($k->operasional >=120 and $k->operasional <=240) 
    //         and ($k->sdm >= 3 and $k->sdm <=6)){
    //             $minimum = min($miu_pralansia2,$miu_paham,$miu_weekday,$miu_lama,$miu_sdm2);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->kondisi == 'PAHAM') 
    //         and ($k->hari == 'Weekday') 
    //         and ($k->operasional >=120 and $k->operasional <=240) 
    //         and ($k->sdm >= 0 and $k->sdm <=3)){
    //             $minimum = min($miu_pralansia2,$miu_paham,$miu_weekday,$miu_lama,$miu_sdm1);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->kondisi == 'PAHAM') 
    //         and ($k->hari == 'Weekday') 
    //         and ($k->operasional >=0 and $k->operasional <=120) 
    //         and ($k->sdm >= 3 and $k->sdm <=6)){
    //             $minimum = min($miu_pralansia2,$miu_paham,$miu_weekday,$miu_sebentar,$miu_sdm2);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->kondisi == 'PAHAM') 
    //         and ($k->hari == 'Weekday') 
    //         and ($k->operasional >=0 and $k->operasional <=120) 
    //         and ($k->sdm >= 0 and $k->sdm <=3)){
    //             $minimum = min($miu_pralansia2,$miu_paham,$miu_weekday,$miu_sebentar,$miu_sdm1);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         and ($k->hari == 'Weekend') 
    //         and ($k->operasional >=120 and $k->operasional <=240) 
    //         and ($k->sdm >= 3 and $k->sdm <=6)){
    //             $minimum = min($miu_pralansia2 , $miu_tidakpaham , $miu_weekend , $miu_lama, $miu_sdm2);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         and ($k->hari == 'Weekend') 
    //         and ($k->operasional >=120 and $k->operasional <=240) 
    //         and ($k->sdm >= 0 and $k->sdm <=3)){
    //             $minimum = min($miu_pralansia2 , $miu_tidakpaham , $miu_weekend , $miu_lama, $miu_sdm1);
    //             array_push($alpha, $minimum);
    //             $hitung =100-($minimum*100);
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         and ($k->hari == 'Weekend') 
    //         and ($k->operasional >=0 and $k->operasional <=120) 
    //         and ($k->sdm >= 3 and $k->sdm <=6)){
    //             $minimum = min($miu_pralansia2 , $miu_tidakpaham , $miu_weekend , $miu_sebentar, $miu_sdm2);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         and ($k->hari == 'Weekend') 
    //         and ($k->operasional >=0 and $k->operasional <=120) 
    //         and ($k->sdm >= 0 and $k->sdm <=3)){
    //             $minimum = min($miu_pralansia2 , $miu_tidakpaham , $miu_weekend , $miu_sebentar, $miu_sdm1);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         and ($k->hari == 'Weekday') 
    //         and ($k->operasional >=120 and $k->operasional <=240) 
    //         and ($k->sdm >= 3 and $k->sdm <=6)){
    //             $minimum = min($miu_pralansia2 , $miu_tidakpaham , $miu_weekday , $miu_lama, $miu_sdm2);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         } 
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         and ($k->hari == 'Weekday') 
    //         and ($k->operasional >=120 and $k->operasional <=240) 
    //         and ($k->sdm >= 0 and $k->sdm <=3)){
    //             $minimum = min($miu_pralansia2 , $miu_tidakpaham , $miu_weekday , $miu_lama, $miu_sdm1);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         and ($k->hari == 'Weekday') 
    //         and ($k->operasional >=0 and $k->operasional <=120) 
    //         and ($k->sdm >= 3 and $k->sdm <=6)){
    //             $minimum = min($miu_pralansia2 , $miu_tidakpaham , $miu_weekday , $miu_sebentar, $miu_sdm2);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         } 
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         and ($k->hari == 'Weekday') 
    //         and ($k->operasional >=0 and $k->operasional <=120) 
    //         and ($k->sdm >= 0 and $k->sdm <=3)){
    //             $minimum = min($miu_pralansia2 , $miu_tidakpaham , $miu_weekday , $miu_sebentar, $miu_sdm1);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         }  
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'PAHAM') 
    //         and ($k->hari == 'Weekend') 
    //         and ($k->operasional >=120 and $k->operasional <=240) 
    //         and ($k->sdm >= 3 and $k->sdm <=6)){
    //             $minimum = min($miu_lansia1 , $miu_paham , $miu_weekend , $miu_lama, $miu_sdm2);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'PAHAM') 
    //         and ($k->hari == 'Weekend') 
    //         and ($k->operasional >=120 and $k->operasional <=240) 
    //         and ($k->sdm >= 0 and $k->sdm <=3)){
    //             $minimum = min($miu_lansia1,$miu_paham,$miu_weekend,$miu_lama,$miu_sdm1);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'PAHAM') 
    //         and ($k->hari == 'Weekend') 
    //         and ($k->operasional >=0 and $k->operasional <=120) 
    //         and ($k->sdm >= 3 and $k->sdm <=6)){
    //             $minimum = min($miu_lansia1,$miu_paham,$miu_weekend,$miu_sebentar,$miu_sdm2);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'PAHAM') 
    //         and ($k->hari == 'Weekend') 
    //         and ($k->operasional >=0 and $k->operasional <=120) 
    //         and ($k->sdm >= 0 and $k->sdm <=3)){
    //             $minimum = min($miu_lansia1,$miu_paham,$miu_weekend,$miu_sebentar,$miu_sdm1);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'PAHAM') 
    //         and ($k->hari == 'Weekday') 
    //         and ($k->operasional >=120 and $k->operasional <=240) 
    //         and ($k->sdm >= 3 and $k->sdm <=6)){
    //             $minimum = min($miu_lansia1,$miu_paham,$miu_weekday,$miu_lama,$miu_sdm2);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'PAHAM') 
    //         and ($k->hari == 'Weekday') 
    //         and ($k->operasional >=120 and $k->operasional <=240) 
    //         and ($k->sdm >= 0 and $k->sdm <=3)){
    //             $minimum = min($miu_lansia1,$miu_paham,$miu_weekday,$miu_lama,$miu_sdm1);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'PAHAM') 
    //         and ($k->hari == 'Weekday') 
    //         and ($k->operasional >=0 and $k->operasional <=120) 
    //         and ($k->sdm >= 3 and $k->sdm <=6)){
    //             $minimum = min($miu_lansia1,$miu_paham,$miu_weekday,$miu_sebentar,$miu_sdm2);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'PAHAM') 
    //         and ($k->hari == 'Weekday') 
    //         and ($k->operasional >=0 and $k->operasional <=120) 
    //         and ($k->sdm >= 0 and $k->sdm <=3)){
    //             $minimum = min($miu_lansia1,$miu_paham,$miu_weekday,$miu_sebentar,$miu_sdm1);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         and ($k->hari == 'Weekend') 
    //         and ($k->operasional >=120 and $k->operasional <=240) 
    //         and ($k->sdm >= 3 and $k->sdm <=6)){
    //             $minimum = min($miu_lansia1 , $miu_tidakpaham , $miu_weekend , $miu_lama, $miu_sdm2);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         and ($k->hari == 'Weekend') 
    //         and ($k->operasional >=120 and $k->operasional <=240) 
    //         and ($k->sdm >= 0 and $k->sdm <=3)){
    //             $minimum = min($miu_lansia1 , $miu_tidakpaham , $miu_weekend , $miu_lama, $miu_sdm1);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         and ($k->hari == 'Weekend') 
    //         and ($k->operasional >=0 and $k->operasional <=120) 
    //         and ($k->sdm >= 3 and $k->sdm <=6)){
    //             $minimum = min($miu_lansia1 , $miu_tidakpaham , $miu_weekend , $miu_sebentar, $miu_sdm2);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         and ($k->hari == 'Weekend') 
    //         and ($k->operasional >=0 and $k->operasional <=120) 
    //         and ($k->sdm >= 0 and $k->sdm <=3)){
    //             $minimum = min($miu_lansia1 , $miu_tidakpaham , $miu_weekend , $miu_sebentar, $miu_sdm1);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         and ($k->hari == 'Weekday') 
    //         and ($k->operasional >=120 and $k->operasional <=240) 
    //         and ($k->sdm >= 3 and $k->sdm <=6)){
    //             $minimum = min($miu_lansia1 , $miu_tidakpaham , $miu_weekday , $miu_lama, $miu_sdm2);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         } 
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         and ($k->hari == 'Weekday') 
    //         and ($k->operasional >=120 and $k->operasional <=240) 
    //         and ($k->sdm >= 0 and $k->sdm <=3)){
    //             $minimum = min($miu_lansia1 , $miu_tidakpaham , $miu_weekday , $miu_lama, $miu_sdm1);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         and ($k->hari == 'Weekday') 
    //         and ($k->operasional >=0 and $k->operasional <=120) 
    //         and ($k->sdm >= 3 and $k->sdm <=6)){
    //             $minimum = min($miu_lansia1 , $miu_tidakpaham , $miu_weekday , $miu_sebentar, $miu_sdm2);
    //             array_push($alpha, $minimum);
    //             $hitung =100-($minimum*100);
    //             array_push($z, $hitung);
    //         } 
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         and ($k->hari == 'Weekday') 
    //         and ($k->operasional >=0 and $k->operasional <=120) 
    //         and ($k->sdm >= 0 and $k->sdm <=3)){
    //             $minimum = min($miu_lansia1 , $miu_tidakpaham , $miu_weekday , $miu_sebentar, $miu_sdm1);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         // }  
    //         }
    //     //RULES 2
    //     if(($k->umur >=45 and $k->umur <=59) 
    //     and ($k->kondisi == 'PAHAM') 
    //     ){
    //         $minimum = min($miu_pralansia2,$miu_paham);
    //         array_push($alpha, $minimum);
    //         $hitung = ($minimum*100)+0;
    //         array_push($z, $hitung);
    //     }
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         ){
    //             $minimum = min($miu_pralansia2 , $miu_tidakpaham);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'PAHAM') 
    //         ){
    //             $minimum = min($miu_lansia1,$miu_paham);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->kondisi == 'TIDAK PAHAM') 
    //         ){
    //             $minimum = min($miu_lansia1,$miu_tidakpaham);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=45 and $k->umur <=59)  
    //         and ($k->hari == 'Weekend') 
    //         ){
    //             $minimum = min($miu_pralansia2,$miu_weekend);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         and ($k->hari == 'Weekday') 
    //         ){
    //             $minimum = min($miu_pralansia2,$miu_weekend);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=45 and $k->umur <=59) 
    //         ){
    //             $minimum = $miu_pralansia2;
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         ){
    //             $minimum = $miu_lansia1;
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->hari == 'Weekend') 
    //     ){
    //             $minimum = min($miu_lansia1,$miu_weekend);
    //             array_push($alpha, $minimum);
    //             $hitung = ($minimum*100)+0;
    //             array_push($z, $hitung);
    //         }
    //         if(($k->umur >=60 and $k->umur <=80) 
    //         and ($k->hari == 'Weekday') 
    //     ){
    //             $minimum = min($miu_pralansia2 , $miu_weekend);
    //             array_push($alpha, $minimum);
    //             $hitung = 100-($minimum*100);
    //             array_push($z, $hitung);
    //         }
    //    }
      
    //     $size = count($alpha);
    //     $total = 0;
    //     $pembagi = 0;
    //     for ($i=0; $i <$size ; $i++) { 
    //         $total += $alpha[$i]*$z[$i];
    //         $pembagi += $alpha[$i];
    //     }
    //     $presentaseKehadiran = $total/$pembagi;

    //     return [$alpha,$z,$presentaseKehadiran];
        
            return view('hasilperhitungan',['kehadiran'=>$kehadiran]);
    }
}
