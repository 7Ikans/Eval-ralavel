<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Evaluasi Tenaga Pengajar</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body { background: #f1f4f7; font-size: 14px; color: #444; font-family: "Montserrat", sans-serif; }
        .section-title-wrap { display: flex; align-items: center; margin-bottom: 1rem; padding-bottom: 6px; border-bottom: 2px solid #2d6a4f; }
        .section-title-wrap span { font-size: 15px; font-weight: 600; color: #2d6a4f; }
        .wajib { color: red; font-weight: bold; }
        table.tabel-unsur th { background:#2d6a4f; color:#fff; font-size:13px; vertical-align:middle; }
        table.tabel-unsur td { vertical-align:middle; font-size:13px; }
        .alert-info-custom { background: #e8f4f0; border-left: 4px solid #2d6a4f; border-radius: 4px; padding: 12px 16px; margin-bottom: 1rem; font-size: 13px; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark" style="background-color:#2d6a4f;">
    <a class="navbar-brand" href="#">EVALUASI TENAGA PENGAJAR</a>
</nav>

<div class="container" style="padding-top:24px;padding-bottom:40px;">

    @if (session('error'))
        <div class="alert alert-warning">{{ session('error') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Mohon lengkapi semua pertanyaan wajib:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('evaluasi-tp.store') }}">
        @csrf

        {{-- Data Peserta & Pelatihan --}}
        <div class="card mb-3">
            <div class="card-body">
                <div class="section-title-wrap">
                    <span>Data Peserta &amp; Pelatihan</span>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>NIP Peserta <span class="wajib">*</span></label>
                        <input type="text" name="nip_peserta" class="form-control" required value="{{ old('nip_peserta') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Peserta <span class="wajib">*</span></label>
                        <input type="text" name="nama_peserta" class="form-control" required value="{{ old('nama_peserta') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>ID Diklat <span class="wajib">*</span></label>
                        <input type="number" name="id_diklat_daftar_online" class="form-control" required value="{{ old('id_diklat_daftar_online', 1) }}">
                        <small class="text-muted">Sementara isi manual, nanti otomatis dari cek NIP</small>
                    </div>
                    <div class="form-group col-md-9">
                        <label>Nama Diklat / Pelatihan <span class="wajib">*</span></label>
                        <input type="text" name="namadiklat" class="form-control" required value="{{ old('namadiklat') }}">
                    </div>
                </div>
                    <div class="form-group col-md-3">
                        <label>Jenis Diklat</label>
                        <input type="text" name="jenisdiklat" class="form-control" value="{{ old('jenisdiklat') }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Tahun <span class="wajib">*</span></label>
                        <input type="number" name="tahun" class="form-control" required value="{{ old('tahun', date('Y')) }}">
                    </div>
                </div>
            </div>
        </div>

        {{-- Data Widyaiswara & Materi --}}
        <div class="card mb-3">
            <div class="card-body">
                <div class="section-title-wrap">
                    <span>Widyaiswara &amp; Materi yang Dievaluasi</span>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>NIP Widyaiswara <span class="wajib">*</span></label>
                        <input type="text" name="nipwi" class="form-control" required value="{{ old('nipwi') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Nama Widyaiswara <span class="wajib">*</span></label>
                        <input type="text" name="namawi" class="form-control" required value="{{ old('namawi') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Materi <span class="wajib">*</span></label>
                        <input type="text" name="materi" class="form-control" required value="{{ old('materi') }}">
                    </div>
                </div>
            </div>
        </div>

        {{-- 14 Unsur Penilaian --}}
        <div class="card mb-3">
            <div class="card-body">
                <div class="section-title-wrap">
                    <span>Penilaian 14 Unsur</span>
                </div>
                <div class="alert-info-custom">
                    Pilih salah satu nilai untuk setiap unsur. Unsur 14 hanya diisi jika pembelajaran dilakukan secara tim.
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered tabel-unsur">
                        <thead>
                            <tr>
                                <th style="width:4%">No</th>
                                <th style="width:36%">Unsur yang Dinilai</th>
                                <th class="text-center">Sangat Baik</th>
                                <th class="text-center">Baik</th>
                                <th class="text-center">Cukup Baik</th>
                                <th class="text-center">Kurang Baik</th>
                                <th class="text-center">Tidak Baik</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $unsur = [
                                    1  => 'Penguasaan materi',
                                    2  => 'Sistematika penyajian materi',
                                    3  => 'Ketepatan waktu dan kehadiran',
                                    4  => 'Penggunaan media / sarana pembelajaran (LCD, flipchart, dll)',
                                    5  => 'Penggunaan metode pembelajaran (ceramah, tanya jawab, diskusi, game, kuis, dll)',
                                    6  => 'Sikap dan perilaku saat mengajar',
                                    7  => 'Penggunaan bahasa saat mengajar',
                                    8  => 'Sikap dan perilaku saat bertanya/menjawab/merespon/memberi feedback',
                                    9  => 'Penggunaan bahasa saat bertanya/menjawab/merespon/memberi feedback',
                                    10 => 'Sikap dan perilaku saat memberi motivasi',
                                    11 => 'Penggunaan bahasa saat memberi motivasi',
                                    12 => 'Kecakapan menciptakan kondusivitas kelas',
                                    13 => 'Kecakapan menjaga situasi kelas yang dinamis',
                                    14 => 'Kerjasama antar Widyaiswara (khusus pembelajaran secara tim)',
                                ];
                                $nilai = ['Sangat Baik', 'Baik', 'Cukup Baik', 'Kurang Baik', 'Tidak Baik'];
                            @endphp
                            @foreach ($unsur as $no => $teks)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $teks }}</td>
                                @foreach ($nilai as $n)
                                <td class="text-center">
                                    <input type="radio" name="hasil{{ $no }}" value="{{ $n }}"
                                        {{ $no != 14 ? 'required' : '' }}>
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="form-group mt-3">
                    <label>Saran / Masukan untuk Widyaiswara</label>
                    <textarea name="saran" class="form-control" rows="3">{{ old('saran') }}</textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-block btn-success btn-lg">Submit Evaluasi</button>
    </form>

    <p class="text-center text-muted mt-4" style="font-size:12px;">
        &copy; BPSDMD Provinsi Jawa Tengah
    </p>
</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>