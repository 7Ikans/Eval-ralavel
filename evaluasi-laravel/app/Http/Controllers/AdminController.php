<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use Illuminate\Http\Request;

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
}