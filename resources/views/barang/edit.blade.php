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
            <h3 class="card-title">Update Data</h3>
            </div>
            <form action="{{route('barang.update',$barang->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <label for="">Nama Barang</label>
                        <input type="text" class="form-control" placeholder="" name="nama_barang" value="{{$barang->nama_barang}}">
                    </div>
                    <div class="col-4">
                        <label>Nama Merek</label>
                        <select class="form-control" name="id_merek">
                            <option value="{{$barang->id_merek}}">{{$barang->id_merek}}</option>
                        @foreach($merek as $merk)
                            <option value="{{$merk->id}}" name="id_merek">{{$merk->nama_merek}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Nama Distributor</label>
                        <select class="form-control" name="id_distributor">
                            <option value="{{$barang->id_distributor}}">{{$barang->id_distributor}}</option>
                        @foreach($distributor as $dist)
                            <option value="{{$dist->id}}" name="id_distributor">{{$dist->nama_distributor}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="">Tanggal Masuk</label>
                        <input type="date" class="form-control" placeholder="" name="tanggal_masuk" value="{{$barang->tanggal_masuk}}">
                    </div>
                    <div class="col-4">
                        <label for="">Harga Barang</label>
                        <input type="number" class="form-control" placeholder="" name="harga_barang" value="{{$barang->harga_barang}}">
                    </div>
                    <div class="col-4">
                        <label for="">Stok Barang</label>
                        <input type="number" class="form-control" placeholder="" name="stok_barang" value="{{$barang->stok_barang}}">
                    </div>
                    <div class="form-group col-4">
                        <label>Keterangan</label>
                        <textarea class="form-control" rows="3" placeholder="" name="keterangan">{{$barang->keterangan}}</textarea>
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