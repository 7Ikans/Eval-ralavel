<?php

namespace App\Http\Controllers;

use App\Models\DataPeserta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    /**
     * Cek NIP peserta dari database bpsdmdjateng_daftar
     * Kolom NIP di data_peserta adalah uppercase "NIP"
     * Join dengan data_diklat untuk mendapatkan info pelatihan
     */
    public function cekNip(Request $request)
    {
        $nip = $request->input('nip_peserta');

        if (!$nip) {
            return response()->json(['ditemukan' => 'no']);
        }

        // Query ke database daftar, join peserta dengan diklat
        // Ambil pelatihan yang paling baru berdasarkan tgl_mulai
        $peserta = DataPeserta::where('nip', $nip)
            ->where('jns_diklat', '<>', 'mooc')
            ->whereDate('tgl_mulai', '<=', now())
            ->orderBy('tgl_mulai', 'desc')
            ->first();

        if ($peserta) {
            return response()->json([
                'ditemukan'       => 'yes',
                'nip_peserta'     => $peserta->nip,
                'nama_peserta'    => $peserta->nama,
                'jabatan'         => $peserta->jabatan ?? '-',
                'instansi'        => $peserta->instansi ?? 'BPSDMD Provinsi Jawa Tengah',
                'id_pelatihan'    => 1,
                'jenis_pelatihan' => $peserta->jns_diklat,
                'nama_pelatihan'  => $peserta->nama_diklat ?? $peserta->jns_diklat,
                'tahun'           => date('Y'),
            ]);
        }

        return response()->json([
            'ditemukan'    => 'no',
        ]);
    }
}
