<!DOCTYPE html>
<html>
<head>
  <title>Data Montir</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <h3 align="center">Data Montir</h3>
  <table border="1" cellpadding="10" align="center">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>No. Telepon</th>
        <th>Alamat</th>
      </tr>
    </thead>
    <tbody>
      @php $no= 1; @endphp
      @foreach($montirs as $row)
      <tr>
        <th>{{ $no++ }}</th>
        <td>{{ $row->name }}</td>
        <td>{{ $row->gender }}</td>
        <td>{{ $row->no_telp }}</td>
        <td>{{ $row->alamat }}</td>
      @endforeach
    </tbody>
  </table>
</body>
</html>
