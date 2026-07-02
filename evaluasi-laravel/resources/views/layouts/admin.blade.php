<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') - Evaluasi BPSDMD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>
    <div class="d-flex">
        {{-- SIDEBAR --}}
        <div class="sidebar p-0 flex-shrink-0" id="sidebar">
            <div class="brand-box text-white">
                <span class="nav-text">Evaluasi</span>
            </div>

            <div class="text-center pt-4 pb-3 px-3 admin-info">
                <img src="{{ asset('img/jawa.png') }}" alt="Logo" height="70" class="mb-2">
                <h6 class="text-white mb-0 fw-semibold" style="font-size: 0.95rem;">Administrator</h6>
                <small style="color: #8a9095; font-size: 0.8rem;">Bidang SKPM</small>
            </div>

            <ul class="nav flex-column">

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fa fa-desktop me-2" style="width: 20px; text-align: center;"></i>
                        <span class="nav-text">Home</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.tabel2024') }}"
                        class="nav-link {{ request()->routeIs('admin.tabel2024') ? 'active' : '' }}">
                        <i class="fa fa-table me-2" style="width: 20px; text-align: center;"></i>
                        <span class="nav-text">Data mulai tahun 2024</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.tabel2022') }}" class="nav-link {{ request()->routeIs('admin.tabel2022') ? 'active' : '' }}">
                        <i class="fa fa-table me-2" style="width: 20px; text-align: center;"></i>
                        <span class="nav-text">Data mulai tahun 2022</span>
                    </a>
                </li>

                <li class="sidebar-section-label">Data sebelum tahun 2022</li>

                <li class="nav-item">
                    <a href="#collapseTabelEvaluasi" class="nav-link justify-content-between"
                        data-bs-toggle="collapse" role="button">
                        <div>
                            <i class="fa fa-list-check me-2" style="width: 20px; text-align: center;"></i>
                            <span class="nav-text">Tabel Evaluasi</span>
                        </div>
                        <span class="collapse-icon">
                            <i class="fa-regular fa-square-plus"></i>
                            <i class="fa-regular fa-square-minus"></i>
                        </span>
                    </a>

                    <div class="collapse" id="collapseTabelEvaluasi">
                        <ul class="nav flex-column submenu-level-1">

                            {{-- KLASIKAL — dinamis dari DB --}}
                            <li class="nav-item">
                                <a href="#collapseKlasikal" class="nav-link collapsed justify-content-between"
                                    data-bs-toggle="collapse" role="button">
                                    <div>
                                        <i class="fa-solid fa-graduation-cap me-2" style="width: 20px; text-align: center;"></i>
                                        <span class="nav-text">Pelatihan klasikal</span>
                                    </div>
                                    <span class="collapse-icon">
                                        <i class="fa-regular fa-square-plus"></i>
                                        <i class="fa-regular fa-square-minus"></i>
                                    </span>
                                </a>
                                <div class="collapse" id="collapseKlasikal">
                                    <ul class="nav flex-column submenu-level-2">
                                        @forelse($tahunKlasikal ?? [] as $tahun)
                                        <li>
                                            <a href="{{ route('admin.tabel.klasikal', ['tahun' => $tahun]) }}"
                                                class="nav-link {{ request('tahun') == $tahun && request()->routeIs('admin.tabel.klasikal') ? 'active' : '' }}">
                                                <span class="nav-text">{{ $tahun }}</span>
                                            </a>
                                        </li>
                                        @empty
                                        <li><span class="nav-link text-muted">Belum ada data</span></li>
                                        @endforelse
                                    </ul>
                                </div>
                            </li>

                            {{-- E-LEARNING — dinamis dari DB --}}
                            <li class="nav-item">
                                <a href="#collapseElearning" class="nav-link collapsed justify-content-between"
                                    data-bs-toggle="collapse" role="button">
                                    <div>
                                        <i class="fa-solid fa-laptop-code me-2" style="width: 20px; text-align: center;"></i>
                                        <span class="nav-text">Pelatihan e-learning</span>
                                    </div>
                                    <span class="collapse-icon">
                                        <i class="fa-regular fa-square-plus"></i>
                                        <i class="fa-regular fa-square-minus"></i>
                                    </span>
                                </a>
                                <div class="collapse" id="collapseElearning">
                                    <ul class="nav flex-column submenu-level-2">
                                        @forelse($tahunElearning ?? [] as $tahun)
                                        <li>
                                            <a href="{{ route('admin.tabel.elearning', ['tahun' => $tahun]) }}"
                                                class="nav-link {{ request('tahun') == $tahun && request()->routeIs('admin.tabel.elearning') ? 'active' : '' }}">
                                                <span class="nav-text">{{ $tahun }}</span>
                                            </a>
                                        </li>
                                        @empty
                                        <li><span class="nav-link text-muted">Belum ada data</span></li>
                                        @endforelse
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        {{-- MAIN CONTENT --}}
        <div class="flex-grow-1 d-flex flex-column bg-white" style="min-height: 100vh; overflow-x: hidden;">
            <div class="topbar">
                <div class="text-white cursor-pointer" id="sidebarToggleBtn">
                    <i class="fa-solid fa-bars-staggered"></i>
                </div>
                <div>
                    <a href="{{ route('admin.logout') }}" class="text-white text-decoration-none small d-flex align-items-center">
                        <i class="fa fa-power-off me-2"></i> Logout
                    </a>
                </div>
            </div>

            <div class="breadcrumb-container">
                @yield('breadcrumb', 'Home')
            </div>

            <div class="p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    @stack('scripts')
</body>

</html>