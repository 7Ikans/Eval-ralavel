<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Evaluasi | BPSDMD Provinsi Jawa Tengah</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* ---- NAVBAR ---- */
        #mainNav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            background: transparent;
            padding: 16px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: background 0.3s;
        }

        #mainNav.scrolled {
            background: #222;
        }

        .navbar-brand {
            color: #fed136 !important;
            font-family: 'Kaushan Script', cursive;
            font-size: 22px;
            text-decoration: none;
        }

        .navbar-right-link {
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .navbar-right-link:hover {
            color: #fed136;
            text-decoration: none;
        }

        /* ---- HERO ---- */
        header.masthead {
            min-height: 100vh;
            background-image: url("{{ asset('img/header.jpg') }}");
            background-size: cover;
            background-position: center center;
            background-attachment: scroll;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            position: relative;
        }

        header.masthead::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
        }

        .intro-text {
            position: relative;
            z-index: 2;
            padding: 120px 20px 80px;
            max-width: 820px;
        }

        .intro-text img.logo {
            width: 160px;
            margin-bottom: 20px;
        }

        .intro-lead-in {
            font-family: 'Kaushan Script', cursive;
            font-size: 38px;
            line-height: 1.2;
            margin-bottom: 16px;
        }

        .intro {
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 32px;
            color: rgba(255, 255, 255, 0.9);
        }

        .btn-xl {
            display: inline-block;
            background: #fed136;
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 18px 40px;
            border-radius: 3px;
            text-decoration: none;
            font-family: 'Montserrat', sans-serif;
            transition: background 0.2s;
        }

        .btn-xl:hover {
            background: #e6bc2a;
            color: #fff;
            text-decoration: none;
        }

        /* ---- PORTFOLIO SECTION ---- */
        #portfolio {
            background: #f8f9fa;
            padding: 80px 0;
        }

        .section-heading {
            font-size: 28px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 60px;
            color: #333;
        }

        .portfolio-item {
            margin-bottom: 30px;
            text-align: center;
        }

        .portfolio-link {
            display: block;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            text-decoration: none;
        }

        .portfolio-link img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .portfolio-link:hover img {
            transform: scale(1.04);
        }

        .portfolio-hover {
            position: absolute;
            inset: 0;
            background: rgba(254, 209, 54, 0.88);
            opacity: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.3s ease;
        }

        .portfolio-link:hover .portfolio-hover {
            opacity: 1;
        }

        .portfolio-hover i {
            font-size: 36px;
            color: #fff;
        }

        .portfolio-caption {
            padding: 20px 10px 10px;
        }

        .portfolio-caption h5 {
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #333;
            margin: 0;
        }

        /* ---- FOOTER ---- */
        footer {
            background: #222;
            color: #999;
            padding: 28px 0;
            font-size: 13px;
            text-align: center;
        }

        footer a {
            color: #fed136;
            text-decoration: none;
        }

        footer a:hover {
            color: #e6bc2a;
        }

        .footer-social {
            margin: 12px 0 8px;
        }

        .footer-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #444;
            color: #fff;
            margin: 0 4px;
            font-size: 15px;
            transition: background 0.2s;
        }

        .footer-social a:hover {
            background: #fed136;
            color: #fff;
        }
    </style>
</head>

