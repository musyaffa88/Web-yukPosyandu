@extends('main')

@section('title', 'Perhitungan')

@section('nav')
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
                <li>
                    <a href="/rekam"> <i class="menu-icon fa fa-table"></i>Kehadiran</a>
                </li>
                <li>
                    <a href="/variabel"> <i class="menu-icon fa fa-book"></i>Variabel dan Himpunan</a>
                </li>
                <li class="active">
                    <a href="/hasil"> <i class="menu-icon fa fa-th"></i>Perhitungan</a>
                </li>

             
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
@endsection

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h3>Perhitungan</h3>
                
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
        </div>
           
        </div>
        <div class="card-body">
  <table id="bootstrap-data-table" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Pertemuan</th>
        <th>Nama Posyandu</th>
        <th>Waktu (menit)</th>
        <th>Kader (orang)</th>
        <th>Hari</th>
        <th>Pilihan</th>
      </tr>
    </thead> 
    <tbody>
        @foreach ($pertemuan as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->operasional}}</td>
                <td>{{$data->sdm}}</td>
                <td>{{$data->hari}}</td>
                <td class="text-center">
                    <a href="/lihatperhitungan/{{$data->id}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-book"></i>Perhitungan
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
   
</table>
        </div>
    </div>
</div>
</div> <!-- .content -->
@endsection