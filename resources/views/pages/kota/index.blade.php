@extends('layouts.master')

@section('content')
<div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data Kota
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('beranda') }} "><i class="fa fa-home"></i> Home</a></li>
          <li><a href="{{ route('kota.index') }}">Kota</a></li>
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
                    <a href="{{ route('kota.index') }}" class="btn btn-success"><i class="fa fa-refresh"></i></a>
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
                  <th>Kota</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody> 
                <?php $no=1;?>
                @forelse($getDataKota as $data)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data->nama_kota}}</td>
                  <td>
                    <div class="btn-group">
                        <a href="{{ route('kota.show', ['kota' => $data->id]) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('kota.edit', ['kota' => $data->id]) }}" class="btn btn-warning btn-sm">Ubah</a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $data->id }}">
                            Hapus
                        </button>
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

        <!-- form -->
        <div class="col-xs-6">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Selamat!</strong> {{ session('success') }}
            </div>
            @endif
            <div class="box {{ isset($editData) ? 'box-primary': (isset($detailData) ? 'box-warning' : 'box-info') }}">
            <div class="box-header with-border">
                <h3 class="box-title">
                {{ isset($editData) ? ' Form Ubah Kota' : (isset($detailData) ? 'Form Detail Kota' : 'Form Tambah Kota') }}                
                </h3>
            </div>  
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ isset($editData) ? route('kota.update', $editData->id) : route('kota.store') }}" method="POST" class="form-horizontal">
            @csrf
            @if(isset($editData))
                @method('PUT') 
            @endif
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">kota</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_kota" class="form-control" value="{{ $editData->nama_kota ?? ($detailData->nama_kota ?? old('nama_kota'))  }}" placeholder="isi kota" {{ isset($detailData) ? 'readonly' : '' }}>
                     @error('nama_kota')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>  
                </div>  
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                @if(isset($detailData) || isset($editData))
                    <a href="{{ route('kota.index') }}" class="btn btn-default">Kembali</a>
                @else
                    <button type="reset" class="btn btn-default">Reset</button>
                @endif 

                @if(!isset($detailData))
                    <button type="submit" class="btn btn-info pull-right">Simpan</button>
                @endif
              </div>
              <!-- /.box-footer -->
            </form>   
        </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->

    <!-- modal delete data -->
    @foreach($getDataKota as $data)
    <div class="modal fade in" id="delete-{{ $data->id }}">
      <div class="modal-dialog">
        <form method="POST" class="modal-content" action="{{ route('kota.destroy', ['kota' => $data->id]) }}">
        @method('DELETE')
        @csrf  
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Hapus Data</h4>
          </div>
          <div class="modal-body">
            <b>{{ $data->nama_kota }}</b><p>Akan dihapus, Apakah anda yakin ?</p>
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </form>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    @endforeach
@endsection