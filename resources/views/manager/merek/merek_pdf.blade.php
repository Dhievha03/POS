<html>
<head>
    <title>Laporan Merek</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<center>
		<h5>Laporan Merek</h4>
	</center>
 
	<table class='table table-bordered'>
        <thead>
            <tr>
                <th class="text-center" width="10px">No</th>
                <th>Nama Merek</th>
            </tr>
        </thead>
        <tbody>
            @php $i=0 @endphp
            @foreach ($merek as $m)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{ $m->nama_merek }}</td>
            </tr>
            @endforeach
        </tbody>
	</table>
 
</body>
</html>