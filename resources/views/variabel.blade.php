@extends('main')

@section('title', 'Variabel dan Aturan')

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
                <li class="active">
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
    <div class="col-sm-6">
        <div class="page-header float-left">
            <div class="page-title">
                <h3>Variabel dan Himpunan</h3>
            </div>
            {{-- <div class="col-sm-5"> --}}
               
            {{-- </div> --}}
        </div>
    </div>
    <div class="col-sm-6">
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
                <strong class="card-title">Data Variabel</strong>
            </div>
            <div class="col-6">
                <div class="pull-right">
                    <a href="/tambahvariabel" class="btn btn-succes btn-sm">
                        <li class="fa fa-plus"></li>Tambah Variabel
                    </a>
                </div>
            </div>
        </div>
           
        </div>
        <div class="card-body">
  <table id="bootstrap-data-table" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Variabel</th>
        <th>Kategori</th>
        <th>Pilihan</th>
      </tr>
    </thead> 
    <tbody>
        @php
        $n=1;    
        @endphp
        @foreach ($variabel as $data)
            <tr>
                <td>{{$n}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->kategori}}</td>
                <td class="text-center">
                    <a href="/editvariabel/{{$data->id}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                    <form action="{{url('/hapusvariabel/'.$data->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
            </tr>
            @php
            $n++;
            @endphp
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
                <strong class="card-title">Data Himpunan</strong>
            </div>
            <div class="col-6">
                <div class="pull-right">
                    <a href="/tambahvariabelset" class="btn btn-succes btn-sm">
                        <li class="fa fa-plus"></li>Tambah Himpunan
                    </a>
                </div>
            </div>
        </div>
           
        </div>
        <div class="card-body">
  <table id="bootstrap-data-table" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Jenis Variabel</th>
        <th>Nama Himpunan</th>
        <th>Range</th>
        <th>Kode Himpunan</th>
        <th>Kurva</th>
        <th>Pilihan</th>
      </tr>
    </thead> 
    <tbody>
        @php
        $n=1;    
        @endphp
        @foreach ($variabel_set as $data)
            <tr>
                <td>{{$n}}</td>
                <td>{{$data->variabelnama}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->min}} - {{$data->max}}</td>
                <td>{{$data->kode}}</td>
                <td>{{$data->kurva}}</td>
                <td class="text-center">
                    <a href="/editvariabelset/{{$data->id}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                    <form action="{{url('/hapusvariabelset/'.$data->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
            </tr>
            @php
            $n++;
            @endphp
        @endforeach
    </tbody>
   
</table>
        </div>
    </div>
</div>
</div> <!-- .content -->
@endsection