<body id="page-top">

    <nav id="mainNav">
        <a class="navbar-brand" href="#page-top">Evaluasi</a>
        <a class="navbar-right-link" href="https://bpsdmd.jatengprov.go.id" target="_blank">BPSDMD Provinsi Jawa Tengah</a>
    </nav>

    <header class="masthead">
        <div class="intro-text">
            <img class="logo" src="{{ asset('img/jawa.png') }}" alt="Logo Jawa Tengah">
            <div class="intro-lead-in">Evaluasi</div>
            <div class="intro">
                Dalam mengembangkan kompetensi dan kualitas SDM Aparatur di Jawa Tengah perlu adanya standarisasi
                pelaksanaan pelatihan yang meliputi analisis kebutuhan pengembangan kompetensi, kurikulum, sarana &amp;
                prasarana serta output keberhasilan pelaksanaan pelatihan yang terukur. Sehingga dapat dijadikan pedoman
                bagi pembuat kebijakan untuk mengevaluasi pelaksanaan pelatihan. Dalam hal ini dalam menjaga mutu
                pelaksanaan pelatihan, BPSDMD Provinsi Jawa Tengah memanfaatkan teknologi informasi yang dibagi menjadi
                beberapa proses meliputi Perencanaan, Pelaksanaan, Evaluasi serta Pelayanan Publik.
            </div>
            <a href="#portfolio" class="btn-xl">Menuju ke Evaluasi</a>
        </div>
    </header>

    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-heading">Evaluasi</h2>
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-lg-4 col-md-6 portfolio-item">
                    <a class="portfolio-link" href="#" data-toggle="modal" data-target="#modalNip">
                        <img src="{{ asset('img/portfolio/01-thumbnail.jpg') }}" alt="Evaluasi Tenaga Pengajar">
                        <div class="portfolio-hover">
                            <i class="fa fa-edit"></i>
                        </div>
                    </a>
                    <div class="portfolio-caption">
                        <h5>Evaluasi Tenaga Pengajar</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item">
                    <a class="portfolio-link" href="#" data-toggle="modal" data-target="#modalNipPenyelenggaraan">
                        <img src="{{ asset('img/portfolio/04-thumbnail.jpg') }}" alt="Evaluasi Penyelenggaraan">
                        <div class="portfolio-hover">
                            <i class="fa fa-edit"></i>
                        </div>
                    </a>
                    <div class="portfolio-caption">
                        <h5>Evaluasi Penyelenggaraan Pelatihan</h5>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="modal fade" id="modalNip" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 4px;">
                <div class="modal-header" style="border-bottom: 1px solid #eee; padding: 20px 25px;">
                    <h5 class="modal-title font-weight-bold" style="font-family: 'Montserrat', sans-serif; font-size: 18px; color: #333;">EVALUASI TENAGA PENGAJAR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 25px;">
                    <p style="font-family: 'Droid Serif', serif; font-size: 16px; color: #555; line-height: 1.6; margin-bottom: 20px;">
                        Masukkan NIP Anda untuk mengkonfirmasi bahwa Anda sudah melakukan pendaftaran online sebelum mengikuti pelatihan
                    </p>
                    <div class="form-group mb-2">
                        <input type="text" class="form-control" id="inputNip" placeholder="Masukkan NIP tanpa spasi" style="font-family: 'Droid Serif', serif; padding: 12px; font-size: 15px;">
                    </div>
                    <div id="resultNip" class="mt-2" style="font-family: 'Montserrat', sans-serif; font-size: 14px;"></div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #eee; padding: 15px 25px;">
                    <button type="button" class="btn btn-danger" id="btnCekNip" style="background-color: #dc3545; padding: 8px 16px; font-weight: bold;">Cek NIP</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #858c93; border-color: #858c93; padding: 8px 16px;">Close</button>

                    <button type="button" class="btn btn-warning font-weight-bold d-none" id="btnLanjutTP" style="background-color: #ffca28; color: #fff; border: none; padding: 8px 16px;">LANJUTKAN EVALUASI TENAGA PENGAJAR</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalNipPenyelenggaraan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 4px;">
                <div class="modal-header" style="border-bottom: 1px solid #eee; padding: 20px 25px;">
                    <h5 class="modal-title font-weight-bold" style="font-family: 'Montserrat', sans-serif; font-size: 18px; color: #333;">EVALUASI PENYELENGGARAAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 25px;">
                    <p style="font-family: 'Droid Serif', serif; font-size: 16px; color: #555; line-height: 1.6; margin-bottom: 20px;">
                        Masukkan NIP Anda untuk mengkonfirmasi bahwa Anda sudah melakukan pendaftaran online sebelum mengikuti pelatihan
                    </p>
                    <div class="form-group mb-2">
                        <input type="text" class="form-control" id="inputNipPenyelenggaraan" placeholder="Masukkan NIP tanpa spasi" style="font-family: 'Droid Serif', serif; padding: 12px; font-size: 15px;">
                    </div>
                    <div id="resultNipPenyelenggaraan" class="mt-2" style="font-family: 'Montserrat', sans-serif; font-size: 14px;"></div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #eee; padding: 15px 25px;">
                    <button type="button" class="btn btn-danger" id="btnCekNipPenyelenggaraan" style="background-color: #dc3545; padding: 8px 16px; font-weight: bold;">Cek NIP</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #858c93; border-color: #858c93; padding: 8px 16px;">Close</button>

                    <button type="button" class="btn btn-warning font-weight-bold d-none" id="btnLanjutPenyelenggaraan" style="background-color: #ffca28; color: #fff; border: none; padding: 8px 16px;">LANJUTKAN EVALUASI PENYELENGGARAAN</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="border-radius: 4px;">
                <div class="modal-header" style="border-bottom: 1px solid #eee; padding: 20px 25px;">
                    <h5 class="modal-title font-weight-bold" style="font-family: 'Montserrat', sans-serif; font-size: 18px; color: #333;">KONFIRMASI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 25px 35px;">
                    <p id="teksKonfirmasi" style="font-family: 'Droid Serif', serif; font-size: 16px; color: #333; line-height: 1.6; margin-bottom: 30px;">
                        Berikut adalah data Anda, jika sudah benar silakan bisa melanjutkan ke form Evaluasi
                    </p>

                    <table class="table table-borderless" style="font-family: 'Droid Serif', serif; font-size: 15px; color: #222;">
                        <tbody>
                            <tr>
                                <td style="width: 30%; padding-left: 0; padding-bottom: 15px;">NIP</td>
                                <td style="width: 70%; padding-bottom: 15px;" id="konfNip"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 0; padding-bottom: 15px;">Nama</td>
                                <td style="padding-bottom: 15px;" id="konfNama"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 0; padding-bottom: 15px;">Jabatan</td>
                                <td style="padding-bottom: 15px;" id="konfJabatan"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 0; padding-bottom: 15px;">Instansi</td>
                                <td style="padding-bottom: 15px;" id="konfInstansi"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 0; padding-bottom: 15px;">Pelatihan yang diikuti</td>
                                <td style="padding-bottom: 15px;" id="konfPelatihan"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 0; padding-bottom: 15px;">Tahun</td>
                                <td style="padding-bottom: 15px;" id="konfTahun"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #eee; padding: 15px 25px; justify-content: flex-end;">
                    <a href="#" class="btn btn-warning font-weight-bold" id="btnLanjutEvaluasi" style="background-color: #ffca28; color: #fff; border: none; padding: 10px 20px;">LANJUTKAN EVALUASI</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #858c93; border: none; padding: 10px 20px;">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAlertSession" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 4px; border: none; box-shadow: 0 8px 20px rgba(0,0,0,0.2);">
                <div class="modal-header" id="alertModalHeader" style="border-bottom: 1px solid #eee; padding: 20px 25px; background-color: #fff3cd; border-top-left-radius: 4px; border-top-right-radius: 4px;">
                    <h5 class="modal-title font-weight-bold" id="alertModalTitle" style="font-family: 'Montserrat', sans-serif; font-size: 17px; color: #856404;">
                        <i class="fa fa-exclamation-triangle" style="margin-right: 8px;"></i> PERHATIAN
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: inherit; opacity: 0.7;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 35px 30px; text-align: center;">
                    <p style="font-family: 'Droid Serif', serif; font-size: 16px; color: #444; line-height: 1.6; margin-bottom: 0;">
                        @if(session('warning'))
                        {{ session('warning') }}
                        @elseif(session('error'))
                        {{ session('error') }}
                        @endif
                    </p>
                </div>
                <div class="modal-footer" style="border-top: none; padding: 15px 25px; justify-content: center;">
                    <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal" style="background-color: #858c93; border: none; padding: 10px 30px; font-family: 'Montserrat', sans-serif; border-radius: 4px; letter-spacing: 1px;">MENGERTI</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-social">
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <div>COPYRIGHT &copy; <a href="https://bpsdmd.jatengprov.go.id" target="_blank">BPSDMD Jawa Tengah</a></div>
    </footer>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
        // Setup CSRF Token untuk request AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Efek Navbar
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 60) {
                $('#mainNav').addClass('scrolled');
            } else {
                $('#mainNav').removeClass('scrolled');
            }
        });

        // Smooth scroll tombol utama
        $('a[href="#portfolio"]').on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $('#portfolio').offset().top
            }, 600);
        });

        // Fungsi helper: submit form POST untuk set session lalu redirect
        function submitSetSession(url, data) {
            var form = $('<form method="POST" style="display:none">');
            form.attr('action', url);
            form.append('<input name="_token" value="{{ csrf_token() }}">');
            $.each(data, function(key, val) {
                form.append('<input name="' + key + '" value="' + $('<div>').text(val).html() + '">');
            });
            $('body').append(form);
            form.submit();
        }

        // Menyimpan data peserta sementara dari response cek NIP
        var dataPesertaTP = {};
        var dataPesertaEP = {};

        // AJAX Cek NIP - Tenaga Pengajar
        $('#btnCekNip').click(function() {
            let nip = $('#inputNip').val().trim();
            if (!nip) {
                alert('Harap isi NIP!');
                return;
            }
            $('#resultNip').html('<span class="text-info">Mengecek data...</span>');

            $.ajax({
                url: "{{ route('cek-nip') }}",
                type: "POST",
                data: {
                    nip_peserta: nip
                },
                success: function(res) {
                    if (res.ditemukan === 'yes') {
                        dataPesertaTP = {
                            nip_peserta: res.nip_peserta,
                            nama_peserta: res.nama_peserta,
                            jabatan: res.jabatan || '-',
                            instansi: res.instansi || '-',
                            id_diklat_daftar_online: res.id_pelatihan || 1,
                            jenis_pelatihan: res.jenis_pelatihan || '-',
                            nama_pelatihan: res.nama_pelatihan || '-',
                            tahun: res.tahun || new Date().getFullYear()
                        };
                        // Isi modal konfirmasi
                        $('#konfNip').text(dataPesertaTP.nip_peserta);
                        $('#konfNama').text(dataPesertaTP.nama_peserta);
                        $('#konfJabatan').text(dataPesertaTP.jabatan);
                        $('#konfInstansi').text(dataPesertaTP.instansi);
                        $('#konfPelatihan').text(dataPesertaTP.nama_pelatihan);
                        $('#konfTahun').text(dataPesertaTP.tahun);
                        $('#teksKonfirmasi').text('Berikut adalah data Anda, jika sudah benar silakan bisa melanjutkan ke form Evaluasi Tenaga Pengajar');
                        $('#btnLanjutEvaluasi').data('tipe', 'tp').text('LANJUTKAN EVALUASI TENAGA PENGAJAR');
                        $('#modalNip').modal('hide');
                        $('#modalKonfirmasi').modal('show');
                    } else {
                        $('#resultNip').html('<span class="text-danger">Data NIP tidak ditemukan.</span>');
                    }
                },
                error: function() {
                    // Localhost mode: data dummy
                    dataPesertaTP = {
                        id_diklat_daftar_online: res.id_pelatihan || 1, // Ini yang diubah
                        nip_peserta: res.nip_peserta,
                        nama_peserta: res.nama_peserta,
                        jabatan: res.jabatan || '-',
                        instansi: res.instansi || '-',
                        jenis_pelatihan: res.jenis_pelatihan || '-',
                        nama_pelatihan: res.nama_pelatihan || '-',
                        tahun: res.tahun || new Date().getFullYear()
                    };
                    $('#resultNip').html('<span class="text-warning">(Localhost) Database eksternal tidak tersedia.</span>');
                    $('#btnLanjutTP').removeClass('d-none');
                    $('#btnCekNip').addClass('d-none');
                }
            });
        });

        // Tombol Lanjutkan ke Form TP (dari modal NIP langsung)
        $('#btnLanjutTP').click(function(e) {
            e.preventDefault();
            submitSetSession("{{ route('evaluasi-tp.set-session') }}", dataPesertaTP);
        });

        // AJAX Cek NIP - Penyelenggaraan
        $('#btnCekNipPenyelenggaraan').click(function() {
            let nip = $('#inputNipPenyelenggaraan').val().trim();
            if (!nip) {
                alert('Harap isi NIP!');
                return;
            }
            $('#resultNipPenyelenggaraan').html('<span class="text-info">Mengecek data...</span>');

            $.ajax({
                url: "{{ route('cek-nip') }}",
                type: "POST",
                data: {
                    nip_peserta: nip
                },
                success: function(res) {
                    if (res.ditemukan === 'yes') {
                        // Simpan semua field secara eksplisit agar tidak ada yang kosong
                        dataPesertaEP = {
                            id_diklat_daftar_online: res.id_pelatihan || 1, // Ini yang diubah
                            nip_peserta: res.nip_peserta,
                            nama_peserta: res.nama_peserta,
                            jabatan: res.jabatan || '-',
                            instansi: res.instansi || '-',
                            jenis_pelatihan: res.jenis_pelatihan || '-',
                            nama_pelatihan: res.nama_pelatihan || '-',
                            tahun: res.tahun || new Date().getFullYear()
                        };

                        // Isi modal konfirmasi
                        $('#konfNip').text(dataPesertaEP.nip_peserta);
                        $('#konfNama').text(dataPesertaEP.nama_peserta);
                        $('#konfJabatan').text(dataPesertaEP.jabatan);
                        $('#konfInstansi').text(dataPesertaEP.instansi);
                        $('#konfPelatihan').text(dataPesertaEP.nama_pelatihan);
                        $('#konfTahun').text(dataPesertaEP.tahun);

                        // Sesuaikan teks dan tombol untuk Evaluasi Penyelenggaraan
                        $('#teksKonfirmasi').text('Berikut adalah data Anda, jika sudah benar silakan bisa melanjutkan ke form Evaluasi Penyelenggaraan');
                        $('#btnLanjutEvaluasi').data('tipe', 'ep').text('LANJUTKAN EVALUASI PENYELENGGARAAN');

                        // Tutup modal NIP, buka modal konfirmasi
                        $('#modalNipPenyelenggaraan').modal('hide');
                        $('#modalKonfirmasi').modal('show');
                    } else {
                        $('#resultNipPenyelenggaraan').html('<span class="text-danger">Data NIP tidak ditemukan.</span>');
                    }
                },
                error: function() {
                    // Localhost mode: data dummy
                    dataPesertaEP = {
                        nip_peserta: nip,
                        nama_peserta: 'Peserta (Dummy)',
                        jabatan: '-',
                        instansi: '-',
                        id_pelatihan: 1,
                        jenis_pelatihan: '-',
                        nama_pelatihan: 'Pelatihan (Dummy)',
                        tahun: new Date().getFullYear()
                    };

                    // Supaya localhost/error juga menampilkan modal konfirmasi
                    $('#konfNip').text(dataPesertaEP.nip_peserta);
                    $('#konfNama').text(dataPesertaEP.nama_peserta);
                    $('#konfJabatan').text(dataPesertaEP.jabatan);
                    $('#konfInstansi').text(dataPesertaEP.instansi);
                    $('#konfPelatihan').text(dataPesertaEP.nama_pelatihan);
                    $('#konfTahun').text(dataPesertaEP.tahun);
                    $('#teksKonfirmasi').text('Berikut adalah data Anda, jika sudah benar silakan bisa melanjutkan ke form Evaluasi Penyelenggaraan');
                    $('#btnLanjutEvaluasi').data('tipe', 'ep').text('LANJUTKAN EVALUASI PENYELENGGARAAN');

                    $('#modalNipPenyelenggaraan').modal('hide');
                    $('#modalKonfirmasi').modal('show');
                }
            });
        });

        // Tombol Lanjutkan ke Form Penyelenggaraan
        $('#btnLanjutPenyelenggaraan').click(function(e) {
            e.preventDefault();
            submitSetSession("{{ route('evaluasi-penyelenggaraan.set-session') }}", dataPesertaEP);
        });

        // Tombol LANJUTKAN EVALUASI di modal konfirmasi (jika masih dipakai)
        $('#btnLanjutEvaluasi').click(function(e) {
            e.preventDefault();
            var tipe = $(this).data('tipe');
            if (tipe === 'ep') {
                submitSetSession("{{ route('evaluasi-penyelenggaraan.set-session') }}", dataPesertaEP);
            } else {
                submitSetSession("{{ route('evaluasi-tp.set-session') }}", dataPesertaTP);
            }
        });
    </script>

    @if(session('warning') || session('error'))
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