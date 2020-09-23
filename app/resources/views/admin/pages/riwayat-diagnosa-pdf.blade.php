<!DOCTYPE html>
<html>
<head>
	<title>Riwayat Diagnosis</title>
</head>
<body>
	<style>
#customers {
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #3c408f;
  padding: 8px;
}

#customers tr{background-color: #f2f2f2;}
#customers td{font-size: 12px}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #3c408f;
  color: white;
}
</style>
<center>
	<h2>Riwayat Diagnosis</h2>
		<br/>
	</center>

	<table id="customers">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>No. HP</th>
				<th>Alamat</th>
				<th>Hasil Diagnosis</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1; @endphp
			@foreach($pasien as $r)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $r->name }}</td>
				<td>{{ $r->jk }}</td>
				<td>{{ $r->no_hp }}</td>
				<td>{{ $r->alamat }}</td>
				<td>{{ $r->diagnosis }} - {{ $r->prosentase }} %</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>