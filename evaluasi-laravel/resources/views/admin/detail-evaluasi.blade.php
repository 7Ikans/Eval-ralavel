@extends('layouts.admin')

@section('title', 'Detail Evaluasi Tenaga Pengajar')

@section('content')
<h3 class="fw-light mb-4 text-dark text-uppercase">
    HASIL EVALUASI <span class="fw-bold">TENAGA PENGAJAR</span>
</h3>

<h4 class="fw-light text-secondary mb-4">
    {{ $nama_pelatihan }} tahun {{ $tahun }}
</h4>

<ul class="nav nav-tabs mb-4 border-bottom-0" id="evaluasiTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link custom-tab active" id="hasil-tab" data-bs-toggle="tab" data-bs-target="#hasil-pane" type="button" role="tab">Hasil Evaluasi</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link custom-tab" id="laporan-tab" data-bs-toggle="tab" data-bs-target="#laporan-pane" type="button" role="tab">Laporan per Widyaiswara dan Materi</button>
    </li>
</ul>

<div class="tab-content" id="evaluasiTabsContent">
    
    <!-- ============================================== -->
    <!-- TAB 1: HASIL EVALUASI (RAW DATA)               -->
    <!-- ============================================== -->
    <div class="tab-pane fade show active" id="hasil-pane" role="tabpanel" tabindex="0">
        <div class="card shadow-sm border" style="border-radius: 0.25rem;">
    <div class="card-body p-4">
        <div class="table-responsive">
            <!-- Tambahkan id tabel agar tombol DataTables berfungsi -->
            <table id="tabelDetailEvaluasi" class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center align-middle" style="font-size: 0.85rem;">
                    <tr>
                        <th rowspan="2" width="5%">#</th>
                        <th rowspan="2" style="min-width: 200px;">Nama Materi</th>
                        <th rowspan="2" style="min-width: 200px;">Nama Tenaga Pengajar / Widyaiswara</th>
                        <th colspan="14">Aspek Penilaian</th>
                        <!-- Penambahan Kolom Baru di Sini -->
                        <th rowspan="2" style="min-width: 200px;">Saran</th>
                        <th colspan="2">Evaluator (Peserta)</th>
                        <th rowspan="2" style="min-width: 150px;">Timestamp</th>
                    </tr>
                    <tr>
                        <th style="min-width: 150px;">Penguasaan materi</th>
                        <th style="min-width: 150px;">Sistematika penyajian materi</th>
                        <th style="min-width: 150px;">Ketepatan waktu dan kehadiran</th>
                        <th style="min-width: 200px;">Penggunaan media / sarana pembelajaran</th>
                        <th style="min-width: 200px;">Penggunaan metode pembelajaran</th>
                        <th style="min-width: 150px;">Sikap dan perilaku saat mengajar</th>
                        <th style="min-width: 150px;">Penggunaan bahasa saat mengajar</th>
                        <th style="min-width: 200px;">Sikap dan perilaku saat bertanya/menjawab/merespon</th>
                        <th style="min-width: 200px;">Penggunaan bahasa saat bertanya/menjawab/merespon</th>
                        <th style="min-width: 180px;">Sikap dan perilaku saat memberi motivasi</th>
                        <th style="min-width: 180px;">Penggunaan bahasa saat memberi motivasi</th>
                        <th style="min-width: 180px;">Kecakapan menjaga kondusivitas kelas</th>
                        <th style="min-width: 180px;">Kecakapan menciptakan situasi kelas yang dinamis</th>
                        <th style="min-width: 180px;">Kerjasama antar Widyaiswara</th>
                        
                        <!-- Sub-kolom untuk Evaluator -->
                        <th style="min-width: 180px;">Nama</th>
                        <th style="min-width: 150px;">NIP</th>
                    </tr>
                </thead>
                <tbody style="font-size: 0.9rem;">
                    @forelse($rincian_evaluasi as $no => $eval)
                    <tr>
                        <td class="text-center">{{ $no + 1 }}</td>
                        <td>{{ $eval->materi ?? '-' }}</td>
                        <td>{{ $eval->namawi ?? '-' }}</td>
                        <td class="text-center">{{ $eval->hasil1 ?? '-' }}</td>
                        <td class="text-center">{{ $eval->hasil2 ?? '-' }}</td>
                        <td class="text-center">{{ $eval->hasil3 ?? '-' }}</td>
                        <td class="text-center">{{ $eval->hasil4 ?? '-' }}</td>
                        <td class="text-center">{{ $eval->hasil5 ?? '-' }}</td>
                        <td class="text-center">{{ $eval->hasil6 ?? '-' }}</td>
                        <td class="text-center">{{ $eval->hasil7 ?? '-' }}</td>
                        <td class="text-center">{{ $eval->hasil8 ?? '-' }}</td>
                        <td class="text-center">{{ $eval->hasil9 ?? '-' }}</td>
                        <td class="text-center">{{ $eval->hasil10 ?? '-' }}</td>
                        <td class="text-center">{{ $eval->hasil11 ?? '-' }}</td>
                        <td class="text-center">{{ $eval->hasil12 ?? '-' }}</td>
                        <td class="text-center">{{ $eval->hasil13 ?? '-' }}</td>
                        <td class="text-center">{{ $eval->hasil14 ?? '-' }}</td>
                        
                        <!-- Pemanggilan Data Baru -->
                        <td>{{ $eval->saran ?? '-' }}</td>
                        <td>{{ $eval->nama_peserta ?? '-' }}</td>
                        <td class="text-center">{{ $eval->nip_peserta ?? '-' }}</td>
                        <!-- Menggunakan fallback tglmasuk jika timestamp tidak ditemukan -->
                        <td class="text-center">{{ $eval->timestamp ?? $eval->tglmasuk ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <!-- Colspan diubah menjadi 21 untuk mengakomodasi seluruh kolom (1+2+14+1+2+1 = 21) -->
                        <td colspan="21" class="text-center py-4 text-muted">
                            <i class="fa fa-folder-open me-2"></i> Data evaluasi belum tersedia.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
    </div>

    <!-- ============================================== -->
    <!-- TAB 2: LAPORAN PER WIDYAISWARA (RANGKUMAN)     -->
    <!-- ============================================== -->
    <div class="tab-pane fade" id="laporan-pane" role="tabpanel" tabindex="0">
        
        @php
            // Mengelompokkan data berdasarkan Pengajar dan Materi
            $laporan_widyaiswara = $rincian_evaluasi->groupBy(function($item) {
                return ($item->namawi ?? 'Anonim') . ' | ' . ($item->materi ?? '-');
            });

            // Daftar 14 Indikator Penilaian
            $indikator_list = [
                'hasil1'  => 'Penguasaan materi',
                'hasil2'  => 'Sistematika penyajian',
                'hasil3'  => 'Ketepatan waktu dan kehadiran',
                'hasil4'  => 'Penggunaan media / sarana pembelajaran',
                'hasil5'  => 'Penggunaan metode pembelajaran',
                'hasil6'  => 'Sikap dan perilaku saat mengajar',
                'hasil7'  => 'Penggunaan bahasa saat mengajar',
                'hasil8'  => 'Sikap dan perilaku saat bertanya / menjawab / merespon / memberi feedback',
                'hasil9'  => 'Penggunaan bahasa saat bertanya / menjawab / merespon / memberi feedback',
                'hasil10' => 'Sikap dan perilaku saat memberi motivasi',
                'hasil11' => 'Penggunaan bahasa saat memberi motivasi',
                'hasil12' => 'Kecakapan menjaga kondusivitas kelas',
                'hasil13' => 'Kecakapan menciptakan situasi kelas yang dinamis',
                'hasil14' => 'Kerjasama antar Widyaiswara'
            ];
        @endphp

        <h4 class="fw-light text-secondary mb-4 mt-3">Laporan Capaian Mutu per Widyaiswara dan Materi</h4>

        @forelse($laporan_widyaiswara as $pengajar_materi => $data_pengajar)
            <div class="card shadow-sm border mb-5" style="border-radius: 0.25rem;">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-uppercase mb-3" style="font-size: 0.95rem;">{{ $pengajar_materi }}</h6>
                    <button class="btn btn-success btn-sm mb-3">
                        <i class="fa fa-file-excel me-1"></i> Export to xlsx
                    </button>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="text-center align-middle" style="font-size: 0.85rem;">
                                <tr>
                                    <th width="5%" class="bg-light">#</th>
                                    <th class="bg-light">Indikator</th>
                                    <th width="10%" class="bg-light">Jumlah Responden</th>
                                    <th width="8%" style="background-color: #7CFC00;">Sangat Baik</th>
                                    <th width="8%" style="background-color: #ADFF2F;">Baik</th>
                                    <th width="8%" style="background-color: #9ACD32;">Cukup Baik</th>
                                    <th width="8%" style="background-color: #FF7F50; color: white;">Kurang Baik</th>
                                    <th width="8%" style="background-color: #FF4500; color: white;">Tidak Baik</th>
                                    <th width="5%" class="bg-light">CN</th>
                                    <th width="5%" class="bg-light">CM</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 0.9rem;">
                                @php $no = 1; @endphp
                                @foreach($indikator_list as $field => $label)
                                    @php
                                        // Menghitung jumlah masing-masing jawaban untuk indikator ini
                                        $sb = $data_pengajar->where($field, 'Sangat Baik')->count();
                                        $b  = $data_pengajar->where($field, 'Baik')->count();
                                        $cb = $data_pengajar->where($field, 'Cukup Baik')->count();
                                        $kb = $data_pengajar->where($field, 'Kurang Baik')->count();
                                        $tb = $data_pengajar->where($field, 'Tidak Baik')->count();
                                        
                                        $total_responden = $sb + $b + $cb + $kb + $tb;
                                        
                                        // Menghitung Capaian Mutu (CM) dan Capaian Nilai (CN)
                                        $cm = 0;
                                        $cn = 0;
                                        if($total_responden > 0) {
                                            $total_score = ($sb * 4) + ($b * 3) + ($cb * 2) + ($kb * 1) + ($tb * 0);
                                            $cm = $total_score / $total_responden;
                                            $cn = $cm * 25;
                                        }
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $label }}</td>
                                        <td class="text-center">{{ $total_responden }}</td>
                                        <td class="text-center">{{ $sb }}</td>
                                        <td class="text-center">{{ $b }}</td>
                                        <td class="text-center">{{ $cb }}</td>
                                        <td class="text-center">{{ $kb }}</td>
                                        <td class="text-center">{{ $tb }}</td>
                                        <td class="text-center">{{ number_format($cn, 2) }}</td>
                                        <td class="text-center">{{ number_format($cm, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-secondary">Data evaluasi belum tersedia untuk direkapitulasi.</div>
        @endforelse
    </div>
</div>

@push('styles')
<!-- DataTables & Buttons Bootstrap 5 CSS -->
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">

<style>
    /* CSS untuk tombol ekspor DataTables (tetap dipertahankan) */
    div.dt-buttons .dt-button {
        background: none !important;
        border: none !important;
        padding: 0 !important;
        margin-right: 0.5rem !important;
    }
    div.dt-buttons {
        margin-bottom: 1rem;
        display: flex;
        flex-wrap: wrap;
    }

    /* === CSS BARU UNTUK NAVIGASI TAB === */
    .custom-tab {
        color: #6c757d; /* Warna teks abu-abu saat tidak aktif (text-muted) */
        font-weight: 500;
        border: none !important;
        border-bottom: 3px solid transparent !important;
        background: transparent !important;
        padding: 0.5rem 1rem;
    }
    .custom-tab:hover {
        color: #495057;
        border-color: transparent !important;
    }
    /* Gaya visual saat tab memiliki class 'active' */
    .custom-tab.active {
        color: #212529 !important; /* Warna teks gelap (text-dark) */
        border-bottom: 3px solid #0d6efd !important; /* Garis bawah biru (border-primary) */
    }
</style>
@endpush

@push('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<!-- DataTables Core -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<!-- DataTables Buttons -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
<!-- JSZip (Untuk Excel) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<!-- pdfmake (Untuk PDF) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<!-- HTML5 Buttons & Print -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<!-- Skrip Inisialisasi DataTables -->
<script>
    $(document).ready(function() {
        $('#tabelDetailEvaluasi').DataTable({
            // dom: mengatur letak (B = Buttons, f = filter, tr = tabel, i = info, p = pagination)
            dom: "<'row'<'col-sm-12 col-md-8'B><'col-sm-12 col-md-4'f>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                { 
                    extend: 'copy', 
                    className: 'btn btn-secondary btn-sm',
                    text: '<i class="fa fa-copy me-1"></i> Copy'
                },
                { 
                    extend: 'csv', 
                    className: 'btn btn-info btn-sm text-white',
                    text: '<i class="fa fa-file-csv me-1"></i> CSV'
                },
                { 
                    extend: 'excel', 
                    className: 'btn btn-success btn-sm',
                    text: '<i class="fa fa-file-excel me-1"></i> Excel'
                },
                { 
                    extend: 'pdf', 
                    className: 'btn btn-danger btn-sm',
                    text: '<i class="fa fa-file-pdf me-1"></i> PDF',
                    orientation: 'landscape', 
                    pageSize: 'LEGAL' 
                },
                { 
                    extend: 'print', 
                    className: 'btn btn-primary btn-sm',
                    text: '<i class="fa fa-print me-1"></i> Print'
                }
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            },
            scrollX: true 
        });
    });
</script>
@endpush

@push('styles')
<!-- DataTables & Buttons Bootstrap 5 CSS -->
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">

<!-- Tambahkan style kustom ini -->
<style>
    /* Menghilangkan background bawaan DataTables dan memberi jarak antar tombol */
    div.dt-buttons .dt-button {
        background: none !important;
        border: none !important;
        padding: 0 !important;
        margin-right: 0.5rem !important; /* Jarak antar tombol */
    }
    
    /* Memastikan tata letak tombol rapi di layar kecil */
    div.dt-buttons {
        margin-bottom: 1rem;
        display: flex;
        flex-wrap: wrap;
    }
</style>
@endpush

@endsection