@extends('layouts.manager')
@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Data Merek</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->   
    
      <a href="/laporan-merek/cetak_pdf" class="btn btn-primary col-2" target="_blank">CETAK PDF</a>
        <div class="card">
        
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Merek</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($merek as $m)
                    <tr>
                        <td class="text-center" width="10px">{{ ++$i }}</td>
                        <td>{{ $m->nama_merek }}</td>
                    </tr>
                    @endforeach
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    </section>
  </div>  
@endsection