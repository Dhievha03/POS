@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">
    <br>
    <div class="container">
      @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
          </div>
      @endif

      @if (count($errors) > 0)
          <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Barang</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Data</h3>
        </div>
        <form action="{{ route('barang.store') }}" method="POST">
        @csrf     
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <label for="">Nama Barang</label>
                    <input type="text" class="form-control" placeholder="" name="nama_barang">
                </div>
                <div class="form-group col-4">
                    <label>Nama Merek</label>
                    <select class="form-control" name="id_merek">
                      <option value="" selected disabled>Pilih</option>
                        @foreach($mereks as $merek)
                          <option value="{{$merek->id}}" name="id_merek">{{$merek->nama_merek}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-4">
                    <label>Nama Distributor</label>
                    <select class="form-control" name="id_distributor">
                      <option value="" selected disabled>Pilih</option>
                      @foreach($distributors as $distributor)
                          <option value="{{$distributor->id}}" name="id_distributor">{{$distributor->nama_distributor}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="">Tanggal Masuk</label>
                    <input type="date" class="form-control" placeholder="" name="tanggal_masuk">
                </div>
                <div class="col-4">
                    <label for="">Harga Barang</label>
                    <input type="number" class="form-control" placeholder="" name="harga_barang">
                </div>
                <div class="col-4">
                    <label for="">Stok Barang</label>
                    <input type="number" class="form-control" placeholder="" name="stok_barang">
                </div>
                <div class="form-group col-4">
                    <label>Keterangan</label>
                    <textarea class="form-control" rows="3" placeholder="" name="keterangan"></textarea>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- /.card-footer-->
      </div>
      </form>
      <!-- /.card -->

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
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($barangs as $barang)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->id_merek }}</td>
                        <td>{{ $barang->id_distributor }}</td>
                        <td>{{ $barang->tanggal_masuk }}</td>
                        <td>{{ $barang->harga_barang }}</td>
                        <td>{{ $barang->stok_barang }}</td>
                        <td>{{ $barang->keterangan }}</td>
                        <td class="text-center">
                            <form action="{{ route('barang.destroy',$barang->id) }}" method="POST">
            
                                <a class="btn btn-primary btn-sm" href="{{ route('barang.edit',$barang->id) }}">Edit</a>
            
                                @csrf
                                @method('DELETE')
            
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        {!! $barangs->links() !!}
    </section>
  </div>  
@endsection