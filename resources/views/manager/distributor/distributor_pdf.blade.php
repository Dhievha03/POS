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
                <th>Nama Distributor</th>
                <th>Alamat</th>
                <th>No Telepon</th>
            </tr>
        </thead>
        <tbody>
            @php $i=0 @endphp
            @foreach ($distributor as $d)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{ $d->nama_distributor }}</td>
                <td>{{ $d->alamat }}</td>
                <td>{{ $d->no_telp }}</td>
            </tr>
            @endforeach
        </tbody>
	</table>
 
</body>
</html>