@extends('main')

@section('title', 'Tambah Pertemuan')

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
                    <a href="/rekam"> <i class="menu-icon fa fa-table"></i>Rekam Medis </a>
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
@section('content')
<form action="{{url('/simpaneditvariabel/'.$variabel->id)}}" method="post">
    @method('patch')
    @csrf
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Edit Data Variabel</strong>
            </div>
            <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                      <label>Nama Variabel</label>
                  <input type="text" name="nama" class="form-control" id="inputEmail4" value="{{$variabel->nama}}" required="required">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Kategori</label>
                    <div>
                        <select name="kategori" data-placeholder="Choose a Country..." class="form-control" tabindex="1" required="required">
                        <option value="{{$variabel->kategori}}">{{$variabel->kategori}}</option>
                        <option value="Fuzzy">Fuzzy</option>
                        <option value="Crisp">Crisp</option>
                        </select>
                    </div>
                  </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                      <i class="fa fa-dot-circle-o"></i>TSimpan 
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                      <i class="fa fa-undo"></i> <a href="/variabel">Kembali</a>
                    </button>
                  </div>
            </div>
        </div>
  </form>
@endsection