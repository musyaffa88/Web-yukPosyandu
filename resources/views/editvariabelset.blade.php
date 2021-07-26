@extends('main')

@section('title', 'Tambah Data Kehadiran')

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
<form action="{{url('/simpaneditvariabelset/'.$variabel_set->id)}}" method="post">
    @method('patch')
    @csrf
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Edit Himpunan</strong>
            </div>
            <div class="card-body">
                <div class="form-row">
                    {{-- <div class="form-group col-md-3">
                        <label>No Kehadiran</label>
                        <input type="number" name="id" class="form-control" id="inputEmail4" required="required">
                    </div> --}}
                    <div class="form-group col-md-3">
                    <label>Jenis Variabel</label>
                    <div>
                    <select name="variabel_id" data-placeholder="Choose a Country..." class="form-control" tabindex="1" required="required">
                        <option value="{{$variabel_set->variabel_id}}">{{$variabel_set->variabelnama}}</option>   
                        @foreach ($variabel as $v)
                                <option value="{{$v->id}}">{{$v->nama}}</option>
                            @endforeach
                        </select>
                  </div>
                  </div>
                  {{-- <div class="form-group col-md-3">
                    <label>Pertemuan</label>
                    <div>
                        <select name="pertemuan_id" data-placeholder="Choose a Country..." class="form-control" tabindex="1" required="required">
                            @foreach ($pertemuan as $p)
                                <option value="{{$p->id}}">{{$p->id}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div> --}}
                  {{-- <div class="form-group col-md-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" id="inputEmail4" required="required">
                </div>
                <div class="form-group col-md-3">
                  <label>Gender</label>
                  <div>
                      <select name="jenisKelamin" data-placeholder="Choose a Country..." class="form-control" tabindex="1" required="required">
                      <option value="L">L</option>
                      <option value="P">P</option>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="inputEmail4" required="required">
                </div>
                <div class="form-group col-md-3">
                    <label>No Telp</label>
                    <input type="number" name="telp" class="form-control" id="inputEmail4" required="required">
                </div> --}}
                <div class="form-group col-md-3">
                    <label>Nama Himpunan</label>
                <input type="text" name="nama" class="form-control" id="inputEmail4" value="{{$variabel_set->nama}}" required="required">
                </div>
                <div class="form-group col-md-3">
                    <label>Kode</label>
                    <input type="text" name="kode" class="form-control" id="inputEmail4" value="{{$variabel_set->kode}}" required="required">
                </div>
                <div class="form-group col-md-1">
                    <label>Range</label>
                    <input type="number" name="min" class="form-control" id="inputEmail4" value="{{$variabel_set->min}}"> 
                </div>
                    <div class="form-group col-md-1">
                        <label>+</label>
                        <input type="number" name="max" class="form-control" id="inputEmail4" value="{{$variabel_set->max}}">
                    </div>
                <div class="form-group col-md-3">
                  <label>Kurva</label>
                  <div>
                      <select name="kurva" data-placeholder="Choose a Country..." class="form-control" tabindex="1"  required="required">
                        <option value="{{$variabel_set->kurva}}">{{$variabel_set->kurva}}</option>
                        <option value="LINEAR NAIK">LINEAR NAIK</option>
                      <option value="LINEAR TURUN">LINEAR TURUN</option>
                      <option value="SEGITIGA">SEGITIGA</option>
                      <option value="TRAPESIUM">TRAPESIUM</option>
                      <option value="KURVA-S">KURVA-S</option>
                      <option value="KURVA-phi">KURVA-phi</option>
                    </select>
                  </div>
                </div>
            </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i>Simpan 
                      </button>
                      <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-undo"></i> <a href="/variabel">Kembali</a>
                      </button>
                    </div>
            </div>
        </div>
  </form>
@endsection