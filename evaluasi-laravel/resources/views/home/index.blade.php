<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Evaluasi BPSDMD Jawa Tengah</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            background: #f1f4f7;
            font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #333;
        }
        .hero {
            background: linear-gradient(135deg, #2d6a4f 0%, #1b4332 100%);
            color: #fff;
            padding: 56px 0 72px;
            text-align: center;
        }
        .hero h1 {
            font-weight: 700;
            font-size: 28px;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }
        .hero p {
            font-size: 14px;
            opacity: 0.85;
            margin-bottom: 0;
        }
        .card-wrap {
            margin-top: -48px;
            padding-bottom: 60px;
        }
        .eval-card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            height: 100%;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }
        .eval-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.12);
        }
        .eval-card-icon {
            height: 200px;
            overflow: hidden;
        }
        .eval-card-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .eval-card-body {
            padding: 24px 20px;
            text-align: center;
        }
        .eval-card-body h5 {
            font-weight: 700;
            font-size: 16px;
            color: #1b4332;
            margin-bottom: 10px;
        }
        .eval-card-body p {
            font-size: 13px;
            color: #777;
            margin-bottom: 18px;
            min-height: 40px;
        }
        .btn-eval {
            background: #2d6a4f;
            border: none;
            color: #fff;
            font-weight: 600;
            font-size: 13px;
            padding: 10px 28px;
            border-radius: 24px;
            transition: background 0.15s ease;
        }
        .btn-eval:hover {
            background: #1b4332;
            color: #fff;
        }
        footer {
            text-align: center;
            font-size: 12px;
            color: #999;
            padding: 24px 0;
        }
        footer a {
            color: #2d6a4f;
        }
    </style>
</head>
<body>

<div class="hero">
    <h1>SISTEM EVALUASI</h1>
    <p>Badan Pengembangan Sumber Daya Manusia Daerah Provinsi Jawa Tengah</p>
</div>

<div class="container card-wrap">
    <div class="row justify-content-center">

        <div class="col-md-5 mb-4">
            <div class="card eval-card">
                <div class="eval-card-icon">
                    <img src="{{ asset('img/portfolio/01-thumbnail.jpg') }}" alt="Evaluasi Tenaga Pengajar">
                </div>
                <div class="eval-card-body">
                    <h5>EVALUASI TENAGA PENGAJAR</h5>
                    <p>Berikan penilaian terhadap widyaiswara dan materi yang telah disampaikan selama pelatihan.</p>
                    <a href="{{ route('evaluasi-tp.create') }}" class="btn btn-eval">Mulai Evaluasi</a>
                </div>
            </div>
        </div>

        <div class="col-md-5 mb-4">
            <div class="card eval-card">
                <div class="eval-card-icon">
                    <img src="{{ asset('img/portfolio/04-thumbnail.jpg') }}" alt="Evaluasi Penyelenggaraan">
                </div>
                <div class="eval-card-body">
                    <h5>EVALUASI PENYELENGGARAAN</h5>
                    <p>Berikan penilaian terhadap pelayanan, fasilitas, dan penyelenggaraan pelatihan secara keseluruhan.</p>
                    <a href="{{ route('evaluasi-penyelenggaraan.create') }}" class="btn btn-eval">Mulai Evaluasi</a>
                </div>
            </div>
        </div>

    </div>
</div>

<footer>
    &copy; {{ date('Y') }} <a href="#">BPSDMD Provinsi Jawa Tengah</a>
</footer>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>