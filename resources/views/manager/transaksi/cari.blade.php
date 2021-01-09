@extends('layouts.manager')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            @php if(isset($startDate) && isset($endDate)){ @endphp
            <h4><center>Laporan Transaksi: @php echo $startDate @endphp - @php echo $endDate @endphp</center></h4>
            @php }else{ @endphp
            <h2><center>Laporan Transaksi</center></h2>
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
    
    </section>
</div>
 <script>
    function.print(){
        window.print();
    }
 </script>

 @endsection