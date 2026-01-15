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
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.container -->
@endsection