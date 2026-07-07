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
        body { background-color:#f4f7f6; font-family:'Montserrat',sans-serif; font-size:14px; color:#444; }
        .top-header { background-color:#28a745; color:white; padding:16px 24px; font-size:20px; letter-spacing:0.5px; }
        .card-custom { border:1px solid #e3e6f0; border-radius:4px; box-shadow:0 2px 4px rgba(0,0,0,0.04); margin-bottom:24px; background:#fff; }
        .data-row { padding:18px 24px; border-bottom:1px solid #f0f0f0; display:flex; }
        .data-row:last-child { border-bottom:none; }
        .data-label { color:#666; font-size:14px; width:25%; }
        .data-value { color:#333; font-size:14px; font-weight:500; width:75%; }
        .warning-box { background-color:#fff3cd; border-radius:4px; padding:24px; margin-top:20px; }
        .warning-title { color:#856404; font-size:20px; margin-bottom:16px; font-weight:600; }
        .warning-list { color:#856404; font-size:14px; padding-left:20px; line-height:1.8; margin-bottom:0; }
        .wajib { color:#dc3545; font-weight:bold; margin-left:4px; }
        .section-title { font-size:15px; font-weight:700; color:#28a745; padding:16px 24px 8px; border-bottom:2px solid #e8f5e9; margin-bottom:0; }
        .section-subtitle { font-size:13px; font-weight:600; color:#555; padding:12px 24px 4px; }
        .table-kuesioner { width:100%; color:#444; border-collapse:separate; border-spacing:0; }
        .table-kuesioner thead { position:sticky; top:0; z-index:10; background:#fff; box-shadow:0 2px 2px -1px rgba(0,0,0,0.1); }
        .table-kuesioner th, .table-kuesioner td { border:none; padding:12px 10px; vertical-align:top; }
        .table-kuesioner thead th { border-bottom:2px solid #eee; font-weight:700; color:#555; font-size:13px; }
        .table-kuesioner tbody tr { border-bottom:1px solid #f2f2f2; }
        .table-kuesioner tbody tr:last-child { border-bottom:none; }
        .btn-submit-custom { background-color:#ffc107; color:#222; font-weight:600; padding:12px; border:none; border-radius:4px; transition:0.2s; }
        .btn-submit-custom:hover { background-color:#e0a800; color:#222; }
        .btn-cancel-custom { background-color:#8c98a4; color:#fff; font-weight:600; padding:12px; border:none; border-radius:4px; transition:0.2s; }
        .btn-cancel-custom:hover { background-color:#727b84; color:#fff; }
        /* SLIDER */
        .slider-container { width:100%; padding:4px 0; }
        .slider-kuesioner { -webkit-appearance:none; width:100%; height:6px; border-radius:3px; outline:none; cursor:pointer; background:linear-gradient(to right,#ffc107 100%,#e9ecef 100%); }
        .slider-kuesioner::-webkit-slider-thumb { -webkit-appearance:none; width:20px; height:20px; border-radius:50%; background:#ffc107; cursor:pointer; border:2px solid #fff; box-shadow:0 1px 4px rgba(0,0,0,0.2); }
        .slider-kuesioner::-moz-range-thumb { width:20px; height:20px; border-radius:50%; background:#ffc107; cursor:pointer; border:2px solid #fff; }
        .slider-labels { display:flex; justify-content:space-between; margin-top:6px; }
        .slider-labels span { font-size:11px; color:#999; }
    </style>
</head>
<body>
<div class="top-header">EVALUASI PENYELENGGARAAN PELATIHAN</div>

<div class="container mt-4">

    {{-- Data Peserta --}}
    <div class="card-custom">
        <div class="data-row"><div class="data-label">NIP</div><div class="data-value">{{ session('data_peserta_ep.nip_peserta', old('nip_peserta', '-')) }}</div></div>
        <div class="data-row"><div class="data-label">Nama</div><div class="data-value">{{ session('data_peserta_ep.nama_peserta', old('nama_peserta', '-')) }}</div></div>
        <div class="data-row"><div class="data-label">Jabatan</div><div class="data-value">{{ session('data_peserta_ep.jabatan', old('jabatan', '-')) }}</div></div>
        <div class="data-row"><div class="data-label">Instansi</div><div class="data-value">{{ session('data_peserta_ep.instansi', old('instansi', '-')) }}</div></div>
        <div class="data-row"><div class="data-label">Pelatihan</div><div class="data-value">{{ session('data_peserta_ep.nama_pelatihan', old('nama_pelatihan', '-')) }}</div></div>
    </div>

    {{-- Kotak Perhatian --}}
    <div class="card-custom p-4" id="cardKetentuan">
        <h5 style="color:#444;font-size:18px;margin-bottom:0;">Form Evaluasi Penyelenggaraan Pelatihan</h5>
        <div class="warning-box">
            <div class="warning-title">Perhatian</div>
            <ul class="warning-list">
                <li>Isilah kuesioner ini dengan jujur sesuai pengalaman Anda selama mengikuti pelatihan.</li>
                <li>Pertanyaan bertanda bintang (<span class="wajib" style="margin:0;">*</span>) wajib diisi.</li>
                <li>Geser slider ke kanan untuk nilai lebih baik, ke kiri untuk nilai lebih rendah.</li>
            </ul>
            <div class="text-center mt-4 pt-2">
                <p style="color:#856404;font-size:14px;">Klik tombol di bawah ini untuk menampilkan kuesioner</p>
                <button type="button" class="btn btn-warning" id="btnTampilForm" style="background-color:#ffc107;border:none;font-weight:500;padding:10px 24px;color:#222;">
                    Saya sudah membaca ketentuan di atas
                </button>
            </div>
        </div>
    </div>

    {{-- Form Utama --}}
    <div id="wrapperForm" style="display:none;">

        @if ($errors->any() || session('error'))
            <div class="alert alert-danger mb-4">{{ session('error', 'Mohon lengkapi semua pertanyaan wajib sebelum submit.') }}</div>
        @endif

        <form method="POST" action="{{ route('evaluasi-penyelenggaraan.store') }}" id="form-eval-ep">
            @csrf
            <input type="hidden" name="nip_peserta"    value="{{ session('data_peserta_ep.nip_peserta') }}">
            <input type="hidden" name="nama_peserta"   value="{{ session('data_peserta_ep.nama_peserta') }}">
            <input type="hidden" name="jabatan"        value="{{ session('data_peserta_ep.jabatan') }}">
            <input type="hidden" name="instansi"       value="{{ session('data_peserta_ep.instansi') }}">
            <input type="hidden" name="nama_pelatihan" value="{{ session('data_peserta_ep.nama_pelatihan') }}">
            <input type="hidden" name="tahun"          value="{{ session('data_peserta_ep.tahun', date('Y')) }}">

            @php
            $sliderRow = function(string $name, string $label, bool $wajib = true, ?string $sub = null) {
                $req = $wajib ? 'required' : '';
                $wajibMark = $wajib ? '<span class="wajib">*</span>' : '';
                $subHtml = $sub ? '<div class="sub-question">' . $sub . '</div>' : '';
                return "
                <tr>
                    <td style='width:55%;padding:14px 10px;'>{$label}{$wajibMark}{$subHtml}</td>
                    <td style='width:45%;padding:14px 10px;'>
                        <div class='slider-container'>
                            <input type='range' class='slider-kuesioner' min='1' max='4' step='1' value='4'
                                data-target='val-{$name}' {$req}>
                            <div class='slider-labels'>
                                <span>Tidak Baik</span><span>Kurang Baik</span><span>Baik</span><span>Sangat Baik</span>
                            </div>
                            <input type='hidden' name='{$name}' id='val-{$name}' value='Sangat Baik'>
                        </div>
                    </td>
                </tr>";
            };
            @endphp

            {{-- ============================================================ --}}
            {{-- ASPEK 1: LAYANAN REGISTRASI DAN INFORMASI --}}
            {{-- ============================================================ --}}
            <div class="card-custom">
                <div class="section-title">1. Layanan Registrasi dan Informasi</div>
                <div class="table-responsive p-3">
                    <table class="table-kuesioner">
                        <thead><tr>
                            <th style="width:55%">Indikator Penilaian</th>
                            <th style="width:45%;text-align:center">Penilaian</th>
                        </tr></thead>
                        <tbody>
                            {!! $sliderRow('lay_1_1', 'Informasi pemanggilan peserta') !!}
                            {!! $sliderRow('lay_1_2', 'Kecepatan pelayanan registrasi') !!}
                            {!! $sliderRow('lay_1_3', 'Jadwal penyelenggaraan pelatihan') !!}
                            {!! $sliderRow('lay_1_4', 'Informasi tata tertib dan ketentuan pelatihan') !!}
                        </tbody>
                    </table>
                </div>
                <div class="section-subtitle">1.5 Sikap dan Perilaku Petugas Layanan Registrasi dan Informasi</div>
                <div class="table-responsive p-3">
                    <table class="table-kuesioner"><tbody>
                        {!! $sliderRow('lay_1_5_1', 'Sopan santun, kerapian dan keramahan petugas') !!}
                        {!! $sliderRow('lay_1_5_2', 'Respons terhadap kebutuhan dan keluhan peserta') !!}
                        {!! $sliderRow('lay_1_5_3', 'Penggunaan bahasa oleh petugas layanan registrasi dan informasi') !!}
                    </tbody></table>
                </div>
                <div class="p-3">
                    <label class="form-header-title">Catatan / Saran</label>
                    <textarea name="lay_catatan" class="form-control" rows="2"></textarea>
                </div>
            </div>

            {{-- ============================================================ --}}
            {{-- ASPEK 2: PROSES PEMBELAJARAN --}}
            {{-- ============================================================ --}}
            <div class="card-custom">
                <div class="section-title">2. Proses Pembelajaran</div>
                <div class="table-responsive p-3">
                    <table class="table-kuesioner">
                        <thead><tr>
                            <th style="width:55%">Indikator Penilaian</th>
                            <th style="width:45%;text-align:center">Penilaian</th>
                        </tr></thead>
                        <tbody>
                            {!! $sliderRow('pbm_2_1', 'Informasi pelaksanaan pelatihan') !!}
                            {!! $sliderRow('pbm_2_2', 'Kelengkapan bahan pembelajaran (modul, media pembelajaran, penugasan, dll)') !!}
                            {!! $sliderRow('pbm_2_3', 'Pemanfaatan teknologi dalam proses pembelajaran') !!}
                            {!! $sliderRow('pbm_2_4', 'Kejelasan informasi tentang tahapan pembelajaran') !!}
                            {!! $sliderRow('pbm_2_5', 'Pemantauan penyelenggaraan pada tahapan pembelajaran') !!}
                        </tbody>
                    </table>
                </div>
                <div class="section-subtitle">2.6 Sikap dan Perilaku Petugas Kelas</div>
                <div class="table-responsive p-3">
                    <table class="table-kuesioner"><tbody>
                        {!! $sliderRow('pbm_2_6_1', 'Sopan santun, kerapian dan keramahan petugas') !!}
                        {!! $sliderRow('pbm_2_6_2', 'Respons terhadap kebutuhan dan keluhan peserta') !!}
                        {!! $sliderRow('pbm_2_6_3', 'Ketersediaan media komunikasi') !!}
                        {!! $sliderRow('pbm_2_6_4', 'Kemudahan menghubungi petugas') !!}
                        {!! $sliderRow('pbm_2_6_5', 'Penggunaan bahasa oleh petugas kelas') !!}
                    </tbody></table>
                </div>
                <div class="p-3">
                    <label class="form-header-title">Catatan / Saran</label>
                    <textarea name="pbm_catatan" class="form-control" rows="2"></textarea>
                </div>
            </div>

            {{-- ============================================================ --}}
            {{-- ASPEK 3: SARANA DAN PRASARANA --}}
            {{-- ============================================================ --}}
            <div class="card-custom">
                <div class="section-title">3. Sarana dan Prasarana</div>
                <div class="table-responsive p-3">
                    <table class="table-kuesioner">
                        <thead><tr>
                            <th style="width:55%">Indikator Penilaian</th>
                            <th style="width:45%;text-align:center">Penilaian</th>
                        </tr></thead>
                        <tbody>
                            {!! $sliderRow('sarpras_3_1', 'Kelengkapan informasi sarana dan prasarana selama penyelenggaraan pelatihan') !!}
                            {!! $sliderRow('sarpras_3_2', 'Ketersediaan dan kualitas (kebersihan, fungsi, kerapihan, kenyamanan) ruang kelas, ruang makan, perpustakaan, ruang laktasi dan toilet') !!}
                            {!! $sliderRow('sarpras_3_3', 'Ketersediaan dan kualitas (kebersihan, fungsi, kerapihan, kenyamanan) asrama') !!}
                            {!! $sliderRow('sarpras_3_4', 'Kualitas pembimbing studi lapangan') !!}
                            {!! $sliderRow('sarpras_3_6', 'Ketersediaan, kebersihan dan keberfungsian fasilitas olahraga, unit kesehatan, tempat ibadah, sarana lainnya') !!}
                            {!! $sliderRow('sarpras_3_7', 'Ketersediaan dan kualitas literatur di perpustakaan') !!}
                            {!! $sliderRow('sarpras_3_8', 'Ketersediaan sarana bagi penyandang disabilitas dan kelompok khusus (step lobby, toilet khusus, jalur disabilitas, ruang laktasi, freezer ASI, dll)') !!}
                            {!! $sliderRow('sarpras_3_9', 'Ketersediaan ruang terbuka hijau') !!}
                            {!! $sliderRow('sarpras_3_10', 'Ketersediaan sarana pengaduan dan petugas yang menangani') !!}
                            {!! $sliderRow('sarpras_3_11', 'Keamanan lembaga pelatihan (satpam standby 24 jam, CCTV)') !!}
                            {!! $sliderRow('sarpras_3_12', 'Ketersediaan sarana pendukung lainnya (ATM, fotocopy, dll)') !!}
                        </tbody>
                    </table>
                </div>
                <div class="section-subtitle">3.5 Ketersediaan dan Kualitas Sarana Teknologi Informasi</div>
                <div class="table-responsive p-3">
                    <table class="table-kuesioner"><tbody>
                        {!! $sliderRow('sarpras_3_5_1', 'Kualitas LMS (Siptenan/Sinau Bareng) dalam hal kelengkapan fitur / menu') !!}
                        {!! $sliderRow('sarpras_3_5_2', 'Kemudahan dalam mengakses dan mengikuti sistem pembelajaran e-learning melalui LMS') !!}
                        {!! $sliderRow('sarpras_3_5_3', 'Jaringan internet (WiFi) saat klasikal di BPSDMD Provinsi Jawa Tengah') !!}
                        {!! $sliderRow('sarpras_3_5_4', 'Jaringan internet di BPSDMD Provinsi Jawa Tengah pada pembelajaran online / synchronous') !!}
                    </tbody></table>
                </div>
                <div class="section-subtitle">3.13 Sikap dan Perilaku Petugas Asrama</div>
                <div class="table-responsive p-3">
                    <table class="table-kuesioner"><tbody>
                        {!! $sliderRow('sarpras_3_13_1', 'Sopan santun, kerapian dan keramahan petugas') !!}
                        {!! $sliderRow('sarpras_3_13_2', 'Respons terhadap kebutuhan dan keluhan peserta') !!}
                        {!! $sliderRow('sarpras_3_13_3', 'Ketersediaan media komunikasi') !!}
                        {!! $sliderRow('sarpras_3_13_4', 'Kemudahan menghubungi petugas') !!}
                    </tbody></table>
                </div>
                <div class="p-3">
                    <label class="form-header-title">Catatan / Saran</label>
                    <textarea name="sarpras_catatan" class="form-control" rows="2"></textarea>
                </div>
            </div>

            {{-- ============================================================ --}}
            {{-- ASPEK 4: KONSUMSI --}}
            {{-- ============================================================ --}}
            <div class="card-custom">
                <div class="section-title">4. Konsumsi</div>
                <div class="table-responsive p-3">
                    <table class="table-kuesioner">
                        <thead><tr>
                            <th style="width:55%">Indikator Penilaian</th>
                            <th style="width:45%;text-align:center">Penilaian</th>
                        </tr></thead>
                        <tbody>
                            {!! $sliderRow('kon_4_1', 'Kecukupan gizi dari menu yang dihidangkan') !!}
                            {!! $sliderRow('kon_4_2', 'Kecukupan hidangan konsumsi bagi seluruh peserta') !!}
                            {!! $sliderRow('kon_4_3', 'Kebersihan dalam penyajian makanan') !!}
                            {!! $sliderRow('kon_4_4', 'Ketepatan waktu penyajian makanan') !!}
                            {!! $sliderRow('kon_4_5', 'Variasi menu makanan yang disajikan') !!}
                        </tbody>
                    </table>
                </div>
                <div class="section-subtitle">4.6 Sikap dan Perilaku Petugas Konsumsi</div>
                <div class="table-responsive p-3">
                    <table class="table-kuesioner"><tbody>
                        {!! $sliderRow('kon_4_6_1', 'Sopan santun, kerapian dan keramahan petugas konsumsi') !!}
                        {!! $sliderRow('kon_4_6_2', 'Respons terhadap kebutuhan dan keluhan peserta') !!}
                        {!! $sliderRow('kon_4_6_3', 'Kemudahan menghubungi petugas konsumsi') !!}
                        {!! $sliderRow('kon_4_6_4', 'Penggunaan bahasa oleh petugas konsumsi') !!}
                    </tbody></table>
                </div>
                <div class="p-3">
                    <label class="form-header-title">Catatan / Saran</label>
                    <textarea name="kon_catatan" class="form-control" rows="2"></textarea>
                </div>
            </div>

            {{-- Tombol submit --}}
            <div class="card-custom p-4">
                <div class="form-group">
                    <label style="font-size:14px;color:#555;">Saran umum / masukan lainnya</label>
                    <textarea name="saran_umum" class="form-control" rows="3"></textarea>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-block btn-submit-custom mb-2">
                        <i class="far fa-paper-plane mr-1"></i> Submit Evaluasi
                    </button>
                    <a href="{{ url('/') }}" class="btn btn-block btn-cancel-custom">Batalkan / Keluar</a>
                </div>
            </div>

        </form>
    </div>

    <div class="mt-4 mb-5" style="font-size:13px;color:#0056b3;">
        &copy; BPSDMD Provinsi Jawa Tengah
    </div>
</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/popper/popper.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script>
    const mapNilai4 = { 1:'Tidak Baik', 2:'Kurang Baik', 3:'Baik', 4:'Sangat Baik' };

    function initSliders() {
        $('.slider-kuesioner').on('input', function() {
            var val = parseInt($(this).val());
            var targetId = $(this).data('target');
            $('#' + targetId).val(mapNilai4[val]);
            var pct = ((val - 1) / 3) * 100;
            $(this).css('background', 'linear-gradient(to right, #ffc107 ' + pct + '%, #e9ecef ' + pct + '%)');
        });
        $('.slider-kuesioner').trigger('input');
    }

    $(document).ready(function() {
        $('#btnTampilForm').click(function() {
            $('#cardKetentuan').slideUp(300, function() {
                $('#wrapperForm').slideDown(400, function() {
                    initSliders();
                });
            });
        });

        @if ($errors->any() || session('error'))
            $('#cardKetentuan').hide();
            $('#wrapperForm').show();
            initSliders();
        @endif
    });
</script>
</body>
</html>