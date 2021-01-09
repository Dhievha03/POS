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
            <h1>Merek</h1>
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
        <form action="{{ route('merek.store') }}" method="POST">
        @csrf
        <div class="card-body">        
            <div class="form-group">
                <label for="">Nama Merek</label>
                <input type="text" class="form-control" id="" placeholder="Masukan Merek" name="nama_merek">
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
                        <th>Nama Merek</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    @foreach ($mereks as $merek)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td>{{ $merek->nama_merek }}</td>
                        
                        <td class="text-center">
                            <form action="{{ route('merek.destroy',$merek->id) }}" method="POST">
            
                                <a class="btn btn-primary btn-sm" href="{{ route('merek.edit',$merek->id) }}">Edit</a>
            
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
        {!! $mereks->links() !!}
    </section>
  </div>

@endsection