@extends('layouts.master')

@section('content')
 <div class="container">
      <!--  Header -->
      <section class="content-header">
        <h1>
          Data Karyawan
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('beranda') }}"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="#">Karyawan</a></li>
          <li class="active">List</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row"> 
            <div class="col-xs-12">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Selamat!</strong> {{ session('success') }}
            </div>
            @endif
            <div class="box">
            <div class="box-header">
              <a href="{{ route('karyawan.create') }}" class="btn btn-success">Tambah Karyawan</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 10px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 204.583px;">Nama Karyawan</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 180.427px;">Tanggal Lahir</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 140.823px;">Jabatan</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 99.4688px;">Kota</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 150.4688px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- DataTables --}}
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            </div>
            </div>
        </div>
      </section>
      <!-- /.content -->
 </div>
    <!-- /.container -->
   @foreach($getDataKaryawan as $data)
    <div class="modal fade in" id="delete-{{ $data->id }}">
      <div class="modal-dialog">
        <form method="POST" class="modal-content" action="{{ route('karyawan.destroy', $data->id) }}">
        @method('DELETE')
        @csrf  
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Hapus Data</h4>
          </div>
          <div class="modal-body">
            <b>{{ $data->nama_karyawan }}</b><p>Akan dihapus, Apakah anda yakin ?</p>
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
@section('footer-script')
<!-- DataTables -->
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>

        $(document).ready(function() {
           $('#example1').DataTable({
              processing: true, 
              serverSide: true,
              ajax: '{!! route('ajax.karyawan.dataTable') !!}',
              columns: [
                            { data: 'id', name: 'id' },
                            { data: 'nama_karyawan', name: 'nama_karyawan' },
                            { data: 'tanggal_lahir', name: 'tanggal_lahir' },
                            { data: 'jabatan.nama_jabatan', name: 'jabatan.nama_jabatan', defaultContent: 'kosong' }, 
                            { data: 'kota.nama_kota', name: 'kota.nama_kota', defaultContent: 'kosong' }, 
                            { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
                        ]
          });
        });
    </script>   
@endsection