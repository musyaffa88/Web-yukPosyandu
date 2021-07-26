@extends('main')

@section('title', 'Edit Data Pasien')

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
<form action="{{url('/simpaneditpasien/'.$pasien->id)}}" method="post">
    @method('patch')
    @csrf
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Edit Data Pasien</strong>
            </div>
            <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-3">
                      <label>No KIS</label>
                      <input type="number" name="id" class="form-control" id="inputEmail4" value="{{$pasien->id}}"required="required">
                  </div>
                  {{-- <div class="form-group col-md-6">
                    <label>Pertemuan</label>
                    <div>
                        <select name="pertemuan_id" data-placeholder="Choose a Country..." class="form-control" tabindex="1" value="{{$pasien->pertemuan_id}}" required="required">
                            @foreach ($pertemuan as $p)
                        <option value="{{$p->id}}">{{$p->id}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                  {{-- </div> --}}
                  <div class="form-group col-md-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" id="inputEmail4"value="{{$pasien->nama}}" required="required">
                </div>
                <div class="form-group col-md-3">
                  <label>Gender</label>
                  <div>
                      <select name="jenisKelamin" data-placeholder="Choose a Country..." class="form-control" tabindex="1" value="{{$pasien->jenisKelamin}}" required="required">
                      <option value="L">L</option>
                      <option value="P">P</option>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="inputEmail4" value="{{$pasien->alamat}}" required="required">
                </div>
                <div class="form-group col-md-3">
                    <label>No Telp</label>
                    <input type="number" name="telp" class="form-control" id="inputEmail4" value="{{$pasien->telp}}" required="required">
                </div>
                {{-- <div class="form-group col-md-6">
                  <label>Paham Kondisi Tubuh</label>
                  <div>
                      <select name="kondisi" data-placeholder="Choose a Country..." class="form-control" tabindex="1" value="{{$pasien->kondisi}}" required="required">
                      <option value="YA">YA</option>
                      <option value="TIDAK">TIDAK</option>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-3">
                    <label>Usia</label>
                    <input type="number" name="umur" class="form-control" id="inputEmail4" value="{{$pasien->umur}}" required="required">
                </div>
                <div class="form-group col-md-3">
                    <label>Tinggi Badan</label>
                    <input type="number" name="tinggi" class="form-control" id="inputEmail4" value="{{$pasien->tinggi}}" required="required">
                </div>
                <div class="form-group col-md-3">
                    <label>Berat Badan</label>
                    <input type="number" name="berat" class="form-control" id="inputEmail4" value="{{$pasien->berat}}" required="required">
                </div>
                <div class="form-group col-md-3">
                    <label>Tekanan Darah</label>
                    <input type="number" name="tekanan" class="form-control" id="inputEmail4" value="{{$pasien->tekanan}}" required="required">
                </div> --}}
            </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                      <i class="fa fa-dot-circle-o"></i>Simpan 
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                      <i class="fa fa-undo"></i> <a href="/home">Kembali</a>
                    </button>
                  </div>
            </div>
        </div>
  </form>
@endsection