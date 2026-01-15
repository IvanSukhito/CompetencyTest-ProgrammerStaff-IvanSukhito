@extends('layouts.master')

@section('content')
<div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Form Karyawan
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('beranda') }}"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="{{ route('karyawan.index') }}">Karyawan</a></li>
          <li class="active">Form</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-xs-8">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="{{ route('karyawan.store') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="box-body">
                  <div class="form-group">
                    <label for="jabatan" class="col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" name="jabatan" style="width: 100%;">
                        <option selected="selected" value="0">Cari Jabatan</option>
                        @foreach($getDataJabatan as $dataJabatan)
                        <option value="{{$dataJabatan->id}}">{{ $dataJabatan->nama_jabatan }}</option>
                        @endforeach
                    </select>
                    @error('jabatan')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>  
                  </div>
                  <div class="form-group">
                    <label for="kota" class="col-sm-2 control-label">Kota</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" name="kota" style="width: 100%;">
                        <option selected="selected" value="0">Cari Kota</option>
                        @foreach($getDataKota as $dataKota)
                        <option value="{{$dataKota->id}}">{{ $dataKota->nama_kota }}</option>
                        @endforeach
                    </select>
                    @error('kota')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>  
                  </div>
                  <div class="form-group">
                    <label for="nama_karyawan" class="col-sm-2 control-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Nama Karyawan">
                        @error('nama_karyawan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        @error('tanggal_lahir')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <a href="{{ route('karyawan.index') }}" class="btn btn-danger">Batalkan</a>
                  <button type="submit" class="btn btn-info pull-right">Simpan</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
            </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
@stop
@section('footer-script')
<!-- Select2 -->
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements       
    $('.select2').select2()
    })
</script>   
@endsection