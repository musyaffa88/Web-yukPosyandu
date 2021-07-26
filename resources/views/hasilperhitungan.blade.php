@extends('main')

@section('title', 'Rekam Medis')

{{-- @section('nav')
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/home">yukPosyandu</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/home"> <i class="menu-icon fa fa-laptop"></i>Data</a>
                </li>
                <li class="active">
                    <a href="/rekam"> <i class="menu-icon fa fa-table"></i>Rekam Medis </a>
                </li>
                <li>
                    <a href="/hasil"> <i class="menu-icon fa fa-th"></i>Perhitungan</a>
                </li>

             
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
@endsection --}}

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Perhitungan</h1>
                
            </div>
            {{-- <div class="col-sm-5"> --}}
               
            {{-- </div> --}}
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <a class="nav-link" href="/logout"><i class="fa fa-power -off"></i>Logout</a>
                        {{-- <div class="user-area dropdown float-right"> --}}
                    
                {{-- </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('content')
<div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <div class="row">
            <div class="col-6">
                <strong class="card-title">Data Perhitungan</strong>
            </div>
            <div class="col-6">
                <div class="pull-right">
                    <a href="/hasil" class="btn btn-succes btn-sm">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
           
        </div>
        <div class="card-body">
  <table id="bootstrap-data-table" class="table table-striped table-bordered">
    {{-- <table id="bootstrap-data-table" class="table table-striped table-bordered"> --}}
    <thead>
      <tr>
        <th>No KIS</th>
        <th>Nama</th>
        <th>Usia (thn)</th>
        <th>Kondisi Tubuh</th>
        <th>Waktu (menit)</th>
        <th>Kader (orang)</th>
        <th>Hari</th>
        <th>Status Kehadiran</th>
        <th>Presentase Kehadiran</th>
        <th>Pilihan</th>
      </tr>
    </thead> 
    <tbody>
        @foreach ($kehadiran as $k)
        <tr>
            <td>{{$k->pasien_id}}</td>
            {{-- <td>{{$data->pertemuan_id}}</td> --}}
            <td>{{$k->nama}}</td>
            <td>{{$k->umur}}</td>
            <td>{{$k->kondisi}}</td>
            <td>{{$k->operasional}}</td>
            <td>{{$k->sdm}}</td>
            <td>{{$k->hari}}</td>
        @php 
        $alpha = array();
        $z = array();
        if ($k->umur < 45) {
            $miu_pralansia1 = 0;
        }
        if ($k->umur >= 45 and $k->umur <= 80) {
            $miu_pralansia2 = (59-$k->umur)/19;
            $miu_lansia1 = (80-$k->umur)/20;
        }
        if ($k->umur > 80) {
            $miu_lansia2 = 0;
        }
        if($k->kondisi == 'PAHAM'){
            $miu_paham = 1;
        }
        if($k->kondisi == 'TIDAK PAHAM'){
            $miu_tidakpaham = 0;
        }
        if($k->operasional >= 0 and $k->operasional <=240){
            $miu_sebentar = (120-$k->operasional)/120;
            $miu_lama = ($k->operasional-120)/120;
        }
        if($k->operasional > 240){
            $miu_operasional3 = 1;
        }

        if($k->sdm >= 0 and $k->sdm <= 6){
            $miu_sdm1 = (3-$k->sdm)/3;
            $miu_sdm2 = ($k->sdm-3)/3;
        }
        if($k->sdm > 6){
            $miu_sdm3 = 1;
        }
        if($k->hari == 'Weekend'){
            $miu_weekend = 1;
        }
        if($k->hari == 'Weekday'){
            $miu_weekday = 0;
        }

        // $minimum1 = min($miu_sebentar,$miu_lama);

        //RULES 1
        if(($k->umur >=45 and $k->umur <=59) 
        and ($k->kondisi == 'PAHAM') 
        and ($k->hari == 'Weekend') 
        and ($k->operasional >=120 and $k->operasional <=240) 
        and ($k->sdm >= 3 and $k->sdm <=6)){
            $minimum = min($miu_pralansia2 , $miu_paham , $miu_weekend , $miu_lama, $miu_sdm2);
            array_push($alpha, $minimum);
            $hitung = ($minimum*100)+0;
            array_push($z, $hitung);
        }
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->kondisi == 'PAHAM') 
            and ($k->hari == 'Weekend') 
            and ($k->operasional >=120 and $k->operasional <=240) 
            and ($k->sdm >= 0 and $k->sdm <=3)){
                $minimum = min($miu_pralansia2,$miu_paham,$miu_weekend,$miu_lama,$miu_sdm1);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->kondisi == 'PAHAM') 
            and ($k->hari == 'Weekend') 
            and ($k->operasional >=0 and $k->operasional <=120) 
            and ($k->sdm >= 3 and $k->sdm <=6)){
                $minimum = min($miu_pralansia2,$miu_paham,$miu_weekend,$miu_sebentar,$miu_sdm2);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->kondisi == 'PAHAM') 
            and ($k->hari == 'Weekend') 
            and ($k->operasional >=0 and $k->operasional <=120) 
            and ($k->sdm >= 0 and $k->sdm <=3)){
                $minimum = min($miu_pralansia2,$miu_paham,$miu_weekend,$miu_sebentar,$miu_sdm1);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            }
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->kondisi == 'PAHAM') 
            and ($k->hari == 'Weekday') 
            and ($k->operasional >=120 and $k->operasional <=240) 
            and ($k->sdm >= 3 and $k->sdm <=6)){
                $minimum = min($miu_pralansia2,$miu_paham,$miu_weekday,$miu_lama,$miu_sdm2);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->kondisi == 'PAHAM') 
            and ($k->hari == 'Weekday') 
            and ($k->operasional >=120 and $k->operasional <=240) 
            and ($k->sdm >= 0 and $k->sdm <=3)){
                $minimum = min($miu_pralansia2,$miu_paham,$miu_weekday,$miu_lama,$miu_sdm1);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->kondisi == 'PAHAM') 
            and ($k->hari == 'Weekday') 
            and ($k->operasional >=0 and $k->operasional <=120) 
            and ($k->sdm >= 3 and $k->sdm <=6)){
                $minimum = min($miu_pralansia2,$miu_paham,$miu_weekday,$miu_sebentar,$miu_sdm2);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->kondisi == 'PAHAM') 
            and ($k->hari == 'Weekday') 
            and ($k->operasional >=0 and $k->operasional <=120) 
            and ($k->sdm >= 0 and $k->sdm <=3)){
                $minimum = min($miu_pralansia2,$miu_paham,$miu_weekday,$miu_sebentar,$miu_sdm1);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            }
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            and ($k->hari == 'Weekend') 
            and ($k->operasional >=120 and $k->operasional <=240) 
            and ($k->sdm >= 3 and $k->sdm <=6)){
                $minimum = min($miu_pralansia2 , $miu_tidakpaham , $miu_weekend , $miu_lama, $miu_sdm2);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            and ($k->hari == 'Weekend') 
            and ($k->operasional >=120 and $k->operasional <=240) 
            and ($k->sdm >= 0 and $k->sdm <=3)){
                $minimum = min($miu_pralansia2 , $miu_tidakpaham , $miu_weekend , $miu_lama, $miu_sdm1);
                array_push($alpha, $minimum);
                $hitung =100-($minimum*100);
                array_push($z, $hitung);
            }
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            and ($k->hari == 'Weekend') 
            and ($k->operasional >=0 and $k->operasional <=120) 
            and ($k->sdm >= 3 and $k->sdm <=6)){
                $minimum = min($miu_pralansia2 , $miu_tidakpaham , $miu_weekend , $miu_sebentar, $miu_sdm2);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            and ($k->hari == 'Weekend') 
            and ($k->operasional >=0 and $k->operasional <=120) 
            and ($k->sdm >= 0 and $k->sdm <=3)){
                $minimum = min($miu_pralansia2 , $miu_tidakpaham , $miu_weekend , $miu_sebentar, $miu_sdm1);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            }
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            and ($k->hari == 'Weekday') 
            and ($k->operasional >=120 and $k->operasional <=240) 
            and ($k->sdm >= 3 and $k->sdm <=6)){
                $minimum = min($miu_pralansia2 , $miu_tidakpaham , $miu_weekday , $miu_lama, $miu_sdm2);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            } 
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            and ($k->hari == 'Weekday') 
            and ($k->operasional >=120 and $k->operasional <=240) 
            and ($k->sdm >= 0 and $k->sdm <=3)){
                $minimum = min($miu_pralansia2 , $miu_tidakpaham , $miu_weekday , $miu_lama, $miu_sdm1);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            }
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            and ($k->hari == 'Weekday') 
            and ($k->operasional >=0 and $k->operasional <=120) 
            and ($k->sdm >= 3 and $k->sdm <=6)){
                $minimum = min($miu_pralansia2 , $miu_tidakpaham , $miu_weekday , $miu_sebentar, $miu_sdm2);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            } 
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            and ($k->hari == 'Weekday') 
            and ($k->operasional >=0 and $k->operasional <=120) 
            and ($k->sdm >= 0 and $k->sdm <=3)){
                $minimum = min($miu_pralansia2 , $miu_tidakpaham , $miu_weekday , $miu_sebentar, $miu_sdm1);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            }  
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'PAHAM') 
            and ($k->hari == 'Weekend') 
            and ($k->operasional >=120 and $k->operasional <=240) 
            and ($k->sdm >= 3 and $k->sdm <=6)){
                $minimum = min($miu_lansia1 , $miu_paham , $miu_weekend , $miu_lama, $miu_sdm2);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'PAHAM') 
            and ($k->hari == 'Weekend') 
            and ($k->operasional >=120 and $k->operasional <=240) 
            and ($k->sdm >= 0 and $k->sdm <=3)){
                $minimum = min($miu_lansia1,$miu_paham,$miu_weekend,$miu_lama,$miu_sdm1);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'PAHAM') 
            and ($k->hari == 'Weekend') 
            and ($k->operasional >=0 and $k->operasional <=120) 
            and ($k->sdm >= 3 and $k->sdm <=6)){
                $minimum = min($miu_lansia1,$miu_paham,$miu_weekend,$miu_sebentar,$miu_sdm2);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'PAHAM') 
            and ($k->hari == 'Weekend') 
            and ($k->operasional >=0 and $k->operasional <=120) 
            and ($k->sdm >= 0 and $k->sdm <=3)){
                $minimum = min($miu_lansia1,$miu_paham,$miu_weekend,$miu_sebentar,$miu_sdm1);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'PAHAM') 
            and ($k->hari == 'Weekday') 
            and ($k->operasional >=120 and $k->operasional <=240) 
            and ($k->sdm >= 3 and $k->sdm <=6)){
                $minimum = min($miu_lansia1,$miu_paham,$miu_weekday,$miu_lama,$miu_sdm2);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'PAHAM') 
            and ($k->hari == 'Weekday') 
            and ($k->operasional >=120 and $k->operasional <=240) 
            and ($k->sdm >= 0 and $k->sdm <=3)){
                $minimum = min($miu_lansia1,$miu_paham,$miu_weekday,$miu_lama,$miu_sdm1);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'PAHAM') 
            and ($k->hari == 'Weekday') 
            and ($k->operasional >=0 and $k->operasional <=120) 
            and ($k->sdm >= 3 and $k->sdm <=6)){
                $minimum = min($miu_lansia1,$miu_paham,$miu_weekday,$miu_sebentar,$miu_sdm2);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'PAHAM') 
            and ($k->hari == 'Weekday') 
            and ($k->operasional >=0 and $k->operasional <=120) 
            and ($k->sdm >= 0 and $k->sdm <=3)){
                $minimum = min($miu_lansia1,$miu_paham,$miu_weekday,$miu_sebentar,$miu_sdm1);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            and ($k->hari == 'Weekend') 
            and ($k->operasional >=120 and $k->operasional <=240) 
            and ($k->sdm >= 3 and $k->sdm <=6)){
                $minimum = min($miu_lansia1 , $miu_tidakpaham , $miu_weekend , $miu_lama, $miu_sdm2);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            and ($k->hari == 'Weekend') 
            and ($k->operasional >=120 and $k->operasional <=240) 
            and ($k->sdm >= 0 and $k->sdm <=3)){
                $minimum = min($miu_lansia1 , $miu_tidakpaham , $miu_weekend , $miu_lama, $miu_sdm1);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            and ($k->hari == 'Weekend') 
            and ($k->operasional >=0 and $k->operasional <=120) 
            and ($k->sdm >= 3 and $k->sdm <=6)){
                $minimum = min($miu_lansia1 , $miu_tidakpaham , $miu_weekend , $miu_sebentar, $miu_sdm2);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            and ($k->hari == 'Weekend') 
            and ($k->operasional >=0 and $k->operasional <=120) 
            and ($k->sdm >= 0 and $k->sdm <=3)){
                $minimum = min($miu_lansia1 , $miu_tidakpaham , $miu_weekend , $miu_sebentar, $miu_sdm1);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            and ($k->hari == 'Weekday') 
            and ($k->operasional >=120 and $k->operasional <=240) 
            and ($k->sdm >= 3 and $k->sdm <=6)){
                $minimum = min($miu_lansia1 , $miu_tidakpaham , $miu_weekday , $miu_lama, $miu_sdm2);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            } 
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            and ($k->hari == 'Weekday') 
            and ($k->operasional >=120 and $k->operasional <=240) 
            and ($k->sdm >= 0 and $k->sdm <=3)){
                $minimum = min($miu_lansia1 , $miu_tidakpaham , $miu_weekday , $miu_lama, $miu_sdm1);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            and ($k->hari == 'Weekday') 
            and ($k->operasional >=0 and $k->operasional <=120) 
            and ($k->sdm >= 3 and $k->sdm <=6)){
                $minimum = min($miu_lansia1 , $miu_tidakpaham , $miu_weekday , $miu_sebentar, $miu_sdm2);
                array_push($alpha, $minimum);
                $hitung =100-($minimum*100);
                array_push($z, $hitung);
            } 
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            and ($k->hari == 'Weekday') 
            and ($k->operasional >=0 and $k->operasional <=120) 
            and ($k->sdm >= 0 and $k->sdm <=3)){
                $minimum = min($miu_lansia1 , $miu_tidakpaham , $miu_weekday , $miu_sebentar, $miu_sdm1);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            // }  
            }
        //RULES 2
        if(($k->umur >=45 and $k->umur <=59) 
        and ($k->kondisi == 'PAHAM') 
        ){
            $minimum = min($miu_pralansia2,$miu_paham);
            array_push($alpha, $minimum);
            $hitung = ($minimum*100)+0;
            array_push($z, $hitung);
        }
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            ){
                $minimum = min($miu_pralansia2 , $miu_tidakpaham);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'PAHAM') 
            ){
                $minimum = min($miu_lansia1,$miu_paham);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->kondisi == 'TIDAK PAHAM') 
            ){
                $minimum = min($miu_lansia1,$miu_tidakpaham);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            }
            if(($k->umur >=45 and $k->umur <=59)  
            and ($k->hari == 'Weekend') 
            ){
                $minimum = min($miu_pralansia2,$miu_weekend);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=45 and $k->umur <=59) 
            and ($k->hari == 'Weekday') 
            ){
                $minimum = min($miu_pralansia2,$miu_weekend);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            }
            if(($k->umur >=45 and $k->umur <=59) 
            ){
                $minimum = $miu_pralansia2;
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            ){
                $minimum = $miu_lansia1;
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->hari == 'Weekend') 
        ){
                $minimum = min($miu_lansia1,$miu_weekend);
                array_push($alpha, $minimum);
                $hitung = ($minimum*100)+0;
                array_push($z, $hitung);
            }
            if(($k->umur >=60 and $k->umur <=80) 
            and ($k->hari == 'Weekday') 
        ){
                $minimum = min($miu_pralansia2 , $miu_weekend);
                array_push($alpha, $minimum);
                $hitung = 100-($minimum*100);
                array_push($z, $hitung);
            }
       
      
        $size = count($alpha);
        $total = 0;
        $pembagi = 0;
        for ($i=0; $i <$size ; $i++) { 
            $total += $alpha[$i]*$z[$i];
            $pembagi += $alpha[$i];
        }
        $presentaseKehadiran = $total/$pembagi;
        $sub = substr($presentaseKehadiran,0,5);
        if ($presentaseKehadiran < 50) {
            $status = "RENDAH";
        }
        else {
            $status = "TINGGI";
        }
        @endphp
                <td>{{$status}}</td>
                <td>{{$sub}} %</td>
                <td class="text-center">
                    <a href="/detailperhitungan/{{$k->id}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-book"></i>Detail
                    </a>
                </td>
                {{-- <td>{{$data->tekanan}}</td> --}}
            </tr>
        @endforeach
    </tbody>
   
</table>
        </div>
    </div>
</div>
</div> <!-- .content -->
@endsection