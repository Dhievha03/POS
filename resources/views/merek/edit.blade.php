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
            <h3 class="card-title">Update Data</h3>
            </div>
            <form action="{{route('merek.update',$merek->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">        
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Merek</label>
                    <input type="text" class="form-control" id="" value="{{$merek->nama_merek}}" name="nama_merek">
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