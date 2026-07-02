<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $peserta = DB::connection('daftar')
            ->table('data_peserta as p')
            ->join('data_diklat as d', 'p.id_diklat', '=', 'd.id_diklat')
            ->select(
                'p.NIP as nip_peserta',
                'p.nama as nama_peserta',
                'p.jabatan',
                'p.instansi',
                'p.id_diklat as id_pelatihan',
                'd.jns_diklat as jenis_pelatihan',
                'd.nama_diklat as nama_pelatihan',
                DB::raw('YEAR(d.tgl_mulai) as tahun')
            )
            ->where('p.NIP', $nip)
            ->where('d.jns_diklat', '<>', 'mooc')
            ->whereDate('d.tgl_mulai', '<=', now())
            ->orderBy('d.tgl_mulai', 'desc')
            ->first();

        if ($peserta) {
            return response()->json([
                'ditemukan'       => 'yes',
                'nip_peserta'     => $peserta->nip_peserta,
                'nama_peserta'    => $peserta->nama_peserta,
                'jabatan'         => $peserta->jabatan,
                'instansi'        => $peserta->instansi,
                'id_pelatihan'    => $peserta->id_pelatihan,
                'jenis_pelatihan' => $peserta->jenis_pelatihan,
                'nama_pelatihan'  => $peserta->nama_pelatihan,
                'tahun'           => $peserta->tahun,
            ]);
        }

        return response()->json([
            'ditemukan'    => 'yes',
            'nip_peserta'  => $peserta->nip,
            'nama_peserta' => $peserta->nama,
            'jabatan'      => $peserta->jabatan,
            'instansi'     => $peserta->instansi,
            'nama_diklat'  => $peserta->nama_diklat,
            'tahun'        => $peserta->tahun
        ]);
    }
}
