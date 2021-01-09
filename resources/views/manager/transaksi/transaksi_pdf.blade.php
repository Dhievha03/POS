<html>
<head>
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<center>
		<h5>Laporan Transaksi</h4>
	</center>
 
	<table class='table table-bordered'>
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
            @php $i=0 @endphp
            @foreach ($transaksi as $t)
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
 
</body>
</html>