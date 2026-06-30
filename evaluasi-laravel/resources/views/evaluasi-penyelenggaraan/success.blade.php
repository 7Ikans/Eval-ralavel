<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Evaluasi Selesai</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body { background:#f1f4f7; font-family:"Montserrat",sans-serif; }
        .success-card { max-width:560px; margin:80px auto; text-align:center; padding:40px 32px; }
        .checkmark { font-size:72px; color:#2d6a4f; margin-bottom:16px; }
    </style>
</head>
<body>
<nav class="navbar navbar-dark" style="background-color:#2d6a4f;">
    <a class="navbar-brand" href="#">EVALUASI PENYELENGGARAAN PELATIHAN</a>
</nav>

<div class="card success-card shadow-sm">
    <div class="checkmark">&#10003;</div>
    <h2>Evaluasi Berhasil Disimpan</h2>
    <p class="text-muted">{{ session('nama_diklat') }}</p>
    <p>Terima kasih atas partisipasi Anda dalam mengisi evaluasi penyelenggaraan pelatihan.</p>
    <a href="{{ route('evaluasi-penyelenggaraan.create') }}" class="btn btn-success">Isi Evaluasi Lain</a>
</div>
</body>
</html>
