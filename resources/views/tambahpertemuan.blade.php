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
                <li class="active">
                    <a href="/home"> <i class="menu-icon fa fa-laptop"></i>Data</a>
                </li>
                <li>
                    <a href="/rekam"> <i class="menu-icon fa fa-table"></i>Rekam Medis </a>
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
@section('content')
<form action="{{url('/simpanpertemuan')}}" method="post">
    @csrf
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Tambah Data Pertemuan</strong>
            </div>
            <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                      <label>Pertemuan</label>
                      <input type="number" name="id" class="form-control" id="inputEmail4" required="required">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Posyandu</label>
                    <div>
                        <select name="posyandu_id" data-placeholder="Choose a Country..." class="form-control" tabindex="1" required="required">
                            @foreach ($posyandu as $p)
                        <option value="{{$p->id}}">{{$p->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <label>Operasional (menit)</label>
                    <input name="waktu" type="number" class="form-control" id="inputAddress" required="required">
                  </div>
                  <div class="form-group">
                    <label>Kader (orang)</label>
                    <input name="kader" type="number" class="form-control" id="inputAddress2" required="required"> 
                  </div>
                  <div class="form-group">
                      <label>Hari</label>
                      <div>
                          <select name="hari"  class="standardSelect" tabindex="1" required="required">
                              <option value="">Pilih Satu</option>
                              <option value="Weekend">Weekend</option>
                              <option value="Weekday">Weekday</option>
                          </select>
                      </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                      <i class="fa fa-plus"></i>Tambah 
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                      <i class="fa fa-undo"></i> <a href="/home">Kembali</a>
                    </button>
                  </div>
            </div>
        </div>
  </form>
@endsection