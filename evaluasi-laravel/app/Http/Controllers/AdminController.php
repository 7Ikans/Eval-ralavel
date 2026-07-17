<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    // Helper: ambil daftar tahun buat sidebar
    private function getTahunSidebar()
    {
        $tahunKlasikal = Evaluasi::where('metode_pelatihan', 'klasikal')
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        $tahunElearning = Evaluasi::where('metode_pelatihan', 'e-learning')
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        return [
            'tahunKlasikal' => $tahunKlasikal,
            'tahunElearning' => $tahunElearning,
        ];
    }

    // Tampilkan halaman login
    public function loginForm()
    {
        return view('admin.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $validUsers = [
            ['username' => 'admin',       'password' => '4dm1nbpsdmd'],
            ['username' => 'ppid',        'password' => 'pp1dbpsdmd'],
            ['username' => 'inspektorat', 'password' => 'inspektorat123'],
        ];

        foreach ($validUsers as $user) {
            if ($username === $user['username'] && $password === $user['password']) {
                session(['admin_logged_in' => true, 'admin_username' => $username]);
                return redirect()->route('admin.dashboard');
            }
        }

        return redirect()->route('admin.login')->with('error', 'Username atau password salah');
    }

    // Halaman dashboard
    public function dashboard()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $sidebar = $this->getTahunSidebar();

        return view('admin.dashboard', $sidebar);
    }

    // Logout
    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_username']);
        return redirect()->route('admin.login');
    }

    public function tabelKlasikal(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $tahun = $request->query('tahun');
        $sidebar = $this->getTahunSidebar();

        $diklat = Evaluasi::where('metode_pelatihan', 'klasikal')
            ->where('tahun', $tahun)
            ->orderBy('nama_diklat')
            ->get();

        return view('admin.tabel-klasikal', array_merge($sidebar, [
            'diklat' => $diklat,
            'tahun' => $tahun,
        ]));
    }

    public function tabelElearning(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $tahun = $request->query('tahun');
        $sidebar = $this->getTahunSidebar();

        $diklat = Evaluasi::where('metode_pelatihan', 'e-learning')
            ->where('tahun', $tahun)
            ->orderBy('nama_diklat')
            ->get();

        return view('admin.tabel-elearning', array_merge($sidebar, [
            'diklat' => $diklat,
            'tahun' => $tahun,
        ]));
    }

    public function tabel2022()
    {
        $data_diklat = DB::table('hasilevaluasitp_2022')
            ->select(
                'idhasil',
                'id_diklat_daftar_online',
                'jenisdiklat as jenispelatihan',
                'namadiklat as namapelatihan',
                'tahun'
            )
            ->groupBy('namadiklat', 'tahun', 'idhasil', 'id_diklat_daftar_online', 'jenisdiklat')
            ->orderBy('tahun', 'desc')
            ->get();

        return view('admin.tabel2022', compact('data_diklat'));
    }

    public function tabel2024()
    {
        $data_diklat = DB::table('hasilevaluasitp_2024')
            // Melakukan JOIN ke database bpsdmdjateng_daftar dan tabel data_diklat
            ->join('bpsdmdjateng_daftar.data_diklat', 'hasilevaluasitp_2024.id_diklat_daftar_online', '=', 'bpsdmdjateng_daftar.data_diklat.id_diklat')
            ->select(
                'hasilevaluasitp_2024.idhasil',
                'hasilevaluasitp_2024.id_diklat_daftar_online',
                'bpsdmdjateng_daftar.data_diklat.jns_diklat as jenispelatihan', // Mengambil jenis diklat dari tabel master
                'hasilevaluasitp_2024.namadiklat as namapelatihan',
                'hasilevaluasitp_2024.tahun'
            )
            ->groupBy(
                'hasilevaluasitp_2024.namadiklat', 
                'hasilevaluasitp_2024.tahun', 
                'hasilevaluasitp_2024.idhasil', 
                'hasilevaluasitp_2024.id_diklat_daftar_online', 
                'bpsdmdjateng_daftar.data_diklat.jns_diklat'
            ) 
            ->orderBy('hasilevaluasitp_2024.tahun', 'desc')
            ->get();

        return view('admin.tabel2024', compact('data_diklat'));
    }

    public function detailEvaluasi(Request $request, $tahun, $id_diklat)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $nama_tabel = ($tahun >= 2024) ? 'hasilevaluasitp_2024' : 'hasilevaluasitp_2022';
        $nama_pelatihan = $request->query('ndiklat');

        // Cek apakah tabel/view untuk tahun tersebut sudah ada di database MySQL
        if (!Schema::hasTable($nama_tabel)) {
            $rincian_evaluasi = collect([]); // Kirim koleksi kosong
            $pesan_error = "Tabel rangkuman evaluasi untuk tahun $tahun ($nama_tabel) belum tersedia di database.";
        } else {
            // Jika tabel ada, ambil rangkuman nilainya
            $rincian_evaluasi = DB::table($nama_tabel)
                ->where('id_diklat_daftar_online', $id_diklat)
                ->get();
            $pesan_error = null;
        }

        return view('admin.detail-evaluasi', [
            'rincian_evaluasi' => $rincian_evaluasi,
            'tahun' => $tahun,
            'nama_pelatihan' => $nama_pelatihan,
            'pesan_error' => $pesan_error,
        ]);
    }
}
