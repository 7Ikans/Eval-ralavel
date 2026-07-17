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

        .table-responsive {
            padding: 0 25px;
        }

        .table-kuesioner {
            table-layout: fixed;
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
            box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.1);
        }

        .table-kuesioner th,
        .table-kuesioner td {
            border: none;
            padding: 20px 15px;
            vertical-align: middle;
        }

        .table-kuesioner thead th {
            border-bottom: 2px solid #eee;
            font-weight: 700;
            color: #555;
        }

        .table-kuesioner tbody tr {
            border-bottom: 1px solid #f2f2f2;
        }

        .slider-container {
            width: 100% !important;
            min-width: 100%;
            display: block;
            padding: 10px 0;
        }

        .slider-kuesioner {
            -webkit-appearance: none;
            width: 100% !important;
            min-width: 100% !important;
            display: block;
            height: 8px;
            border-radius: 5px;
            background: #ffc107;
            outline: none;
            margin: 10px 0;
            box-sizing: border-box;
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
            padding: 0 11px;
        }

        .slider-labels span {
            display: flex;
            justify-content: center;
            width: 1px;
            white-space: nowrap;
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

            @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <strong>Gagal Submit! Ada data yang tidak valid:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @elseif (session('error'))
            <div class="alert alert-danger mb-4">
                <strong>{{ session('error') }}</strong>
            </div>
            @endif

            <form method="POST" action="{{ route('evaluasi-tp.store') }}">
                @csrf

                <input type="hidden" name="nip_peserta" value="{{ $peserta['nip_peserta'] ?? '' }}">
                <input type="hidden" name="nama_peserta" value="{{ $peserta['nama_peserta'] ?? '' }}">
                <input type="hidden" name="namadiklat" value="{{ $peserta['nama_pelatihan'] ?? '' }}">
                <input type="hidden" name="id_diklat_daftar_online" value="{{ $peserta['id_diklat_daftar_online'] ?? '' }}">
                <input type="hidden" name="jenisdiklat" value="-">
                <input type="hidden" name="tahun" value="{{ date('Y') }}">
                <input type="hidden" name="nipwi" id="hidden_nip_wi" value="">
                <input type="hidden" name="namawi" id="hidden_nama_wi" value="">
                <input type="hidden" name="materi" id="hidden_materi" value="">

                <div class="card-custom p-4 mt-4">

                    <div class="row border-bottom pb-4 mb-4" style="border-color: #eee !important;">

                        <div class="col-md-6">
                            <div class="form-header-title">Nama Pelatihan</div>
                            <div class="form-header-value">{{ $peserta['nama_pelatihan'] ?? '-' }}</div>

                            <div class="form-header-title">Materi</div>
                            <select id="select-materi" class="form-control" style="font-size: 14px; color: #555; padding: 8px 12px; height: auto;" required>
                                <option value="">Pilih Materi</option>
                                @if(isset($materi))
                                @foreach($materi as $m)
                                <option value="{{ $m->id_materi }}" data-nama="{{ $m->nama_materi }}">{{ $m->nama_materi }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md-6">
                            <div class="form-header-title">Nama Pengajar / Widyaiswara</div>
                            <div class="custom-select-box">
                                <img id="foto_wi" src="https://ui-avatars.com/api/?name=Pilih+Pengajar&background=random" alt="Avatar">
                                <div style="flex-grow: 1;">
                                    <select id="select-widyaiswara" class="form-control" style="font-size: 14px; color: #333; padding: 6px 10px; height: auto; border: 1px solid #ccc; font-weight: 600;" required>
                                        <option value="">Pilih Materi Terlebih Dahulu</option>
                                    </select>
                                    <div style="font-size: 12px; color: #888; margin-top: 4px; padding-left: 4px;">Mengajar</div>
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
                    </div>

                    <div class="form-group mt-5">
                        <label style="font-size: 14px; color: #555;">Catatan atau saran</label>
                        <textarea name="saran" class="form-control" rows="4" style="border-radius: 4px;">{{ old('saran') }}</textarea>
                    </div>

                    <div class="mt-4">
                        <button type="submit" id="btnSubmitEvaluasi" class="btn btn-block btn-submit-custom mb-2">
                            <i class="far fa-paper-plane mr-1"></i> Submit
                        </button>
                        <a href="{{ url('/') }}" class="btn btn-block btn-cancel-custom">
                            Batalkan / Keluar
                        </a>
                    </div>
            </form>
        </div>

        <div class="mt-4 mb-5" style="font-size: 13px; color: #0056b3;">
            &copy; BPSDMD Provinsi Jawa Tengah
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper/popper.min.js') }}"></script>
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

            $('#select-materi').change(function() {
                var idMateri = $(this).val();
                var namaMateri = $(this).find(':selected').data('nama');
                $('#hidden_materi').val(namaMateri);
                $('#hidden_nama_wi').val('');
                $('#hidden_nip_wi').val('');
                var $selectWi = $('#select-widyaiswara');
                $selectWi.empty().append('<option value="">Mencari data...</option>');

                if (idMateri !== '') {
                    $.ajax({
                        url: "{{ route('evaluasi-tp.get-widyaiswara') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            materi: idMateri
                        },
                        success: function(response) {
                            if (response.status === 'success' && response.data.length > 0) {
                                $selectWi.empty().append('<option value="">Pilih Pengajar</option>');
                                $.each(response.data, function(index, wi) {
                                    $selectWi.append('<option value="' + wi.nip_wi + '" data-nama="' + wi.nama_wi + '">' + wi.nama_wi + '</option>');
                                });
                            } else {
                                $selectWi.empty().append('<option value="">Data pengajar tidak ditemukan</option>');
                            }
                        },
                        error: function() {
                            $selectWi.empty().append('<option value="">Terjadi kesalahan sistem</option>');
                        }
                    });
                } else {
                    $selectWi.empty().append('<option value="">Pilih Materi Terlebih Dahulu</option>');
                }
            });

            $('#select-widyaiswara').change(function() {
                var nipWi = $(this).val();
                var $selected = $(this).find(':selected');
                var namaWi = $selected.data('nama');
                var fotoWi = $selected.data('foto');
                var $fotoImg = $('#foto_wi');

                if (namaWi) {
                    if (fotoWi && fotoWi !== '') {
                        var imageUrl = '{{ asset("img/foto_wi/") }}/' + fotoWi;
                        $fotoImg.off('error').on('error', function() {
                            $(this).attr('src', 'https://ui-avatars.com/api/?name=' + encodeURIComponent(namaWi) + '&background=random');
                        }).attr('src', imageUrl);
                    } else {
                        $fotoImg.off('error').attr('src', 'https://ui-avatars.com/api/?name=' + encodeURIComponent(namaWi) + '&background=random');
                    }
                } else {
                    $fotoImg.off('error').attr('src', 'https://ui-avatars.com/api/?name=Pilih+Pengajar&background=random');
                }

                $('#hidden_nip_wi').val(nipWi);
                $('#hidden_nama_wi').val(namaWi);
            });
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

        $('form').on('submit', function() {
            $('#btnSubmitEvaluasi').prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-1"></i> Menyimpan...');
        });
    </script>

    @if(session('warning') || session('error'))
    <div class="modal fade" id="modalAlertSession" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 4px; border: none; box-shadow: 0 8px 20px rgba(0,0,0,0.2);">
                <div class="modal-header" id="alertModalHeader" style="border-bottom: 1px solid #eee; padding: 20px 25px; background-color: #fff3cd; border-top-left-radius: 4px; border-top-right-radius: 4px;">
                    <h5 class="modal-title font-weight-bold" id="alertModalTitle" style="font-family: 'Montserrat', sans-serif; font-size: 17px; color: #856404;">
                        <i class="fa fa-exclamation-triangle" style="margin-right: 8px;"></i> PERHATIAN
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 35px 30px; text-align: center;">
                    <p style="font-family: 'Droid Serif', serif; font-size: 16px; color: #444; line-height: 1.6; margin-bottom: 0;">
                        {{ session('warning') ?? session('error') }}
                    </p>
                </div>
                <div class="modal-footer" style="border-top: none; padding: 15px 25px; justify-content: center;">
                    <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal" style="background-color: #858c93; border: none; padding: 10px 30px; font-family: 'Montserrat', sans-serif; border-radius: 4px; letter-spacing: 1px;">MENGERTI</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            @if(session('error'))
            $('#alertModalHeader').css('background-color', '#f8d7da');
            $('#alertModalTitle').css('color', '#721c24').html('<i class="fa fa-times-circle" style="margin-right: 8px;"></i> GAGAL');
            @endif

            $('#modalAlertSession').modal('show');
        });
    </script>
    @endif
</body>

</html>