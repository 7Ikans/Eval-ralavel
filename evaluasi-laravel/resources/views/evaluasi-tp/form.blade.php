<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Evaluasi Tenaga Pengajar</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            color: #444;
        }

        /* ---- HEADER & KARTU DATA ---- */
        .top-header {
            background-color: #28a745;
            color: white;
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
            padding: 18px 24px;
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

        /* ---- KOTAK PERHATIAN ---- */
        .warning-box {
            background-color: #fff3cd;
            border-radius: 4px;
            padding: 24px;
            margin-top: 20px;
        }

        .warning-title {
            color: #856404;
            font-size: 20px;
            margin-bottom: 16px;
            font-weight: 600;
        }

        .warning-list {
            color: #856404;
            font-size: 14px;
            padding-left: 20px;
            line-height: 1.8;
            margin-bottom: 0;
        }

        .table-kuesioner {
            width: 100%;
            color: #444;
            margin-top: 20px;
        }

        .table-kuesioner th,
        .table-kuesioner td {
            border: none;
            padding: 15px 10px;
            vertical-align: top;
        }

        .table-kuesioner thead th {
            border-bottom: 1px solid #eee;
            font-weight: 700;
            color: #555;
        }

        .table-kuesioner tbody tr {
            border-bottom: 1px solid #f2f2f2;
        }

        .table-kuesioner tbody tr:last-child {
            border-bottom: none;
        }

        .radio-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .wajib {
            color: #dc3545;
            font-weight: bold;
            margin-left: 4px;
        }

        .sub-question {
            font-size: 13px;
            color: #666;
            padding-left: 15px;
            margin-top: 5px;
            line-height: 1.6;
        }

        .sub-question ul {
            padding-left: 20px;
            margin-bottom: 0;
        }

        /* ---- FORM PENGANTAR ---- */
        .form-header-title {
            font-size: 13px;
            color: #777;
            margin-bottom: 5px;
        }

        .form-header-value {
            font-size: 16px;
            color: #333;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .custom-select-box {
            background-color: #f8f9fa;
            border: 1px solid #e2e2e2;
            padding: 10px;
            border-radius: 4px;
            display: flex;
            align-items: center;
        }

        .custom-select-box img {
            width: 45px;
            height: 45px;
            border-radius: 4px;
            margin-right: 15px;
            object-fit: cover;
        }

        /* ---- TOMBOL ---- */
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
            color: #222;
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
            color: #fff;
        }

        /* ---- TABEL KUESIONER (Sticky Header) ---- */
        .table-kuesioner {
            width: 100%;
            color: #444;
            margin-top: 20px;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table-kuesioner thead {
            position: sticky;
            top: 0;
            z-index: 10;
            background: #fff;
            /* Penting agar teks di belakang header tidak tembus pandang */
            box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.1);
            /* Opsional: memberi sedikit efek bayangan */
        }

        .table-kuesioner th,
        .table-kuesioner td {
            border: none;
            padding: 15px 10px;
            vertical-align: top;
        }

        .table-kuesioner thead th {
            border-bottom: 2px solid #eee;
            font-weight: 700;
            color: #555;
        }

        .table-kuesioner tbody tr {
            border-bottom: 1px solid #f2f2f2;
        }

        /* ---- STYLING SLIDER KUESIONER ---- */
        .slider-container {
            width: 100%;
            padding: 10px 0;
        }

        .slider-kuesioner {
            -webkit-appearance: none;
            width: 100%;
            height: 8px;
            border-radius: 5px;
            background: #ffc107;
            outline: none;
            margin: 10px 0;
        }

        .slider-kuesioner::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: #ffc107;
            cursor: pointer;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
            border: 2px solid #fff;
        }

        .slider-kuesioner::-moz-range-thumb {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: #ffc107;
            cursor: pointer;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
            border: 2px solid #fff;
        }

        .slider-labels {
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            color: #888;
            margin-top: 5px;
            padding: 0 5px;
        }
    </style>
</head>

