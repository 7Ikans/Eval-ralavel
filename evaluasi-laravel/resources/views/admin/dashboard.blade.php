<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin - Evaluasi BPSDMD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            overflow-x: hidden;
        }
        /* Layout Sidebar */
        .sidebar {
            min-height: 100vh;
            background-color: #16191c;
            width: 250px;
        }
        .brand-box {
            background-color: #0fa183;
            padding: 12px;
            font-size: 1.4rem;
            font-weight: 500;
            text-align: center;
        }
        .sidebar .nav-link {
            color: #8a9095;
            padding: 0.7rem 1rem;
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            text-decoration: none;
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.05);
        }
        .sidebar .nav-link.active {
            color: #fff !important;
            background-color: #0fa183 !important;
        }
        .sidebar-section-label {
            color: #5c6267;
            font-size: 0.85rem;
            padding: 1.2rem 1rem 0.4rem 1rem;
        }
        
        /* Pengaturan Icon Plus/Minus Collapse */
        .collapse-icon .fa-square-minus {
            display: none; /* Sembunyikan icon minus secara default */
        }
        /* Jika nav-link TIDAK memiliki class 'collapsed' (artinya sedang di-expand/terbuka) */
        .nav-link:not(.collapsed) .collapse-icon .fa-square-plus {
            display: none; /* Sembunyikan icon plus */
        }
        .nav-link:not(.collapsed) .collapse-icon .fa-square-minus {
            display: inline-block; /* Tampilkan icon minus */
        }

        /* Padding untuk Submenu Bertingkat */
        .submenu-level-1 .nav-link {
            padding-left: 2rem; 
            color: #a2a7ab;
        }
        .submenu-level-2 .nav-link {
            padding-left: 3.5rem;
            color: #6c757d;
            font-size: 0.85rem;
        }
        .submenu-level-2 .nav-link:hover {
            color: #fff;
        }
        /* Top Navbar */
        .topbar {
            background-color: #212429;
            height: 53px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
        }
        .breadcrumb-container {
            background-color: #eef1f5;
            padding: 0.5rem 1rem;
            font-size: 0.8rem;
            color: #6c757d;
            border-bottom: 1px solid #dee2e6;
        }
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar p-0 flex-shrink-0">
            <div class="brand-box text-white">
                Evaluasi
            </div>

            <div class="text-center pt-4 pb-3 px-3">
                <img src="{{ asset('img/jawa.png') }}" alt="Logo" height="70" class="mb-2">
                <h6 class="text-white mb-0 fw-semibold" style="font-size: 0.95rem;">Administrator</h6>
                <small style="color: #8a9095; font-size: 0.8rem;">Bidang SKPM</small>
            </div>
            
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="fa fa-desktop me-2" style="width: 20px;"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-table me-2" style="width: 20px;"></i> Data mulai tahun 2024
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-table me-2" style="width: 20px;"></i> Data mulai tahun 2022
                    </a>
                </li>
                
                <li class="sidebar-section-label">Data sebelum tahun 2022</li>
                
                <li class="nav-item">
                    <a href="#collapseTabelEvaluasi" class="nav-link active justify-content-between" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseTabelEvaluasi">
                        <span><i class="fa fa-list-check me-2" style="width: 20px;"></i> Tabel Evaluasi</span>
                        <span class="collapse-icon">
                            <i class="fa-regular fa-square-plus"></i>
                            <i class="fa-regular fa-square-minus"></i>
                        </span>
                    </a>
                    
                    <div class="collapse show" id="collapseTabelEvaluasi">
                        <ul class="nav flex-column submenu-level-1">
                            
                            <li class="nav-item">
                                <a href="#collapseKlasikal" class="nav-link collapsed justify-content-between" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseKlasikal">
                                    <span><i class="fa-solid fa-graduation-cap me-2" style="width: 20px;"></i> Pelatihan klasikal</span>
                                    <span class="collapse-icon">
                                        <i class="fa-regular fa-square-plus"></i>
                                        <i class="fa-regular fa-square-minus"></i>
                                    </span>
                                </a>
                                <div class="collapse" id="collapseKlasikal">
                                    <ul class="nav flex-column submenu-level-2">
                                        <li><a href="#" class="nav-link">2019</a></li>
                                        <li><a href="#" class="nav-link">2020</a></li>
                                        <li><a href="#" class="nav-link">2021</a></li>
                                    </ul>
                                </div>
                            </li>
                            
                            <li class="nav-item">
                                <a href="#collapseElearning" class="nav-link collapsed justify-content-between" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseElearning">
                                    <span><i class="fa-solid fa-laptop-code me-2" style="width: 20px;"></i> Pelatihan e-learning</span>
                                    <span class="collapse-icon">
                                        <i class="fa-regular fa-square-plus"></i>
                                        <i class="fa-regular fa-square-minus"></i>
                                    </span>
                                </a>
                                <div class="collapse" id="collapseElearning">
                                    <ul class="nav flex-column submenu-level-2">
                                        <li><a href="#" class="nav-link">2020</a></li>
                                        <li><a href="#" class="nav-link">2021</a></li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <div class="flex-grow-1 d-flex flex-column bg-white" style="min-height: 100vh;">
            <div class="topbar">
                <div class="text-white cursor-pointer">
                    <i class="fa-solid fa-bars-staggered"></i>
                </div>
                <div>
                    <a href="{{ route('admin.logout') }}" class="text-white text-decoration-none small d-flex align-items-center">
                        <i class="fa fa-power-off me-2"></i> Logout
                    </a>
                </div>
            </div>

            <div class="breadcrumb-container">
                <span>Home</span>
            </div>
            
            <div class="p-4">
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
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>