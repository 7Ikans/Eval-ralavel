<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
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

        // Sama persis logikanya kayak do-login.php vanilla
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

        return view('admin.dashboard');
    }

    // Logout
    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_username']);
        return redirect()->route('admin.login');
    }
}

