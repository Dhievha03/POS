@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">
    <div class="container">
    <br>
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
            <h1>Distributor</h1>
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
        <form action="{{ route('distributor.store') }}" method="POST">
        @csrf     
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                <label for="">Nama Distributor</label>
                <input type="text" class="form-control" placeholder="" name="nama_distributor">
                </div>
                <div class="col-4">
                <label for="">Alamat</label>
                <input type="text" class="form-control" placeholder="" name="alamat">
                </div>
                <div class="col-4">
                <label for="">No Telepon</label>
                <input type="text" class="form-control" placeholder="" name="no_telp">
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
                        <th>Nama Distributor</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($distributors as $distributor)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td>{{ $distributor->nama_distributor }}</td>
                        <td>{{ $distributor->alamat }}</td>
                        <td>{{ $distributor->no_telp }}</td>
                        <td class="text-center">
                            <form action="{{ route('distributor.destroy',$distributor->id) }}" method="POST">
            
                                <a class="btn btn-primary btn-sm" href="{{ route('distributor.edit',$distributor->id) }}">Edit</a>
            
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
        {!! $distributors->links() !!}
    </section>
  </div>  
@endsection