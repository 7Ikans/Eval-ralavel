<?php

namespace App\Http\Controllers;

use App\Models\HasilEvaluasiTp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluasiTpController extends Controller
{
    /**
     * Simpan data peserta dari popup halaman depan ke session
     */
    public function setSession(Request $request)
    {
        // Simpan semua data request (NIP, nama, id pelatihan, dll) ke session 'peserta_tp'
        $request->session()->put('peserta_tp', $request->all());
        
        // Arahkan ke form evaluasi
        return redirect()->route('evaluasi-tp.create');
    }

    /**
     * Tampilkan form evaluasi tenaga pengajar dengan data dinamis.
     */
    public function create(Request $request)
    {
        // 1. Ambil data session peserta
        $peserta = $request->session()->get('peserta_tp');
        
        // Jika tidak ada session (akses url langsung), tendang kembali ke home
        if (!$peserta) {
            return redirect()->route('home')->with('error', 'Silakan cek NIP terlebih dahulu dari halaman utama.');
        }

        // 2. Ambil daftar materi dari DB pakwi berdasarkan nama pelatihan peserta
        $materi = DB::connection('pakwi')->table('jadwal_alt')
            ->where('namadiklat', 'like', '%' . $peserta['nama_pelatihan'] . '%') // <-- Ubah di sini
            ->select('materi')
            ->distinct()
            ->get();

        return view('evaluasi-tp.form', compact('peserta', 'materi'));
    }

    /**
     * AJAX Endpoint: Ambil data Widyaiswara berdasarkan materi yang dipilih
     */
    public function getWidyaiswara(Request $request)
    {
        $materi = $request->materi;
        $peserta = $request->session()->get('peserta_tp');

        if (!$peserta) {
            return response()->json(['status' => 'error', 'message' => 'Sesi Anda telah berakhir, silakan ulangi dari awal.']);
        }

        // 3. Query JOIN tabel jadwal_alt dan wid untuk mendapatkan data Widyaiswara
        $wi = DB::connection('pakwi')->table('jadwal_alt')
            ->join('wid', 'jadwal_alt.nip', '=', 'wid.nip') 
            ->where('jadwal_alt.namadiklat', 'like', '%' . $peserta['nama_pelatihan'] . '%')
            ->where('jadwal_alt.materi', $materi)
            ->select('wid.nip', 'wid.nama')
            ->first();

        if ($wi) {
            return response()->json(['status' => 'success', 'data' => $wi]);
        }
        
        return response()->json(['status' => 'error', 'message' => 'Data Widyaiswara tidak ditemukan untuk materi ini.']);
    }

    /**
     * Simpan satu submission evaluasi TP.
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