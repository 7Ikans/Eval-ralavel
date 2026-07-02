@extends('layouts.admin')

@section('title', 'Tabel Klasikal ' . $tahun)

@section('breadcrumb')
    <span>Home</span> / <span>Tabel Evaluasi</span> / <span>Klasikal {{ $tahun }}</span>
@endsection

@section('content')
<h3 class="fw-normal mb-4">
    <i class="fa fa-table me-3 text-secondary"></i> Tabel Diklat Klasikal {{ $tahun }}
</h3>

<div class="card shadow-sm border">
    <div class="card-body">
        <table class="table table-bordered table-hover align-middle" id="tabelDiklat" style="width:100%">
            <thead class="table-light">
                <tr>
                    <th rowspan="2" class="align-middle">Jenis Pelatihan</th>
                    <th rowspan="2" class="align-middle">Nama Pelatihan</th>
                    <th colspan="2" class="text-center">Evaluasi Tenaga Pengajar</th>
                    <th colspan="2" class="text-center">Evaluasi Penyelenggaraan</th>
                    <th colspan="2" class="text-center">Evaluasi Pasca Pelatihan</th>
                </tr>
                <tr>
                    <th class="text-center">Form</th>
                    <th class="text-center">Aksi</th>
                    <th class="text-center">Form</th>
                    <th class="text-center">Aksi</th>
                    <th class="text-center">Form</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($diklat as $row)
                <tr>
                    <td>{{ $row->jenis_diklat }}</td>
                    <td>
                        {{ $row->nama_diklat }}
                        <br><small class="text-muted fst-italic">{{ $row->jmlh }} Peserta</small>
                    </td>

                    {{-- Evaluasi Tenaga Pengajar --}}
                    <td class="text-center">
                        @if(!empty($row->link_widya))
                            <a href="{{ $row->link_widya }}" target="_blank">{{ $row->link_widya }}</a>
                        @endif
                    </td>
                    <td class="text-center text-nowrap">
                        <a href="#" class="text-primary me-2" title="Lihat"><i class="fa fa-eye"></i></a>
                        <a href="#" class="text-secondary" title="Edit"><i class="fa fa-pen-to-square"></i></a>
                    </td>

                    {{-- Evaluasi Penyelenggaraan --}}
                    <td class="text-center">
                        @if(!empty($row->link_selenggara))
                            <a href="{{ $row->link_selenggara }}" target="_blank">{{ $row->link_selenggara }}</a>
                        @endif
                    </td>
                    <td class="text-center text-nowrap">
                        <a href="#" class="text-primary me-2" title="Lihat"><i class="fa fa-eye"></i></a>
                        <a href="#" class="text-secondary" title="Edit"><i class="fa fa-pen-to-square"></i></a>
                    </td>

                    {{-- Evaluasi Pasca Pelatihan --}}
                    <td class="text-center">
                        @if(!empty($row->link_pasca))
                            <a href="{{ $row->link_pasca }}" target="_blank">{{ $row->link_pasca }}</a>
                        @endif
                    </td>
                    <td class="text-center text-nowrap">
                        <a href="#" class="text-primary me-2" title="Lihat"><i class="fa fa-eye"></i></a>
                        <a href="#" class="text-secondary me-2" title="Edit"><i class="fa fa-pen-to-square"></i></a>
                        <a href="#" class="text-danger" title="Hapus"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4">Tidak ada data untuk tahun {{ $tahun }}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new simpleDatatables.DataTable("#tabelDiklat", {
            perPage: 10,
            perPageSelect: [10, 25, 50, 100],
            labels: {
                placeholder: "Search...",
                perPage: "entries per page",
                noRows: "Tidak ada data ditemukan",
                info: "Showing {start} to {end} of {rows} entries",
            }
        });
    });
</script>
@endpush
