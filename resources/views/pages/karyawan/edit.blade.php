@extends('layouts.master')
@section('content')
<div class="container">
      <!--  Header -->
      <section class="content-header">
        <h1>
          Form Karyawan
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
            <div class="col-xs-6">
            <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                Ubah Karyawan                
                </h3>
            </div>  
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('karyawan.update', $editData->id) }}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT') 

                <div class="box-body">
                                    <div class="form-group">
                    <label for="jabatan" class="col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" name="jabatan">
                        <option selected="selected" value="0">Cari Jabatan</option>
                        @foreach($getDataJabatan as $dataJabatan)
                        @if(intval($dataJabatan->id) == intval($editData->jabatan_id))
                        <option value="{{$dataJabatan->id}}" selected>{{ $dataJabatan->nama_jabatan }}</option>
                        @else
                        <option value="{{$dataJabatan->id}}">{{ $dataJabatan->nama_jabatan }}</option>
                        @endif
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
                    <select class="form-control select2" name="kota">
                        <option selected="selected" value="0">Cari Kota</option>
                        @foreach($getDataKota as $dataKota)
                        @if(intval($dataKota->id) == intval($editData->kota_id))
                        <option value="{{$dataKota->id}}" selected>{{ $dataKota->nama_kota }}</option>
                        @else
                        <option value="{{$dataKota->id}}">{{ $dataKota->nama_kota }}</option>
                        @endif
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
                    <input type="text" name="nama_karyawan" class="form-control" value="{{ $editData->nama_karyawan ?? ($detailData->nama_karyawan ?? old('nama_karyawan'))  }}" placeholder="isi nama karyawan">
                    @error('nama_karyawan')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>  
                </div>  
                <div class="form-group">
                  <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $editData->tanggal_lahir ?? ($detailData->tanggal_lahir ?? old('tanggal_lahir'))  }}">
                    @error('tanggal_lahir')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>  
                </div>  
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                @if(isset($detailData) || isset($editData))
                    <a href="{{ route('jabatan.index') }}" class="btn btn-default">Kembali</a>
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
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->    
@endsection
@section('footer-script')
<!-- Select2 -->
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
  $(function () {     
    $('.select2').select2()
    })
</script>   
@endsection