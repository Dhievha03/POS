@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <div class="container">
    <br>
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
            <h3 class="card-title">Update Data</h3>
            </div>
            <form action="{{route('distributor.update',$distributor->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                    <label for="">Nama Distributor</label>
                    <input type="text" class="form-control" placeholder="" name="nama_distributor" value="{{$distributor->nama_distributor}}">
                    </div>
                    <div class="col-4">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" placeholder="" name="alamat" value="{{$distributor->alamat}}">
                    </div>
                    <div class="col-4">
                    <label for="">No Telepon</label>
                    <input type="text" class="form-control" placeholder="" name="no_telp" value="{{$distributor->no_telp}}">
                    </div>
                </div>
                
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <!-- /.card-footer-->
        </div>
        </form>
        <!-- /.card -->
    </section>

@endsection