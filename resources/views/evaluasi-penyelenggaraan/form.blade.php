<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Evaluasi Penyelenggaraan Pelatihan</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            color: #444;
        }

        .top-header {
            background-color: #222222;
            color: #FED136;
            padding: 16px 24px;
            font-size: 20px;
            letter-spacing: 0.5px;
        }

        .card-custom {
            border: 1px solid #e3e6f0;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
            margin-bottom: 24px;
            background: #fff;
        }

        .data-row {
            padding: 14px 24px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
        }

        .data-row:last-child {
            border-bottom: none;
        }

        .data-label {
            color: #666;
            font-size: 14px;
            width: 25%;
        }

        .data-value {
            color: #333;
            font-size: 14px;
            font-weight: 500;
            width: 75%;
        }

        .warning-box {
            background-color: #fff3cd;
            border-radius: 4px;
            padding: 20px;
            margin-top: 16px;
        }

        .warning-title {
            color: #856404;
            font-size: 18px;
            margin-bottom: 12px;
            font-weight: 600;
        }

        .warning-list {
            color: #856404;
            font-size: 13px;
            padding-left: 20px;
            line-height: 1.8;
            margin-bottom: 0;
        }

        .wajib {
            color: #dc3545;
            font-weight: bold;
            margin-left: 2px;
        }

        .section-title {
            font-size: 15px;
            font-weight: 700;
            color: #28a745;
            padding: 14px 20px 8px;
            border-bottom: 2px solid #e8f5e9;
        }

        .section-subtitle {
            font-size: 13px;
            font-weight: 600;
            color: #555;
            padding: 10px 20px 4px;
        }

        .table-kuesioner {
            width: 100%;
            color: #444;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table-kuesioner th {
            border-bottom: 2px solid #eee;
            font-weight: 700;
            color: #555;
            font-size: 13px;
            padding: 10px;
        }

        .table-kuesioner td {
            padding: 12px 10px;
            vertical-align: middle;
            border-bottom: 1px solid #f2f2f2;
        }

        .table-kuesioner tbody tr:last-child td {
            border-bottom: none;
        }

        .jenis-card-wrap {
            display: flex;
            gap: 16px;
            padding: 20px;
        }

        .jenis-card {
            flex: 1;
            border: 2px solid #dee2e6;
            border-radius: 10px;
            padding: 24px 16px;
            text-align: center;
            cursor: pointer;
            transition: all .2s;
            background: #fff;
            user-select: none;
        }

        .jenis-card:hover {
            border-color: #28a745;
            background: #f0fff4;
        }

        .jenis-card.selected {
            border-color: #28a745;
            background: #e6f9ed;
            box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.15);
        }

        .jenis-card .jenis-icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .jenis-card .jenis-label {
            font-size: 15px;
            font-weight: 700;
            color: #333;
        }

        .jenis-card .jenis-desc {
            font-size: 12px;
            color: #777;
            margin-top: 4px;
        }

        .jenis-card.selected .jenis-label {
            color: #28a745;
        }

        .badge-jenis {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            margin-left: 8px;
            vertical-align: middle;
        }

        .badge-klasikal {
            background: #e6f9ed;
            color: #28a745;
        }

        .badge-virtual {
            background: #e8f0fe;
            color: #1a73e8;
        }

        .slider-container {
            width: 100%;
            padding: 2px 0;
        }

        .slider-kuesioner {
            -webkit-appearance: none;
            width: 100%;
            height: 6px;
            border-radius: 3px;
            outline: none;
            cursor: pointer;
            background: linear-gradient(to right, #ffc107 100%, #e9ecef 100%);
        }

        .slider-kuesioner::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #ffc107;
            cursor: pointer;
            border: 2px solid #fff;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
        }

        .slider-kuesioner::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #ffc107;
            cursor: pointer;
            border: 2px solid #fff;
        }

        .slider-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 4px;
        }

        .slider-labels span {
            font-size: 11px;
            color: #aaa;
        }

        .btn-submit-custom {
            background-color: #ffc107;
            color: #222;
            font-weight: 600;
            padding: 12px;
            border: none;
            border-radius: 4px;
            transition: 0.2s;
        }

        .btn-submit-custom:hover {
            background-color: #e0a800;
        }

        .btn-cancel-custom {
            background-color: #8c98a4;
            color: #fff;
            font-weight: 600;
            padding: 12px;
            border: none;
            border-radius: 4px;
            transition: 0.2s;
        }

        .btn-cancel-custom:hover {
            background-color: #727b84;
        }

        .aspek-section {
            display: none;
        }
    </style>
