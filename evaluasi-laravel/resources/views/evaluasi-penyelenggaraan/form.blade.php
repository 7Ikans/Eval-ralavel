<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Evaluasi Penyelenggaraan Pelatihan</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body { background: #f1f4f7; font-size: 14px; color: #444; font-family: "Montserrat", sans-serif; }
        .section-title-wrap { display: flex; align-items: center; margin-bottom: 1rem; padding-bottom: 6px; border-bottom: 2px solid #2d6a4f; }
        .section-title-wrap span { font-size: 15px; font-weight: 600; color: #2d6a4f; }
        .step-badge { display: inline-block; background: #2d6a4f; color: #fff; border-radius: 50%; width: 28px; height: 28px; line-height: 28px; text-align: center; font-size: 13px; font-weight: 600; margin-right: 8px; }
        .wajib { color: red; font-weight: bold; }
        .card { margin-bottom: 1.25rem; }
        .form-check-inline { margin-right: 1.5rem; }
        .alert-info-custom { background: #e8f4f0; border-left: 4px solid #2d6a4f; border-radius: 4px; padding: 12px 16px; margin-bottom: 1rem; font-size: 13px; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark" style="background-color:#2d6a4f;">
    <a class="navbar-brand" href="#">EVALUASI PENYELENGGARAAN PELATIHAN</a>
</nav>

<div class="container" style="padding-top:24px;padding-bottom:40px;">

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

    <form method="POST" action="{{ route('evaluasi-penyelenggaraan.store') }}">
        @csrf

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Evaluasi Penyelenggaraan Pelatihan</h5>
                <div class="alert-info-custom">
                    Pertanyaan bertanda bintang (<span class="wajib">*</span>) wajib diisi.
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">NIP Peserta</label>
                    <input type="text" class="form-control" value="{{ $peserta['nip_peserta'] ?? '' }}" readonly>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Nama Peserta</label>
                    <input type="text" class="form-control" value="{{ $peserta['nama_peserta'] ?? '' }}" readonly>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Nama Diklat / Pelatihan <span class="wajib">*</span></label>
                    <input type="text" name="nama_diklat" class="form-control" required
                           value="{{ old('nama_diklat', $peserta['nama_pelatihan'] ?? '') }}">
                </div>
            </div>
        </div>

        {{-- SEKSI 1: Pelayanan (petugas) --}}
        <div class="card">
            <div class="card-body">
                <div class="section-title-wrap">
                    <div class="step-badge">1</div>
                    <span>Pelayanan Petugas</span>
                </div>
                @php
                    $soalPelayanan = [
                        1 => 'Pelayanan Petugas Kelas',
                        2 => 'Pelayanan Petugas Sekretariat',
                        3 => 'Pelayanan Petugas Asrama',
                        4 => 'Pelayanan Petugas Kesehatan',
                    ];
                @endphp
                @foreach ($soalPelayanan as $no => $teks)
                <div class="form-group row">
                    <label class="col-md-7 col-form-label">{{ $no }}. {{ $teks }} <span class="wajib">*</span></label>
                    <div class="col-md-5 d-flex align-items-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pelayanan[soal{{ $no }}]" value="baik" required>
                            <label class="form-check-label">Baik</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pelayanan[soal{{ $no }}]" value="tidak baik">
                            <label class="form-check-label">Tidak Baik</label>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="form-group">
                    <label>Catatan / Saran</label>
                    <textarea name="pelayanan[catatan]" class="form-control" rows="2"></textarea>
                </div>
            </div>
        </div>

        {{-- SEKSI 2: Pelayanan Peserta --}}
        <div class="card">
            <div class="card-body">
                <div class="section-title-wrap">
                    <div class="step-badge">2</div>
                    <span>Pelayanan Kepada Peserta Diklat</span>
                </div>
                @php
                    $soalPelayananPeserta = [
                        1 => 'Informasi tujuan sasaran diklat',
                        2 => 'Informasi aturan terhadap peserta',
                        3 => 'Informasi kewajiban dan hak peserta',
                        4 => 'Informasi jadwal pembelajaran',
                        5 => 'Informasi mekanisme perubahan jadwal',
                        6 => 'Informasi nama pengajar/narasumber',
                        7 => 'Informasi mekanisme perubahan pengajar',
                    ];
                @endphp
                @foreach ($soalPelayananPeserta as $no => $teks)
                <div class="form-group row">
                    <label class="col-md-7 col-form-label">{{ $no }}. {{ $teks }} <span class="wajib">*</span></label>
                    <div class="col-md-5 d-flex align-items-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pelayanan_peserta[soal{{ $no }}]" value="ada" required>
                            <label class="form-check-label">Ada</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pelayanan_peserta[soal{{ $no }}]" value="tidak ada">
                            <label class="form-check-label">Tidak Ada</label>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="form-group">
                    <label>Catatan / Saran</label>
                    <textarea name="pelayanan_peserta[catatan]" class="form-control" rows="2"></textarea>
                </div>
            </div>
        </div>

        {{-- SEKSI 3: Kebersihan --}}
        <div class="card">
            <div class="card-body">
                <div class="section-title-wrap">
                    <div class="step-badge">3</div>
                    <span>Kebersihan Prasarana Diklat</span>
                </div>

                <div class="form-group row">
                    <label class="col-md-7 col-form-label">Lokasi Kelas Diklat <span class="wajib">*</span></label>
                    <div class="col-md-5">
                        <select class="form-control" name="kebersihan[kelas]" required>
                            <option value="" hidden>-- Pilih --</option>
                            <option value="Sindoro">Sindoro</option>
                            <option value="Merbabu">Merbabu</option>
                            <option value="Muria">Muria</option>
                            <option value="Sumbing">Sumbing</option>
                            <option value="Merapi">Merapi</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-7 col-form-label">Lokasi Asrama <span class="wajib">*</span></label>
                    <div class="col-md-5">
                        <select class="form-control" name="kebersihan[asrama]" required>
                            <option value="" hidden>-- Pilih --</option>
                            <option value="Sindoro">Sindoro</option>
                            <option value="Muria">Muria</option>
                            <option value="Sumbing">Sumbing</option>
                            <option value="Merapi">Merapi</option>
                        </select>
                    </div>
                </div>

                @php
                    $soalKebersihan = [
                        1 => 'Kamar Tidur', 2 => 'Ruang Kelas', 3 => 'Ruang Makan',
                        4 => 'Toilet Kelas', 5 => 'Kamar Mandi Asrama', 6 => 'Poliklinik',
                        7 => 'Tempat Ibadah', 8 => 'Lingkungan Kampus', 9 => 'Aula',
                    ];
                @endphp
                @foreach ($soalKebersihan as $no => $teks)
                <div class="form-group row">
                    <label class="col-md-7 col-form-label">{{ $no }}. {{ $teks }} <span class="wajib">*</span></label>
                    <div class="col-md-5 d-flex align-items-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kebersihan[soal{{ $no }}]" value="bersih" required>
                            <label class="form-check-label">Bersih</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kebersihan[soal{{ $no }}]" value="tidak bersih">
                            <label class="form-check-label">Tidak Bersih</label>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="form-group">
                    <label>Catatan / Saran</label>
                    <textarea name="kebersihan[catatan]" class="form-control" rows="2"></textarea>
                </div>
            </div>
        </div>

        {{-- SEKSI 4: Keberfungsian --}}
        <div class="card">
            <div class="card-body">
                <div class="section-title-wrap">
                    <div class="step-badge">4</div>
                    <span>Keberfungsian Prasarana Diklat</span>
                </div>
                @php
                    $soalKeberfungsian = [
                        1 => 'Papan tulis whiteboard, spidol, penghapus',
                        2 => 'Flip chart dan kertas plano',
                        3 => 'Sound system',
                        4 => 'Komputer / Laptop',
                        5 => 'LCD Projector',
                        6 => 'Jaringan Wi-Fi di Kelas',
                        7 => 'Jaringan Wi-Fi di Lobby Asrama',
                    ];
                @endphp
                @foreach ($soalKeberfungsian as $no => $teks)
                <div class="form-group row">
                    <label class="col-md-7 col-form-label">{{ $no }}. {{ $teks }} <span class="wajib">*</span></label>
                    <div class="col-md-5 d-flex align-items-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="keberfungsian[soal{{ $no }}]" value="berfungsi" required>
                            <label class="form-check-label">Berfungsi</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="keberfungsian[soal{{ $no }}]" value="tidak berfungsi">
                            <label class="form-check-label">Tidak Berfungsi</label>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="form-group">
                    <label>Catatan / Saran</label>
                    <textarea name="keberfungsian[catatan]" class="form-control" rows="2"></textarea>
                </div>
            </div>
        </div>

        {{-- SEKSI 5: Ketersediaan Bahan Diklat --}}
        <div class="card">
            <div class="card-body">
                <div class="section-title-wrap">
                    <div class="step-badge">5</div>
                    <span>Ketersediaan Bahan Diklat</span>
                </div>
                @php
                    $soalKetersediaan = [
                        1 => 'Bahan bacaan di perpustakaan',
                        2 => 'Modul / Bahan Ajar',
                        3 => 'Media pembelajaran',
                        4 => 'Bahan tayang / slides',
                    ];
                @endphp
                @foreach ($soalKetersediaan as $no => $teks)
                <div class="form-group row">
                    <label class="col-md-7 col-form-label">{{ $no }}. {{ $teks }} <span class="wajib">*</span></label>
                    <div class="col-md-5 d-flex align-items-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketersediaan[soal{{ $no }}]" value="tersedia" required>
                            <label class="form-check-label">Tersedia</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketersediaan[soal{{ $no }}]" value="tidak tersedia">
                            <label class="form-check-label">Tidak Tersedia</label>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="form-group">
                    <label>Catatan / Saran</label>
                    <textarea name="ketersediaan[catatan]" class="form-control" rows="2"></textarea>
                </div>
            </div>
        </div>

        {{-- SEKSI 6: Perlengkapan Peserta --}}
        <div class="card">
            <div class="card-body">
                <div class="section-title-wrap">
                    <div class="step-badge">6</div>
                    <span>Perlengkapan Peserta</span>
                </div>
                @php
                    $soalPerlengkapan = [
                        1 => 'Alat tulis peserta',
                        2 => 'Blok note peserta',
                        3 => 'Tas peserta',
                        4 => 'Tanda peserta',
                        5 => 'Training set (kaos dan celana olahraga)',
                    ];
                @endphp
                @foreach ($soalPerlengkapan as $no => $teks)
                <div class="form-group row">
                    <label class="col-md-7 col-form-label">{{ $no }}. {{ $teks }} <span class="wajib">*</span></label>
                    <div class="col-md-5 d-flex align-items-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="perlengkapan[soal{{ $no }}]" value="tersedia" required>
                            <label class="form-check-label">Tersedia</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="perlengkapan[soal{{ $no }}]" value="tidak tersedia">
                            <label class="form-check-label">Tidak Tersedia</label>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="form-group">
                    <label>Catatan / Saran</label>
                    <textarea name="perlengkapan[catatan]" class="form-control" rows="2"></textarea>
                </div>
            </div>
        </div>

        {{-- SEKSI 7: Konsumsi --}}
        <div class="card">
            <div class="card-body">
                <div class="section-title-wrap">
                    <div class="step-badge">7</div>
                    <span>Konsumsi</span>
                </div>

                <div class="form-group row">
                    <label class="col-md-7 col-form-label">Lokasi Ruang Makan <span class="wajib">*</span></label>
                    <div class="col-md-5">
                        <select class="form-control" name="konsumsi[ruang]" required>
                            <option value="" hidden>-- Pilih --</option>
                            <option value="Sindoro">Sindoro</option>
                            <option value="Merbabu">Merbabu</option>
                            <option value="Sumbing">Sumbing</option>
                            <option value="Merapi">Merapi</option>
                        </select>
                    </div>
                </div>

                @php
                    $soalKonsumsi = [
                        1 => ['teks' => 'Ketersediaan jumlah konsumsi sesuai peserta', 'ya' => 'Cukup', 'tidak' => 'Tidak Cukup'],
                        2 => ['teks' => 'Kesesuaian menu makanan dengan daftar menu', 'ya' => 'Sesuai', 'tidak' => 'Tidak Sesuai'],
                        3 => ['teks' => 'Kualitas penyajian', 'ya' => 'Baik', 'tidak' => 'Tidak Baik'],
                        4 => ['teks' => 'Ketersediaan peralatan makan', 'ya' => 'Cukup', 'tidak' => 'Kurang'],
                        5 => ['teks' => 'Kebersihan peralatan makan', 'ya' => 'Cukup', 'tidak' => 'Kurang'],
                    ];
                @endphp
                @foreach ($soalKonsumsi as $no => $item)
                <div class="form-group row">
                    <label class="col-md-7 col-form-label">{{ $no }}. {{ $item['teks'] }} <span class="wajib">*</span></label>
                    <div class="col-md-5 d-flex align-items-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="konsumsi[soal{{ $no }}]" value="{{ strtolower($item['ya']) }}" required>
                            <label class="form-check-label">{{ $item['ya'] }}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="konsumsi[soal{{ $no }}]" value="{{ strtolower($item['tidak']) }}">
                            <label class="form-check-label">{{ $item['tidak'] }}</label>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="form-group">
                    <label>Catatan / Saran</label>
                    <textarea name="konsumsi[catatan]" class="form-control" rows="2"></textarea>
                </div>
            </div>
        </div>

        {{-- SEKSI 8: Observasi Lapangan (opsional) --}}
        <div class="card">
            <div class="card-body">
                <div class="section-title-wrap">
                    <div class="step-badge">8</div>
                    <span>Observasi Lapangan <small class="text-muted">(Jika Ada)</small></span>
                </div>
                @php
                    $soalObservasi = [
                        1 => ['teks' => 'Kesesuaian lokus dengan fokus', 'ya' => 'Sesuai', 'tidak' => 'Tidak Sesuai'],
                        2 => ['teks' => 'Kecukupan waktu', 'ya' => 'Cukup', 'tidak' => 'Kurang'],
                        3 => ['teks' => 'Proses pembimbingan', 'ya' => 'Baik', 'tidak' => 'Tidak Baik'],
                        4 => ['teks' => 'Pelayanan pendamping', 'ya' => 'Baik', 'tidak' => 'Tidak Baik'],
                        5 => ['teks' => 'Pelayanan biro travel: transportasi', 'ya' => 'Baik', 'tidak' => 'Tidak Baik'],
                        6 => ['teks' => 'Pelayanan biro travel: hotel', 'ya' => 'Memadai', 'tidak' => 'Tidak Memadai'],
                        7 => ['teks' => 'Pelayanan biro travel: konsumsi', 'ya' => 'Memadai', 'tidak' => 'Tidak Memadai'],
                    ];
                @endphp
                @foreach ($soalObservasi as $no => $item)
                <div class="form-group row">
                    <label class="col-md-7 col-form-label">{{ $no }}. {{ $item['teks'] }}</label>
                    <div class="col-md-5 d-flex align-items-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="observasi[soal{{ $no }}]" value="{{ strtolower($item['ya']) }}">
                            <label class="form-check-label">{{ $item['ya'] }}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="observasi[soal{{ $no }}]" value="{{ strtolower($item['tidak']) }}">
                            <label class="form-check-label">{{ $item['tidak'] }}</label>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="form-group">
                    <label>Catatan / Saran</label>
                    <textarea name="observasi[catatan]" class="form-control" rows="2"></textarea>
                </div>
            </div>
        </div>

        {{-- SEKSI 9: Relevansi --}}
        <div class="card">
            <div class="card-body">
                <div class="section-title-wrap">
                    <div class="step-badge">9</div>
                    <span>Relevansi Materi</span>
                </div>
                @php
                    $soalRelevan = [
                        1 => 'Kesesuaian materi dengan tujuan pelatihan',
                        2 => 'Kesesuaian materi dengan kebutuhan tugas',
                        3 => 'Manfaat materi untuk pekerjaan',
                    ];
                @endphp
                @foreach ($soalRelevan as $no => $teks)
                <div class="form-group row">
                    <label class="col-md-7 col-form-label">{{ $no }}. {{ $teks }} <span class="wajib">*</span></label>
                    <div class="col-md-5 d-flex align-items-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="relevan[soal{{ $no }}]" value="sesuai" required>
                            <label class="form-check-label">Sesuai</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="relevan[soal{{ $no }}]" value="tidak sesuai">
                            <label class="form-check-label">Tidak Sesuai</label>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="form-group">
                    <label>Catatan / Saran</label>
                    <textarea name="relevan[catatan]" class="form-control" rows="2"></textarea>
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
