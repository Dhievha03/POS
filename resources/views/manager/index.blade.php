@extends('layouts.manager')
@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->   
        <br>    
        <div class="card">
          <div class="card-header">
              Halo {{ Auth::user()->name }}
          </div>
              <!-- /.card-header -->
              <div class="card-body">
                Semua aktivitas yang anda lakukan di halaman ini menjadi tanggung jawab anda sepenuhnya. Silahkan lakukan dengan teliti.
              </div>
              <!-- /.card-body -->
            </div>
    </section>
  </div>  
@endsection