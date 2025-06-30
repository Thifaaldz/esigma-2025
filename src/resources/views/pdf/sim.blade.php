<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pendaftaran SIM</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; }
    </style>
</head>
<body>
    <h1>Bukti Pendaftaran SIM</h1>

    <table>
        <tr><th>Nama Lengkap</th><td>{{ $data->nama_lengkap }}</td></tr>
        <tr><th>NIK</th><td>{{ $data->nik }}</td></tr>
        <tr><th>Tanggal Lahir</th><td>{{ $data->tanggal_lahir }}</td></tr>
        <tr><th>Alamat</th><td>{{ $data->alamat }}</td></tr>
        <tr><th>Jenis Kelamin</th><td>{{ $data->jenis_kelamin }}</td></tr>
        <tr><th>Jenis SIM</th><td>{{ $data->jenis_sim }}</td></tr>
        <tr><th>Lokasi Ujian</th><td>{{ $data->lokasi_ujian }}</td></tr>
    </table>
</body>
</html>
