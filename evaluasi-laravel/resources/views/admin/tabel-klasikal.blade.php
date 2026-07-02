@extends('layouts.admin')

@section('title', 'Tabel Klasikal ' . $tahun)

@section('breadcrumb')
    <span>Home</span> / <span>Tabel Evaluasi</span> / <span>Klasikal {{ $tahun }}</span>
@endsection

@section('content')
<h3 class="fw-normal mb-4">
    <i class="fa fa-table me-3 text-secondary"></i> Tabel Diklat Klasikal {{ $tahun }}
</h3>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>Jenis Diklat</th>
                    <th>Nama Diklat</th>
                    <th>Jumlah Peserta</th>
                    <th>Status Eval TP</th>
                    <th>Status Eval Penyelenggaraan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($diklat as $row)
                <tr>
                    <td>{{ $row->jenis_diklat }}</td>
                    <td>{{ $row->nama_diklat }}</td>
                    <td>{{ $row->jmlh }}</td>
                    <td>
                        @if($row->status_widya == 0)
                            <span class="badge bg-success">Dibuka</span>
                        @else
                            <span class="badge bg-secondary">Ditutup</span>
                        @endif
                    </td>
                    <td>
                        @if($row->status_selenggara == 0)
                            <span class="badge bg-success">Dibuka</span>
                        @else
                            <span class="badge bg-secondary">Ditutup</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data untuk tahun {{ $tahun }}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection