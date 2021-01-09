@extends('layouts.manager')
@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Data Barang</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      
      <form action="laporan-barang/cari" method="GET">
              <div class="form-row align-items-center">
                <div class="col-auto">
                  <input type="date" class="form-control @error('startDate') is-invalid @enderror mb-3" name="startDate" id="startDate">
                      @error('startDate')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="col-auto">
                          <label class="col-sm-2 mb-3"><b>-</b></label>
                    </div>
                    <div class="col-auto">
                      <input type="date" class="form-control @error('endDate')is-invalid @enderror mb-3" name="endDate" id="endDate">
                        @error('endDate')
                          <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Cari</button>
                    </div>
                    <div class="col-auto">
                      <a href="/laporan-barang/cetak_pdf" class="btn btn-primary mb-3" target="_blank">CETAK PDF</a>                     
                    </div>
              </div>
            </form>
        <div class="card">
          
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Barang</th>
                        <th>ID Merek</th>
                        <th>ID Distributor</th>
                        <th>Tanggal Masuk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Keterangan</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($barang as $b)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td>{{ $b->nama_barang }}</td>
                        <td>{{ $b->id_merek }}</td>
                        <td>{{ $b->id_distributor }}</td>
                        <td>{{ $b->tanggal_masuk }}</td>
                        <td>{{ $b->harga_barang }}</td>
                        <td>{{ $b->stok_barang }}</td>
                        <td>{{ $b->keterangan }}</td>
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