<body>

    <div class="top-header">
        EVALUASI TENAGA PENGAJAR
    </div>

    <div class="container mt-4">
        <div class="card-custom">
            <div class="data-row">
                <div class="data-label">NIP</div>
                <div class="data-value">{{ session('nip_peserta', '199607192022031008') }}</div>
            </div>
            <div class="data-row">
                <div class="data-label">Nama</div>
                <div class="data-value">{{ session('nama_peserta', 'Ilham Habibullah Akbar, S.Kom') }}</div>
            </div>
            <div class="data-row">
                <div class="data-label">Jabatan</div>
                <div class="data-value">{{ session('jabatan', 'Pranata Komputer Ahli Pertama') }}</div>
            </div>
            <div class="data-row">
                <div class="data-label">Instansi</div>
                <div class="data-value">{{ session('instansi', 'Badan Pengembangan Sumber Daya Manusia Daerah') }}</div>
            </div>
        </div>

        <div class="card-custom p-4" id="cardKetentuan">
            <h5 style="color: #444; font-size: 18px; margin-bottom: 0;">Form Evaluasi Terhadap Tenaga Pengajar atau Widyaiswara</h5>

            <div class="warning-box">
                <div class="warning-title">Perhatian</div>
                <ul class="warning-list">
                    <li>Sebelum mengisi form evaluasi, pastikan Materi dan Nama Pengajar sudah sesuai dengan yang sebenarnya. Jika terdapat ketidaksesuaian materi maupun pengajar mohon dapat disampaikan ke penyelenggara pelatihan.</li>
                    <li>Kuesioner dengan tanda bintang (<span class="wajib" style="margin:0;">*</span>) artinya wajib diisi.</li>
                    <li><strong>Khusus item kuesioner "Kerjasama antar Widyaiswara" hanya diisi jika pembelajaran secara tim / <em>team teaching</em>.</strong></li>
                </ul>
                <div class="text-center mt-4 pt-2">
                    <p style="color: #856404; font-size: 14px;">Klik tombol di bawah ini untuk menampilkan kuesioner</p>
                    <button type="button" class="btn btn-warning" id="btnTampilForm" style="background-color: #ffc107; border: none; font-weight: 500; padding: 10px 24px; color: #222;">Saya sudah membaca ketentuan di atas</button>
                </div>
            </div>
        </div>

        <div id="wrapperForm" style="display: none;">

            @if ($errors->any() || session('error'))
            <div class="alert alert-danger mb-4">
                <strong>Mohon lengkapi semua pertanyaan wajib sebelum submit.</strong>
            </div>
            @endif

            <form method="POST" action="{{ route('evaluasi-tp.store') }}">
                @csrf

                <input type="hidden" name="nip_peserta" value="{{ session('nip_peserta', '199607192022031008') }}">
                <input type="hidden" name="nama_peserta" value="{{ session('nama_peserta', 'Ilham Habibullah Akbar, S.Kom') }}">
                <input type="hidden" name="namadiklat" value="{{ session('nama_diklat', 'Pelatihan Teknis Bidang Kehumasan') }}">
                <input type="hidden" name="id_diklat_daftar_online" value="1">
                <input type="hidden" name="jenisdiklat" value="-">
                <input type="hidden" name="tahun" value="{{ date('Y') }}">
                <input type="hidden" name="nipwi" value="197001012000031001">
                <input type="hidden" name="namawi" value="MUHAMMAD ALAZIZ, SE, MM.">

                <div class="card-custom p-4 mt-4">

                    <div class="row border-bottom pb-4 mb-4" style="border-color: #eee !important;">
                        <div class="col-md-6">
                            <div class="form-header-title">Nama Pelatihan</div>
                            <div class="form-header-value">{{ session('nama_diklat', 'Pelatihan Teknis Bidang Kehumasan') }}</div>

                            <div class="form-header-title">Materi</div>
                            <select name="materi" class="form-control" style="font-size: 14px; color: #555; padding: 8px 12px; height: auto;">
                                <option value="Anti Korupsi">Anti Korupsi</option>
                                <option value="Kebijakan Publik">Kebijakan Publik</option>
                                <option value="Manajemen Risiko">Manajemen Risiko</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-header-title">Nama Pengajar / Widyaiswara</div>
                            <div class="custom-select-box">
                                <img src="https://ui-avatars.com/api/?name=Muhammad+Alaziz&background=random" alt="Avatar">
                                <div>
                                    <div style="font-weight: 600; font-size: 14px; color: #333;">MUHAMMAD ALAZIZ, SE, MM.</div>
                                    <div style="font-size: 12px; color: #888;">Mengajar</div>
                                </div>
                                <i class="fas fa-caret-down ml-auto" style="color: #999;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table-kuesioner">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No.</th>
                                    <th style="width: 45%;">Pertanyaan</th>
                                    <th class="text-center" style="width: 50%; padding-bottom: 15px;">
                                        Penilaian
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $unsur = [
                                1 => 'Penguasaan materi',
                                2 => 'Sistematika penyajian materi',
                                3 => 'Ketepatan waktu dan kehadiran',
                                4 => 'Penggunaan media / sarana pembelajaran (LCD, flipchart, dll)',
                                5 => 'Penggunaan metode pembelajaran (ceramah, tanya jawab, diskusi, game, kuis, dll)',
                                6 => 'Sikap dan perilaku saat mengajar',
                                7 => 'Penggunaan bahasa saat mengajar',
                                8 => 'Sikap dan perilaku saat bertanya / menjawab / merespon / memberi feedback',
                                9 => 'Penggunaan bahasa saat bertanya / menjawab / merespon / memberi feedback',
                                10 => 'Sikap dan perilaku saat memberi motivasi',
                                11 => 'Penggunaan bahasa saat memberi motivasi',
                                12 => 'Kecakapan menciptakan kondusivitas kelas',
                                13 => 'Kecakapan menjaga situasi kelas yang dinamis',
                                14 => 'Kerjasama antar Widyaiswara (khusus pembelajaran secara tim / team teaching)',
                                ];
                                @endphp

                                @foreach ($unsur as $no => $teks)
                                <tr>
                                    <td class="text-center">{{ $no }}.</td>
                                    <td>
                                        {{ $teks }} {!! $no != 14 ? '<span class="wajib">*</span>' : '' !!}

                                        @if($no == 2)
                                        <div class="sub-question">
                                            <ul>
                                                <li>Pembukaan yang terdiri dari perkenalan, menyampaikan tujuan pembelajaran, dll</li>
                                                <li>Isi</li>
                                                <li>Penutup yang terdiri dari evaluasi dan simpulan</li>
                                            </ul>
                                        </div>
                                        @endif
                                    </td>

                                    <td class="text-center align-middle">
                                        <div class="slider-container">
                                            <input type="range"
                                                class="slider-kuesioner"
                                                min="1" max="5" step="1" value="5"
                                                data-target="hasil-{{ $no }}"
                                                list="tickmarks-{{ $no }}"
                                                {{ $no != 14 ? 'required' : '' }}>

                                            <datalist id="tickmarks-{{ $no }}">
                                                <option value="1"></option>
                                                <option value="2"></option>
                                                <option value="3"></option>
                                                <option value="4"></option>
                                                <option value="5"></option>
                                            </datalist>

                                            <div class="slider-labels">
                                                <span>Tidak Baik</span>
                                                <span>Kurang Baik</span>
                                                <span>Cukup Baik</span>
                                                <span>Baik</span>
                                                <span>Sangat Baik</span>
                                            </div>

                                            <input type="hidden" name="hasil{{ $no }}" id="hasil-{{ $no }}" value="Sangat Baik">
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group mt-5">
                        <label style="font-size: 14px; color: #555;">Catatan atau saran</label>
                        <textarea name="saran" class="form-control" rows="4" style="border-radius: 4px;">{{ old('saran') }}</textarea>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-block btn-submit-custom mb-2">
                            <i class="far fa-paper-plane mr-1"></i> Submit
                        </button>
                        <a href="{{ url('/') }}" class="btn btn-block btn-cancel-custom">
                            Batalkan / Keluar
                        </a>
                    </div>

                </div>
            </form>
        </div>

        <div class="mt-4 mb-5" style="font-size: 13px; color: #0056b3;">
            &copy; BPSDMD Provinsi Jawa Tengah
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#btnTampilForm').click(function() {
                $('#cardKetentuan').slideUp(300, function() {
                    $('#wrapperForm').slideDown(400);
                });
            });

            @if($errors -> any() || session('error'))
            $('#cardKetentuan').hide();
            $('#wrapperForm').show();
            @endif
        });

        const mapNilai = {
            1: 'Tidak Baik',
            2: 'Kurang Baik',
            3: 'Cukup Baik',
            4: 'Baik',
            5: 'Sangat Baik'
        };

        $('.slider-kuesioner').on('input', function() {
            let val = $(this).val();

            let targetId = $(this).data('target');
            $('#' + targetId).val(mapNilai[val]);

            let percentage = ((val - 1) / 4) * 100;
            $(this).css('background', `linear-gradient(to right, #ffc107 ${percentage}%, #e9ecef ${percentage}%)`);
        });

        $('.slider-kuesioner').trigger('input');
    </script>
</body>

</html>