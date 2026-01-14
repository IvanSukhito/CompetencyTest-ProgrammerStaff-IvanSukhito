@extends('layouts.master')

@section('content')

 <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Form Jabatan
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('beranda') }} "><i class="fa fa-home"></i> Home</a></li>
          <li><a href="{{ route('jabatan.index') }}">Jabatan</a></li>
          <li class="active">Form</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
       <div class="row">

       <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
          
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
                <a href="{{ route('jabatan.index') }}" type="submit" class="btn btn-default">Back</a>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
       
   
        </div>
       </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->

@endsection