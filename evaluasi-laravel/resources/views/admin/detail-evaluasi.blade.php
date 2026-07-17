@extends('layouts.admin')

@section('title', 'Detail Evaluasi Tenaga Pengajar')

@section('content')
<h3 class="fw-light mb-4 text-dark text-uppercase">
    HASIL EVALUASI <span class="fw-bold">TENAGA PENGAJAR</span>
</h3>

<h4 class="fw-light text-secondary mb-4">
    {{ $nama_pelatihan }} tahun {{ $tahun }}
</h4>

<div class="card shadow-sm border" style="border-radius: 0.25rem;">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table id="tabelDetailEvaluasi" class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center align-middle" style="font-size: 0.85rem;">
                    <tr>
                        <th rowspan="2" width="5%">#</th>
                        <th rowspan="2" style="min-width: 200px;">Nama Materi</th>
                        <th rowspan="2" style="min-width: 200px;">Nama Tenaga Pengajar / Widyaiswara</th>
                        <!-- Pastikan colspan sesuai dengan jumlah kolom hasil (14) -->
                        <th colspan="14">Aspek Penilaian</th>
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
                    </tr>
                </thead>
                <tbody style="font-size: 0.9rem;">
                    @forelse($rincian_evaluasi as $no => $eval)
                    <tr>
                        <td class="text-center">{{ $no + 1 }}</td>
                        <td>{{ $eval->materi ?? '-' }}</td>
                        <td>{{ $eval->namawi ?? '-' }}</td>
                        <!-- Menampilkan hasil1 sampai hasil14 -->
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
                    </tr>
                    @empty
                    <tr>
                        <!-- colspan diubah menjadi 17 (1 no + 2 info + 14 hasil) -->
                        <td colspan="17" class="text-center py-4 text-muted">
                            <i class="fa fa-folder-open me-2"></i> Data evaluasi belum tersedia.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('styles')
<!-- DataTables & Buttons Bootstrap 5 CSS -->
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
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