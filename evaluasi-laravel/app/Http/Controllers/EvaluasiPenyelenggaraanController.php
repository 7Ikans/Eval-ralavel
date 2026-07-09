<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluasiPenyelenggaraanController extends Controller
{
    /**
     * Menyimpan data dari modal awal ke dalam session
     */
    public function setSession(Request $request)
    {
        $request->session()->put('data_peserta_ep', [
            'nip_peserta'    => $request->input('nip_peserta'),
            'nama_peserta'   => $request->input('nama_peserta'),
            'jabatan'        => $request->input('jabatan'),
            'instansi'       => $request->input('instansi'),
            'nama_pelatihan' => $request->input('nama_pelatihan'),
            'tahun'          => $request->input('tahun'),
        ]);

        return redirect()->route('evaluasi-penyelenggaraan.create');
    }

    public function create(Request $request)
    {
        $peserta = $request->session()->get('data_peserta_ep');

        if (!$peserta) {
            return redirect('/')->with('error', 'Sesi Anda telah habis. Silakan masukkan NIP kembali dari halaman awal.');
        }

        return view('evaluasi-penyelenggaraan.form', compact('peserta'));
    }

    public function store(Request $request)
    {
        // Ambil semua field yang namanya mulai dari lay_, pbm_, sarpras_, kon_
        // plus field umum
        $data = $request->only([
            'nip_peserta', 'nama_peserta', 'jabatan', 'instansi',
            'nama_pelatihan', 'tahun',
            'jenis_kelas',
            // Aspek 1
            'lay_1_1','lay_1_2','lay_1_3','lay_1_4',
            'lay_1_5_1','lay_1_5_2','lay_1_5_3','lay_catatan',
            // Aspek 2
            'pbm_2_1','pbm_2_2','pbm_2_3','pbm_2_4','pbm_2_5',
            'pbm_2_6_1','pbm_2_6_2','pbm_2_6_3','pbm_2_6_4','pbm_2_6_5',
            'pbm_catatan',
            // Aspek 3
            'sarpras_3_1','sarpras_3_2','sarpras_3_3','sarpras_3_4',
            'sarpras_3_5_1','sarpras_3_5_2','sarpras_3_5_3','sarpras_3_5_4',
            'sarpras_3_6','sarpras_3_7','sarpras_3_8','sarpras_3_9',
            'sarpras_3_10','sarpras_3_11','sarpras_3_12',
            'sarpras_3_13_1','sarpras_3_13_2','sarpras_3_13_3','sarpras_3_13_4',
            'sarpras_catatan',
            // Aspek 4
            'kon_4_1','kon_4_2','kon_4_3','kon_4_4','kon_4_5',
            'kon_4_6_1','kon_4_6_2','kon_4_6_3','kon_4_6_4',
            'kon_catatan',
            'saran_umum',
        ]);

        $data['timestamp'] = now();

        DB::table('hasilevaluasi_penyelenggaraan')->insert($data);

        return redirect()
            ->route('evaluasi-penyelenggaraan.success')
            ->with('nama_pelatihan', $data['nama_pelatihan']);
    }

    public function success()
    {
        return view('evaluasi-penyelenggaraan.success');
    }
}