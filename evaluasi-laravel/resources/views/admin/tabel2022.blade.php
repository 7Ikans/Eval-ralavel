@extends('layouts.admin') 

@section('content')
    <ul class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="active">Hasil Evaluasi Tenaga Pengajar</li>
    </ul>

    <div class="page-title">
        <h2><span class="fa fa-tasks"></span> Hasil Evaluasi Tenaga Pengajar</h2>
    </div>

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pilih nama Pelatihan</h3>
                    </div>
                    
                    <div class="panel-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jenis Pelatihan</th>
                                    <th>Nama Pelatihan</th>
                                    <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_diklat as $no => $row)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $row->jenispelatihan }}</td>
                                    <td>
                                        <a href="../tp/hasilevaltp_2022.php?iddiklat_daftar_online={{ $row->id_diklat_daftar_online }}&ndiklat={{ urlencode($row->namapelatihan) }}&thn={{ $row->tahun }}" target="_blank">
                                            {{ $row->namapelatihan }}
                                        </a>
                                    </td>
                                    <td>{{ $row->tahun }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection