@extends('layouts.manager')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            @php if(isset($startDate) && isset($endDate)){ @endphp
            <h4><center>Laporan Barang: @php echo $startDate @endphp - @php echo $endDate @endphp</center></h4>
            @php }else{ @endphp
            <h2><center>Laporan Barang</center></h2>
            @php } @endphp
          </div>
          
            <div class="btn btn-primary" onclick="print()" id="print">Print</div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <section class="content">
    <div class="col-md-12">
        <table class="table table-bordered table-hover" id="example2">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Merek</th>
                    <th scope="col">Distributor</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col">Harga Barang</th>
                    <th scope="col">Stok Barang</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
             @foreach ($barangs as $barang)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->id_merek }}</td>
                <td>{{ $barang->id_distributor}}</td>
                <td>{{ $barang->tanggal_masuk }}</td>
                <td>{{ $barang->harga_barang }}</td>
                <td>{{ $barang->stok_barang }}</td>
                <td>{{ $barang->keterangan }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    
    </section>
</div>
 <script>
    function.print(){
        var x = document.getElementById("print");
        return (x.display === 'none')
        window.print();
    }
 </script>

 @endsection