</head>

<body>
    <div class="top-header">EVALUASI PENYELENGGARAAN PELATIHAN</div>

    <div class="container mt-4">

        {{-- Data Peserta --}}
        <div class="card-custom">
            <div class="data-row">
                <div class="data-label">NIP</div>
                <div class="data-value">{{ $peserta['nip_peserta'] ?? '-' }}</div>
            </div>
            <div class="data-row">
                <div class="data-label">Nama</div>
                <div class="data-value">{{ $peserta['nama_peserta'] ?? '-' }}</div>
            </div>
            <div class="data-row">
                <div class="data-label">Jabatan</div>
                <div class="data-value">{{ $peserta['jabatan'] ?? '-' }}</div>
            </div>
            <div class="data-row">
                <div class="data-label">Instansi</div>
                <div class="data-value">{{ $peserta['instansi'] ?? '-' }}</div>
            </div>
            <div class="data-row">
                <div class="data-label">Pelatihan</div>
                <div class="data-value">{{ $peserta['nama_pelatihan'] ?? '-' }}</div>
            </div>
        </div>

        {{-- Perhatian --}}
        <div class="card-custom p-4" id="cardKetentuan">
            <h5 style="color:#444;font-size:18px;margin-bottom:0;">Form Evaluasi Penyelenggaraan Pelatihan</h5>
            <div class="warning-box">
                <div class="warning-title">Perhatian</div>
                <ul class="warning-list">
                    <li>Isilah kuesioner dengan jujur sesuai pengalaman Anda selama mengikuti pelatihan.</li>
                    <li>Pertanyaan bertanda bintang (<span class="wajib" style="margin:0;">*</span>) wajib diisi.</li>
                    <li>Pilih jenis penyelenggaraan pelatihan terlebih dahulu sebelum mengisi kuesioner.</li>
                </ul>
                <div class="text-center mt-4">
                    <p style="color:#856404;font-size:14px;">Klik tombol di bawah ini untuk menampilkan kuesioner</p>
                    <button type="button" class="btn btn-warning" id="btnTampilForm"
                        style="background-color:#ffc107;border:none;font-weight:500;padding:10px 24px;color:#222;">
                        Saya sudah membaca ketentuan di atas
                    </button>
                </div>
            </div>
        </div>

        {{-- Form Utama --}}
        <div id="wrapperForm" style="display:none;">

            @if($errors->any() || session('error'))
            <div class="alert alert-danger mb-4">{{ session('error', 'Mohon lengkapi semua pertanyaan wajib.') }}</div>
            @endif

            <form method="POST" action="{{ route('evaluasi-penyelenggaraan.store') }}" id="form-eval-ep">
                @csrf
                <input type="hidden" name="id_diklat_daftar_online" value="{{ $peserta['id_diklat_daftar_online'] ?? '' }}">
                <input type="hidden" name="nip_peserta" value="{{ $peserta['nip_peserta'] ?? '' }}">
                <input type="hidden" name="nama_peserta" value="{{ $peserta['nama_peserta'] ?? '' }}">
                <input type="hidden" name="jabatan" value="{{ $peserta['jabatan'] ?? '' }}">
                <input type="hidden" name="instansi" value="{{ $peserta['instansi'] ?? '' }}">
                <input type="hidden" name="nama_pelatihan" value="{{ $peserta['nama_pelatihan'] ?? '' }}">
                <input type="hidden" name="tahun" value="{{ $peserta['tahun'] ?? date('Y') }}">
                <input type="hidden" name="jenis_kelas" id="hidden_jenis_kelas" value="">

                {{-- PILIH JENIS KELAS --}}
                <div class="card-custom">
                    <div class="section-title">Pilih Jenis Penyelenggaraan <span class="wajib">*</span></div>
                    <div class="jenis-card-wrap">

                        <div class="jenis-card" id="card-klasikal" onclick="pilihJenis('klasikal')">
                            <div class="jenis-icon">🏫</div>
                            <div class="jenis-label">Klasikal</div>
                            <div class="jenis-desc">Pelatihan dilakukan secara tatap muka / offline</div>
                        </div>

                        <div class="jenis-card" id="card-virtual" onclick="pilihJenis('virtual')">
                            <div class="jenis-icon">💻</div>
                            <div class="jenis-label">Virtual / E-Learning</div>
                            <div class="jenis-desc">Pelatihan dilakukan secara online / daring</div>
                        </div>

                    </div>
                    <div id="info-jenis" class="px-4 pb-3" style="display:none; font-size:13px; color:#555;"></div>
                </div>

                @php
                function sliderRow(string $name, string $label, bool $wajib = true): string {
                $mark = $wajib ? '<span style="color:#dc3545;font-weight:bold;margin-left:2px;">*</span>' : '';
                return "
                <tr>
                    <td style='width:55%;font-size:13px;'>{$label}{$mark}</td>
                    <td style='width:45%;'>
                        <div class='slider-container'>
                            <input type='range' class='slider-kuesioner' min='1' max='4' step='1' value='4'
                                data-target='val-{$name}'>
                            <div class='slider-labels'>
                                <span>Tidak Baik</span><span>Kurang Baik</span><span>Baik</span><span>Sangat Baik</span>
                            </div>
                            <input type='hidden' name='{$name}' id='val-{$name}' value='Sangat Baik'>
                        </div>
                    </td>
                </tr>";
                }
                @endphp

                <div class="card-custom aspek-section" id="aspek-layanan">
                    <div class="section-title">
                        1. Layanan Registrasi dan Informasi
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table-kuesioner">
                            <thead>
                                <tr>
                                    <th style="width:55%">Indikator Penilaian</th>
                                    <th style="width:45%;text-align:center">Penilaian</th>
                                </tr>
                            </thead>
                            <tbody>
                                {!! sliderRow('lay_1_1', 'Informasi pemanggilan peserta') !!}
                                {!! sliderRow('lay_1_2', 'Kecepatan pelayanan registrasi') !!}
                                {!! sliderRow('lay_1_3', 'Jadwal penyelenggaraan pelatihan') !!}
                                {!! sliderRow('lay_1_4', 'Informasi tata tertib dan ketentuan pelatihan') !!}
                            </tbody>
                        </table>
                    </div>
                    <div class="section-subtitle">1.5 Sikap dan Perilaku Petugas Layanan Registrasi dan Informasi</div>
                    <div class="table-responsive p-3">
                        <table class="table-kuesioner">
                            <tbody>
                                {!! sliderRow('lay_1_5_1', 'Sopan santun, kerapian dan keramahan petugas') !!}
                                {!! sliderRow('lay_1_5_2', 'Respons terhadap kebutuhan dan keluhan peserta') !!}
                                {!! sliderRow('lay_1_5_3', 'Penggunaan bahasa oleh petugas layanan registrasi dan informasi') !!}
                            </tbody>
                        </table>
                    </div>
                    <div class="p-3">
                        <label style="font-size:13px;color:#555;">Catatan / Saran</label>
                        <textarea name="lay_catatan" class="form-control mt-1" rows="2"></textarea>
                    </div>
                </div>

                <div class="card-custom aspek-section" id="aspek-pbm">
                    <div class="section-title">2. Proses Pembelajaran</div>
                    <div class="table-responsive p-3">
                        <table class="table-kuesioner">
                            <thead>
                                <tr>
                                    <th style="width:55%">Indikator Penilaian</th>
                                    <th style="width:45%;text-align:center">Penilaian</th>
                                </tr>
                            </thead>
                            <tbody>
                                {!! sliderRow('pbm_2_1', 'Informasi pelaksanaan pelatihan') !!}
                                {!! sliderRow('pbm_2_2', 'Kelengkapan bahan pembelajaran (modul, media pembelajaran, penugasan, dll)') !!}
                                {!! sliderRow('pbm_2_3', 'Pemanfaatan teknologi dalam proses pembelajaran') !!}
                                {!! sliderRow('pbm_2_4', 'Kejelasan informasi tentang tahapan pembelajaran') !!}
                                {!! sliderRow('pbm_2_5', 'Pemantauan penyelenggaraan pada tahapan pembelajaran') !!}
                            </tbody>
                        </table>
                    </div>
                    <div class="section-subtitle">2.6 Sikap dan Perilaku Petugas Kelas</div>
                    <div class="table-responsive p-3">
                        <table class="table-kuesioner">
                            <tbody>
                                {!! sliderRow('pbm_2_6_1', 'Sopan santun, kerapian dan keramahan petugas') !!}
                                {!! sliderRow('pbm_2_6_2', 'Respons terhadap kebutuhan dan keluhan peserta') !!}
                                {!! sliderRow('pbm_2_6_3', 'Ketersediaan media komunikasi') !!}
                                {!! sliderRow('pbm_2_6_4', 'Kemudahan menghubungi petugas') !!}
                                {!! sliderRow('pbm_2_6_5', 'Penggunaan bahasa oleh petugas kelas') !!}
                            </tbody>
                        </table>
                    </div>
                    <div class="p-3">
                        <label style="font-size:13px;color:#555;">Catatan / Saran</label>
                        <textarea name="pbm_catatan" class="form-control mt-1" rows="2"></textarea>
                    </div>
                </div>

                <div class="card-custom aspek-section aspek-klasikal-only" id="aspek-sarpras">
                    <div class="section-title">
                        3. Sarana dan Prasarana
                        <span class="badge-jenis badge-klasikal">Klasikal</span>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table-kuesioner">
                            <thead>
                                <tr>
                                    <th style="width:55%">Indikator Penilaian</th>
                                    <th style="width:45%;text-align:center">Penilaian</th>
                                </tr>
                            </thead>
                            <tbody>
                                {!! sliderRow('sarpras_3_1', 'Kelengkapan informasi sarana dan prasarana selama penyelenggaraan pelatihan') !!}
                                {!! sliderRow('sarpras_3_2', 'Ketersediaan dan kualitas ruang kelas, ruang makan, perpustakaan, ruang laktasi dan toilet') !!}
                                {!! sliderRow('sarpras_3_3', 'Ketersediaan dan kualitas asrama') !!}
                                {!! sliderRow('sarpras_3_4', 'Kualitas pembimbing studi lapangan') !!}
                                {!! sliderRow('sarpras_3_6', 'Ketersediaan fasilitas olahraga, unit kesehatan, tempat ibadah, sarana lainnya') !!}
                                {!! sliderRow('sarpras_3_7', 'Ketersediaan dan kualitas literatur di perpustakaan') !!}
                                {!! sliderRow('sarpras_3_8', 'Ketersediaan sarana bagi penyandang disabilitas dan kelompok khusus') !!}
                                {!! sliderRow('sarpras_3_9', 'Ketersediaan ruang terbuka hijau') !!}
                                {!! sliderRow('sarpras_3_10', 'Ketersediaan sarana pengaduan dan petugas yang menangani') !!}
                                {!! sliderRow('sarpras_3_11', 'Keamanan lembaga pelatihan (satpam standby 24 jam, CCTV)') !!}
                                {!! sliderRow('sarpras_3_12', 'Ketersediaan sarana pendukung lainnya (ATM, fotocopy, dll)') !!}
                            </tbody>
                        </table>
                    </div>
                    <div class="section-subtitle">3.5 Ketersediaan dan Kualitas Sarana Teknologi Informasi</div>
                    <div class="table-responsive p-3">
                        <table class="table-kuesioner">
                            <tbody>
                                {!! sliderRow('sarpras_3_5_1', 'Kualitas LMS (Siptenan/Sinau Bareng) dalam hal kelengkapan fitur / menu') !!}
                                {!! sliderRow('sarpras_3_5_2', 'Kemudahan dalam mengakses dan mengikuti sistem pembelajaran e-learning melalui LMS') !!}
                                {!! sliderRow('sarpras_3_5_3', 'Jaringan internet (WiFi) saat klasikal di BPSDMD Provinsi Jawa Tengah') !!}
                                {!! sliderRow('sarpras_3_5_4', 'Jaringan internet pada pembelajaran online / synchronous') !!}
                            </tbody>
                        </table>
                    </div>
                    <div class="section-subtitle">3.13 Sikap dan Perilaku Petugas Asrama</div>
                    <div class="table-responsive p-3">
                        <table class="table-kuesioner">
                            <tbody>
                                {!! sliderRow('sarpras_3_13_1', 'Sopan santun, kerapian dan keramahan petugas') !!}
                                {!! sliderRow('sarpras_3_13_2', 'Respons terhadap kebutuhan dan keluhan peserta') !!}
                                {!! sliderRow('sarpras_3_13_3', 'Ketersediaan media komunikasi') !!}
                                {!! sliderRow('sarpras_3_13_4', 'Kemudahan menghubungi petugas') !!}
                            </tbody>
                        </table>
                    </div>
                    <div class="p-3">
                        <label style="font-size:13px;color:#555;">Catatan / Saran</label>
                        <textarea name="sarpras_catatan" class="form-control mt-1" rows="2"></textarea>
                    </div>
                </div>

                <div class="card-custom aspek-section aspek-klasikal-only" id="aspek-konsumsi">
                    <div class="section-title">
                        4. Konsumsi
                        <span class="badge-jenis badge-klasikal">Klasikal</span>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table-kuesioner">
                            <thead>
                                <tr>
                                    <th style="width:55%">Indikator Penilaian</th>
                                    <th style="width:45%;text-align:center">Penilaian</th>
                                </tr>
                            </thead>
                            <tbody>
                                {!! sliderRow('kon_4_1', 'Kecukupan gizi dari menu yang dihidangkan') !!}
                                {!! sliderRow('kon_4_2', 'Kecukupan hidangan konsumsi bagi seluruh peserta') !!}
                                {!! sliderRow('kon_4_3', 'Kebersihan dalam penyajian makanan') !!}
                                {!! sliderRow('kon_4_4', 'Ketepatan waktu penyajian makanan') !!}
                                {!! sliderRow('kon_4_5', 'Variasi menu makanan yang disajikan') !!}
                            </tbody>
                        </table>
                    </div>
                    <div class="section-subtitle">4.6 Sikap dan Perilaku Petugas Konsumsi</div>
                    <div class="table-responsive p-3">
                        <table class="table-kuesioner">
                            <tbody>
                                {!! sliderRow('kon_4_6_1', 'Sopan santun, kerapian dan keramahan petugas konsumsi') !!}
                                {!! sliderRow('kon_4_6_2', 'Respons terhadap kebutuhan dan keluhan peserta') !!}
                                {!! sliderRow('kon_4_6_3', 'Kemudahan menghubungi petugas konsumsi') !!}
                                {!! sliderRow('kon_4_6_4', 'Penggunaan bahasa oleh petugas konsumsi') !!}
                            </tbody>
                        </table>
                    </div>
                    <div class="p-3">
                        <label style="font-size:13px;color:#555;">Catatan / Saran</label>
                        <textarea name="kon_catatan" class="form-control mt-1" rows="2"></textarea>
                    </div>
                </div>

                {{-- Tombol Submit (muncul setelah jenis dipilih) --}}
                <div class="card-custom p-4 aspek-section" id="section-submit">
                    <div class="form-group">
                        <label style="font-size:14px;color:#555;">Saran umum / masukan lainnya</label>
                        <textarea name="saran_umum" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-block btn-submit-custom mb-2" id="btnSubmit">
                            <i class="far fa-paper-plane mr-1"></i> Submit Evaluasi
                        </button>
                        <a href="{{ url('/') }}" class="btn btn-block btn-cancel-custom">Batalkan / Keluar</a>
                    </div>
                </div>

            </form>
        </div>

        <div class="mt-2 mb-5 text-center" style="font-size:13px;color:#aaa;">
            &copy; BPSDMD Provinsi Jawa Tengah
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
        const mapNilai = {
            1: 'Tidak Baik',
            2: 'Kurang Baik',
            3: 'Baik',
            4: 'Sangat Baik'
        };

        function initSliders() {
            $('.slider-kuesioner').each(function() {
                updateSlider(this);
            });
            $('.slider-kuesioner').off('input').on('input', function() {
                updateSlider(this);
            });
        }

        function updateSlider(el) {
            var val = parseInt($(el).val());
            var targetId = $(el).data('target');
            $('#' + targetId).val(mapNilai[val]);
            var pct = ((val - 1) / 3) * 100;
            $(el).css('background',
                'linear-gradient(to right, #ffc107 ' + pct + '%, #e9ecef ' + pct + '%)'
            );
        }

        function pilihJenis(jenis) {
            $('#card-klasikal, #card-virtual').removeClass('selected');
            $('#card-' + jenis).addClass('selected');
            $('#hidden_jenis_kelas').val(jenis);
            $('.aspek-section').hide();
            $('#aspek-layanan, #aspek-pbm, #section-submit').show();

            if (jenis === 'klasikal') {
                $('.aspek-klasikal-only').show();
                $('.aspek-klasikal-only').find('input, textarea').prop('disabled', false);

                $('#info-jenis').html(
                    '<i class="fas fa-check-circle text-success"></i> ' +
                    '<strong>Klasikal</strong> dipilih — form mencakup: Layanan Registrasi, Proses Pembelajaran, Sarana & Prasarana, dan Konsumsi.'
                ).show();
            } else {
                $('.aspek-klasikal-only').hide();
                $('.aspek-klasikal-only').find('input, textarea').prop('disabled', true); 

                $('#info-jenis').html(
                    '<i class="fas fa-check-circle" style="color:#1a73e8"></i> ' +
                    '<strong>Virtual / E-Learning</strong> dipilih — form mencakup: Layanan Registrasi dan Informasi, dan Proses Pembelajaran.'
                ).show();
            }

            initSliders();

            $('html, body').animate({
                scrollTop: $('#aspek-layanan').offset().top - 20
            }, 400);
        }

        $(document).ready(function() {
            $('#btnTampilForm').click(function() {
                $('#cardKetentuan').slideUp(300, function() {
                    $('#wrapperForm').slideDown(400);
                });
            });

            @if($errors -> any() || session('error'))
            $('#cardKetentuan').hide();
            $('#wrapperForm').show();
            initSliders();
            @endif

            $('#form-eval-ep').on('submit', function(e) {
                if (!$('#hidden_jenis_kelas').val()) {
                    e.preventDefault();
                    alert('Silakan pilih jenis penyelenggaraan (Klasikal atau Virtual) terlebih dahulu.');
                    $('html, body').animate({
                        scrollTop: 0
                    }, 400);
                    return false;
                }

                $('#btnSubmit').prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-1"></i> Menyimpan...');
            });
        });
    </script>
</body>

</html>