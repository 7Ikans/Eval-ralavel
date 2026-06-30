<?php

namespace App\Http\Controllers;

use App\Models\Diklat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function daftarPelatihan()
    {
        $diklat = Diklat::where('status', 'aktif')->get(); // sesuaikan kondisi
        return view('home.daftar-pelatihan', compact('diklat'));
    }

    public function cekNip(Request $request)
    {
        $nip = $request->input('nip_peserta');

        $peserta = DataPeserta::where('nip', $nip)
            ->where('jns_diklat', '<>', 'mooc')
            ->whereDate('tgl_mulai', '<=', now())
            ->orderBy('id', 'desc')
            ->first();

        if ($peserta) {
            return response()->json([
                'ditemukan' => 'yes',
                'nip_peserta' => $peserta->nip,
                'nama_peserta' => $peserta->nama,
                // sesuaikan field lain
            ]);
        }

        return response()->json(['ditemukan' => 'no']);
    }
}
