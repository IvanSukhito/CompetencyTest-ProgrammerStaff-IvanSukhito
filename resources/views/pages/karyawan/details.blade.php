@extends('layouts.master')
@section('content')
<div class="container">
      <!-- Header -->
      <section class="content-header">
        <h1>
          Detail Karyawan
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('beranda') }}"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="{{ route('karyawan.index') }}">Karyawan</a></li>
          <li class="active">Detail</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-xs-8">
            <div class="box box-info">
              <div class="box-header with-border">
                <a href="{{ route('karyawan.index') }}" class="btn btn-sm btn-danger">Kembali</a>
              </div>
              
              <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Karyawan</th>
                        <td>{{ $getDataKaryawan->nama_karyawan }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $getDataKaryawan->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>{{ $getDataKaryawan->jabatan->nama_jabatan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Kota</th>
                        <td>{{ $getDataKaryawan->kota->nama_kota ?? '-' }}</td>
                    </tr>
                </table>
              </div>
            </div>
            </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
@endsection