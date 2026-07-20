<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Evaluasi Selesai</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body { background:#f1f4f7; font-family:"Montserrat",sans-serif; }
        .success-card { max-width:560px; margin:80px auto; text-align:center; padding:40px 32px; }
        .checkmark { font-size:72px; color:#FED136; margin-bottom:16px; }
    </style>
</head>
<body>
<nav class="navbar navbar-dark" style="background-color:#222222;">
    <a class="navbar-brand" href="#" style="color:#FED136;">EVALUASI TENAGA PENGAJAR</a>
</nav>

<div class="card success-card shadow-sm">
    <div class="checkmark">&#10003;</div>
    <h2>Evaluasi Berhasil Disimpan</h2>
    <p class="text-muted">
        {{ session('namadiklat') }}<br>
        Widyaiswara: {{ session('namawi') }}
    </p>
    <p>Terima kasih atas penilaian Anda terhadap tenaga pengajar.</p>
    <a href="{{ route('evaluasi-tp.create') }}" class="btn btn-success" style="display:block;background-color:#FED136;border-color:#FED136;color:#222;margin-bottom:12px;">Evaluasi WI/Materi Lain</a>
    <a href="{{ url('/') }}" class="btn btn-secondary" style="display:block;background-color:#858c93;border-color:#858c93; width: 100%;">Selesai & Keluar</a>
</div>
</body>
</html>
