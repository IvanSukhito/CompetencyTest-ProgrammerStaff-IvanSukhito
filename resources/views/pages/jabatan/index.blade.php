@extends('layouts.master')

@section('content')
 <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data Jabatan
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('beranda') }} "><i class="fa fa-home"></i> Home</a></li>
          <li><a href="{{ route('jabatan.index') }}">Jabatan</a></li>
          <li class="active">List</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                List
              </h3>

              <div class="box-tools">
                <form action="" class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="keyword" class="form-control pull-right" placeholder="Search" value="{{ old('keyword', request()->get('keyword')) }}">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    <a href="{{ route('jabatan.index') }}" class="btn btn-success"><i class="fa fa-refresh"></i></a>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Jabatan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse($getDataJabatan as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->nama_jabatan}}</td>
                  <td>
                    <div class="btn-group">
                        <a href="#" class="btn btn-info btn-sm">Detail</a>
                        <a href="#" class="btn btn-warning btn-sm">Ubah</a>
                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                    </div>
                  </td>
                </tr>
                @empty
                    <tr>
                      <td colspan="4" class="text-center">Tidak menemukan data.</td>
                    </tr>
                @endforelse
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-xs-6">
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Jabatan</h3>
            </div>  
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
                
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>

                  <div class="col-sm-10">
                    <input type="nama_jabatan" class="form-control" id="inputEmail3" placeholder="isi jabatan">
                  </div>
                </div>
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>   
        </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
@endsection