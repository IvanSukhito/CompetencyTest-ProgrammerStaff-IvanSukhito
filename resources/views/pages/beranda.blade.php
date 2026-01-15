@extends('layouts.master')
@section('content')
<div class="container">
      <!--  Header -->
        <section class="content-header">
          <h1>
            Beranda
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('beranda') }}"><i class="fa fa-home"></i> Home</a></li>
          </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
        <div class="row">
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Selamat Datang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a href="{{ route('karyawan.index') }}">
                        Menu Karyawan
                      </a>
                    </h4>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a href="{{ route('jabatan.index') }}">
                        Menu Jabatan
                      </a>
                    </h4>
                  </div>
                </div>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a href="{{ route('kota.index') }}">
                        Menu Kota
                      </a>
                    </h4>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <!-- perhitungan tanggal -->
       
        <div class="col-md-6">
        @if(isset($hasil))
          <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <strong>Hasil : {{ isset($hasil) ? $hasil['tahun'] . ' Tahun, ' . $hasil['bulan'] . ' Bulan, ' . $hasil['hari'] . ' Hari atau Total Selisih ' . $hasil['total_hari'] . ' Hari' : '' }} </strong>
          </div>
        @endif
        
        <form action="{{ route('kalkulasi-tanggal') }}" method="POST" class="form-horizontal">
        @csrf
            <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-calculator"></i>

              <h3 class="box-title">Function Perhitungan Selisih Tanggal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <label for="date_1" class="col-sm-4 control-label">Masukan Tanggal Pertama</label>
                    <div class="col-sm-6">
                      <input type="date" class="form-control" id="date_1" name="date_1">
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="date_2" class="col-sm-4 control-label">Masukan Tanggal Kedua</label>
                    <div class="col-sm-6">
                      <input type="date" class="form-control" id="date_2" name="date_2">
                    </div>
                </div>
            </div>
            <div class="box-footer">
                   <button type="reset" class="btn btn-default">Reset</button>
                   <button type="submit" class="btn btn-info pull-right">Hitung</button>
            </div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
        </form>
        </div>
        </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.container -->
@endsection