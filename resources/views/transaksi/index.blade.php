@extends('layouts.kasir')
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
            <h1>Transaksi</h1>
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
            <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf     
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-4">
                        <label>ID Transaksi</label>
                        <input type="text" class="form-control" placeholder="" name="id_transaksi">
                    </div>
                    <div class="form-group col-4">
                        <label>Nama Barang</label>
                        <select class="form-control" name="id_barang" id="id_barang" onchange="changeValue(this.value)">
                        <option value="" selected disabled>
                            Pilih
                        </option>
                        <?php 
                            $conn = mysqli_connect("localhost","root","","pos");
                            $sql=mysqli_query($conn, "SELECT * FROM barangs");
                            $jsArray = "var prdName = new Array();\n";
                            while ($data=mysqli_fetch_array($sql)) {
                            
                                echo '<option value="'.$data['id'].'">'.$data['nama_barang'].'</option> ';
                                $jsArray .= "prdName['" . $data['id'] . "'] = {nama:'" . addslashes($data['nama_barang']) . "',harga:'" . addslashes($data['harga_barang']) . "',stok:'" . addslashes($data['stok_barang']) . "'};\n";
                            
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group col-4">
                        <label>Stok</label>
                        <input type="text" class="form-control" placeholder="" name="stok" id="stok" disabled>
                    </div>
                    <div class="form-group col-4">
                        <label>Harga Satuan</label>
                        <input type="number" class="form-control" placeholder="" name="harga" id="harga" readonly>
                    </div>
                    <div class="form-group col-4">
                        <label>Jumlah Beli</label>
                        <input type="number" class="form-control" placeholder="" name="jumlah_beli" id="jumlah_beli" onkeyup="sum();">
                    </div>
                    <div class="form-group col-4">
                        <label>Total Harga</label>
                        <input type="number" class="form-control" placeholder="" name="total_harga" id="total_harga" onkeyup="sum();" readonly>
                    </div>
                    <div class="form-group col-4">
                        <label for="">Tanggal Beli</label>
                        <input type="date" class="form-control" placeholder="" name="tanggal_beli">
                    </div>
                    <input type="text" class="form-control" placeholder="" name="id_user" value="{{ Auth::user()->id }}" hidden>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!-- /.card-footer-->
        </form>
        </div>

        <div class="card">
        
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                  <th class="text-center">No</th>
                  <th>ID Transaksi</th>
                  <th>ID Barang</th>
                  <th>ID User</th>
                  <th>Jumlah Beli</th>
                  <th>Total Harga</th>
                  <th>Tanggal Beli</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($transaksis as $t)
              <tr>
                  <td class="text-center">{{ ++$i }}</td>
                  <td>{{ $t->id_transaksi }}</td>
                  <td>{{ $t->id_barang }}</td>
                  <td>{{ $t->id_user }}</td>
                  <td>{{ $t->jumlah_beli }}</td>
                  <td>{{ $t->total_harga }}</td>
                  <td>{{ $t->tanggal_beli }}</td>
              </tr>
              @endforeach
           
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <script type="text/javascript">    
        <?php echo $jsArray; ?>  
        function changeValue(x){  
        document.getElementById('harga').value = prdName[x].harga;
        document.getElementById('stok').value = prdName[x].stok;
        let stok = document.getElementById('stok').value = prdName[x].stok; 
            if(stok < 1){
                let habis = 'Stok Habis';
                document.getElementById('stok').value = habis;
                document.getElementById("jumlah_beli").disabled = true;
            }
            else{
                document.getElementById("jumlah_beli").disabled = false;
            }
        };

        function sum(){
            let beli = document.getElementById('jumlah_beli').value;
            let harga = document.getElementById('harga').value;
            let total = harga* beli;
            document.getElementById('total_harga').value = total;
            document.getElementById('total_harga').innerHTML = total;
        };
    </script> 
@endsection
