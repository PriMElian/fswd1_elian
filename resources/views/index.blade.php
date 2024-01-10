<!DOCTYPE html>
<html>
<head>
    <title>List Karyawan</title>

</head>
<body>
    <h1>List Karyawan</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nomor Induk</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Tanggal Bergabung</th>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawan as $k)
            <tr>
                <td>{{ $k->id }}</td>
                <td>{{ $k->nomor_induk }}</td>
                <td>{{ $k->nama }}</td>
                <td>{{ $k->alamat }}</td>
                <td>{{ $k->tanggal_lahir }}</td>
                <td>{{ $k->tanggal_bergabung }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
