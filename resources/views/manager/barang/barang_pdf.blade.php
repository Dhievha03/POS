<html>
<head>
    <title>Laporan Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<center>
		<h5>Laporan Barang</h4>
	</center>
 
	<table class='table table-bordered'>
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
            </tr>
        </thead>
        <tbody>
            @php $i=0 @endphp
            @foreach ($barang as $b)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{ $b->nama_barang }}</td>
                <td>{{ $b->id_merek }}</td>
                <td>{{ $b->id_distributor }}</td>
                <td>{{ $b->tanggal_masuk }}</td>
                <td>{{ $b->harga_barang }}</td>
                <td>{{ $b->stok_barang }}</td>
                <td>{{ $b->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
	</table>
 
</body>
</html>