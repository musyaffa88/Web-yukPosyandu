@extends('main')

@section('title', 'Data')

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
                <li class="active">
                    <a href="/home"> <i class="menu-icon fa fa-laptop"></i>Data</a>
                </li>
                <li>
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
                <h3>Data</h3>
                
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
    <div class="content mt-3">
        <div class="animated fadeIn">
            @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Posyandu</strong>
                    </div>
                    <div class="card-body">
                        {{-- <table id="bootstrap-data-table" class="table table-striped table-bordered"> --}}
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Posyandu</th>
                            <th>Alamat</th>
                        </tr>
                        </thead> 
                        <tbody>
                            @foreach ($posyandu as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->alamat}}</td>
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
                            <strong class="card-title">Data Pertemuan</strong>
                        </div>
                        <div class="col-6">
                            <div class="pull-right">
                                <a href="/tambahpertemuan" class="btn btn-succes btn-sm">
                                    <li class="fa fa-plus"></li>Tambah Pertemuan
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
                    <th>Pertemuan</th>
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
                            <td>{{$data->operasional}}</td>
                            <td>{{$data->sdm}}</td>
                            <td>{{$data->hari}}</td>
                            <td class="text-center">
                            <a href="/editpertemuan/{{$data->id}}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>
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
                            <strong class="card-title">Data Pasien</strong>
                        </div>
                        <div class="col-6">
                            <div class="pull-right">
                                <a href="/tambahpasien" class="btn btn-succes btn-sm">
                                    <li class="fa fa-plus"></li>Tambah Data Pasien
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
                    {{-- <th>Pertemuan</th> --}}
                    <th>Nama</th>
                    <th>L/P</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    {{-- <th>Paham Kondisi Tubuh</th>
                    <th>Usia (thn)</th>
                    <th>TB (cm)</th>
                    <th>BB (kg)</th>
                    <th>TD (mmHg)</th> --}}
                    <th>Pilihan</th>
                  </tr>
                </thead> 
                <tbody>
                    @foreach ($pasien as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            {{-- <td>{{$data->pertemuan_id}}</td> --}}
                            <td>{{$data->nama}}</td>
                            <td>{{$data->jenisKelamin}}</td>
                            <td>{{$data->alamat}}</td>
                            <td>{{$data->telp}}</td>
                            {{-- <td>{{$data->kondisi}}</td>
                            <td>{{$data->umur}}</td>
                            <td>{{$data->tinggi}}</td>
                            <td>{{$data->berat}}</td>
                            <td>{{$data->tekanan}}</td> --}}
                            <td class="text-center">
                            <a href="/editpasien/{{$data->id}}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            <form action="{{url('/hapuspasien/'.$data->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                <a href="/riwayatpasien/{{$data->id}}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-book"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
               
            </table>
                    </div>
                </div>
            </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection