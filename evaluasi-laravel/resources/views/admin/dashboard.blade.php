@extends('layouts.admin')

@section('title', 'Home')

@section('breadcrumb')
    <span>Home</span>
@endsection

@section('content')
<h3 class="fw-normal mb-4 d-flex align-items-center text-dark" style="font-size: 1.7rem;">
    <i class="fa fa-desktop me-3 text-secondary" style="font-size: 1.4rem;"></i> Home
</h3>

<div class="card shadow-sm border" style="border-radius: 0.25rem;">
    <div class="card-header py-3 bg-light border-bottom">
        <h6 class="m-0 fw-normal text-dark">Readme</h6>
    </div>
    <div class="card-body p-4 text-dark" style="font-size: 0.92rem; line-height: 1.6;">
        <p class="mb-3">Evaluasi Online yang disediakan sistem ini meliputi:</p>
        <ol class="ps-3 mb-4">
            <li class="mb-1">Evaluasi Tenaga Pengajar, melalui sistem ini secara langsung maupun menggunakan link Google Form.</li>
            <li class="mb-1">Evaluasi Penyelenggaraan Diklat, melalui sistem ini secara langsung maupun menggunakan link Google Form.</li>
            <li class="mb-1">Evaluasi Pasca Diklat, menggunakan Google Form.</li>
        </ol>
        <p class="mb-0">
            Aplikasi Evaluasi Online terintegrasi dengan aplikasi PAK WI. Klik
            <a href="#" class="text-primary text-decoration-none">di sini</a>
            untuk mendownload panduan Evaluasi Online bagi admin.
        </p>
    </div>
</div>
@endsection