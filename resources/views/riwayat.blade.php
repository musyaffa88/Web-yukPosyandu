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
                <h3>Riwayat Pasien</h3>
                
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
                <strong class="card-title">Riwayat Pasien</strong>
            </div>
            <div class="col-6">
                <div class="pull-right">
                    <a href="/home" class="btn btn-succes btn-sm">
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
        <th>Pertemuan</th>
        {{-- <th>Nama</th>
        <th>L/P</th>
        <th>Alamat</th>
        <th>No Telp</th> --}}
        <th>Kondisi Tubuh</th>
        <th>Usia (thn)</th>
        <th>TB (cm)</th>
        <th>BB (kg)</th>
        <th>TD (mmHg)</th>
      </tr>
    </thead> 
    <tbody>
        @foreach ($kehadiran as $data)
            <tr>
                <td>{{$data->pasien_id}}</td>
                <td>{{$data->pertemuan_id}}</td>
                {{-- <td>{{$data->nama}}</td>
                <td>{{$data->jenisKelamin}}</td>
                <td>{{$data->alamat}}</td>
                <td>{{$data->telp}}</td> --}}
                <td>{{$data->kondisi}}</td>
                <td>{{$data->umur}}</td>
                <td>{{$data->tinggi}}</td>
                <td>{{$data->berat}}</td>
                <td>{{$data->tekanan}}</td>
            </tr>
        @endforeach
    </tbody>
   
</table>
        </div>
    </div>
</div>
</div> <!-- .content -->
@endsection