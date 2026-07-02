@extends('layouts.admin')

@section('title', 'Hasil Evaluasi Tenaga Pengajar 2024')

@section('breadcrumb')
<a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-muted">Home</a>
<i class="fa-solid fa-chevron-right mx-2 text-muted" style="font-size: 0.8rem;"></i>
<span class="text-dark fw-medium">Hasil Evaluasi Tenaga Pengajar 2024</span>
@endsection

@section('content')
<h3 class="fw-normal mb-4 d-flex align-items-center text-dark" style="font-size: 1.7rem;">
    <i class="fa fa-tasks me-3 text-secondary" style="font-size: 1.4rem;"></i> Hasil Evaluasi Tenaga Pengajar 2024
</h3>

<div class="card shadow-sm border" style="border-radius: 0.25rem;">
    <div class="card-header py-3 bg-light border-bottom">
        <h6 class="m-0 fw-normal text-dark">Pilih nama Pelatihan</h6>
    </div>

    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tabel2024" style="width: 100%;">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">#</th>
                        <th width="25%">Jenis Pelatihan</th>
                        <th>Nama Pelatihan</th>
                        <th width="15%" class="text-center">Tahun</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_diklat as $no => $row)
                    <tr>
                        <td class="text-center">{{ $no + 1 }}</td>
                        <td>{{ $row->jenispelatihan }}</td>
                        <td>
                            <a href="../tp/hasilevaltp_2024.php?iddiklat_daftar_online={{ $row->id_diklat_daftar_online }}&ndiklat={{ urlencode($row->namapelatihan) }}&thn={{ $row->tahun }}" target="_blank" class="text-decoration-none">
                                {{ $row->namapelatihan }}
                            </a>
                        </td>
                        <td class="text-center">{{ $row->tahun }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tabel2024').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            }
        });
    });
</script>
@endpush