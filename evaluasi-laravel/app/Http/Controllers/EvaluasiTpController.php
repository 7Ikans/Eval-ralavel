<?php

namespace App\Http\Controllers;

use App\Models\HasilEvaluasiTp;
use Illuminate\Http\Request;

class EvaluasiTpController extends Controller
{
    /**
     * Tampilkan form evaluasi tenaga pengajar.
     */
    public function create()
    {
        return view('evaluasi-tp.form');
    }

    /**
     * Simpan satu submission evaluasi TP.
     * Catatan: berbeda dari modul penyelenggaraan, di sini setiap submit
     * adalah baris baru (insert), karena satu peserta bisa mengevaluasi
     * banyak WI dengan materi yang berbeda-beda.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_diklat_daftar_online' => 'required|integer',
            'nip_peserta'   => 'required|string|max:24',
            'nama_peserta'  => 'required|string|max:128',
            'namadiklat'    => 'required|string|max:255',
            'jenisdiklat'   => 'nullable|string|max:128',
            'tahun'         => 'required|integer',
            'nipwi'         => 'required|string|max:48',
            'namawi'        => 'required|string|max:128',
            'materi'        => 'required|string|max:255',

            'hasil1'  => 'required|string',
            'hasil2'  => 'required|string',
            'hasil3'  => 'required|string',
            'hasil4'  => 'required|string',
            'hasil5'  => 'required|string',
            'hasil6'  => 'required|string',
            'hasil7'  => 'required|string',
            'hasil8'  => 'required|string',
            'hasil9'  => 'required|string',
            'hasil10' => 'required|string',
            'hasil11' => 'required|string',
            'hasil12' => 'required|string',
            'hasil13' => 'required|string',
            'hasil14' => 'nullable|string',

            'saran' => 'nullable|string',
        ]);

        // Cegah peserta mengevaluasi materi yang sama dua kali
        $sudahAda = HasilEvaluasiTp::where('nip_peserta', $validated['nip_peserta'])
            ->where('namadiklat', $validated['namadiklat'])
            ->where('materi', $validated['materi'])
            ->where('nipwi', $validated['nipwi'])
            ->exists();

        if ($sudahAda) {
            return back()
                ->withInput()
                ->with('error', 'Anda sudah pernah mengevaluasi widyaiswara dan materi ini sebelumnya.');
        }

        $validated['timestamp'] = now();

        HasilEvaluasiTp::create($validated);

        return redirect()
            ->route('evaluasi-tp.success')
            ->with('namadiklat', $validated['namadiklat'])
            ->with('namawi', $validated['namawi']);
    }

    /**
     * Halaman sukses setelah submit.
     */
    public function success()
    {
        return view('evaluasi-tp.success');
    }
}