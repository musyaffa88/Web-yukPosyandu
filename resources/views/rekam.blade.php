@extends('main')

@section('title', 'Rekam Medis')

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
                <li class="active">
                    <a href="/rekam"> <i class="menu-icon fa fa-table"></i>Kehadiran</a>
                </li>
                <li>
                    <a href="/variabel"> <i class="menu-icon fa fa-book"></i>Variabel dan Himpunan</a>
                </li>
                <li>
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
                <h3>Kehadiran</h3>
                
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
                    <strong class="card-title">Data Kehadiran</strong>
                </div>
                <div class="col-6">
                    <div class="pull-right">
                    <a href="/tambahkehadiran" class="btn btn-succes btn-sm">
                            <li class="fa fa-plus"></li>Tambah Data Kehadiran
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
            {{-- <td>No</td> --}}
            <th>No KIS</th>
            <th>Pertemuan</th>
            <th>Nama</th>
            <th>L/P</th>
            {{-- <th>Alamat</th>
            <th>No Telp</th> --}}
            <th>Kondisi Tubuh</th>
            <th>Usia (thn)</th>
            <th>TB (cm)</th>
            <th>BB (kg)</th>
            <th>TD (mmHg)</th>
            <th>Pilihan</th>
          </tr>
        </thead> 
        <tbody>
            @foreach ($kehadiran as $k)
                <tr>
                    {{-- <td>{{$k->id}}</td> --}}
                    <td>{{$k->pasien_id}}</td>
                    <td>{{$k->pertemuan_id}}</td>
                    <td>{{$k->nama}}</td>
                    <td>{{$k->jenisKelamin}}</td>
                    {{-- <td>{{$data->alamat}}</td>
                    <td>{{$data->telp}}</td> --}}
                    <td>{{$k->kondisi}}</td>
                    <td>{{$k->umur}}</td>
                    <td>{{$k->tinggi}}</td>
                    <td>{{$k->berat}}</td>
                    <td>{{$k->tekanan}}</td>
                    <td class="text-center">
                        <a href="/editkehadiran/{{$k->id}}" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>
                        <form action="{{url('/hapuskehadiran/'.$k->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
       
    </table>
            </div>
        </div>
    </div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <div class="row">
            <div class="col-6">
                <strong class="card-title">Data Kehadiran Pasien</strong>
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
                    <a href="/lihatkehadiran/{{$data->id}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-book"></i>Data Kehadiran
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