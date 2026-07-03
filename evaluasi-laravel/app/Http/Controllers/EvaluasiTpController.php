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
        $request->session()->put('peserta_tp', $request->all());
        return redirect()->route('evaluasi-tp.create');
    }

    /**
     * Tampilkan form evaluasi tenaga pengajar dengan data dinamis.
     */
    public function create(Request $request)
    {
        $peserta = $request->session()->get('peserta_tp');

        if (!$peserta) {
            return redirect()->route('home')->with('error', 'Silakan cek NIP terlebih dahulu dari halaman utama.');
        }

        // JOIN jadwal_alt dengan master_spesialisasi untuk ambil NAMA materi
        // jadwal_alt.materi = master_spesialisasi.idspesialisasi (foreign key angka)
        $materi = DB::connection('pakwi')
            ->table('jadwal_alt as j')
            ->join('master_spesialisasi as m', 'j.materi', '=', 'm.idspesialisasi')
            ->where('j.namadiklat', 'like', '%' . $peserta['nama_pelatihan'] . '%')
            ->select(
                'm.idspesialisasi as id_materi',   // ID untuk query WI nanti
                'm.spesialisasi as nama_materi'    // Nama untuk ditampilkan
            )
            ->distinct()
            ->orderBy('m.spesialisasi')
            ->get();

        return view('evaluasi-tp.form', compact('peserta', 'materi'));
    }

    /**
     * AJAX Endpoint: Ambil data Widyaiswara berdasarkan materi yang dipilih.
     * Menerima id_materi (angka) bukan nama materi.
     */
    public function getWidyaiswara(Request $request)
    {
        $materi = $request->materi;
        $peserta = $request->session()->get('peserta_tp');

        if (!$peserta) {
            return response()->json(['status' => 'error', 'message' => 'Sesi berakhir.']);
        }

        // 1. Cari NIP pengajar
        $nips = DB::connection('pakwi')->table('jadwal_alt')
            ->where('namadiklat', 'like', '%' . $peserta['nama_pelatihan'] . '%')
            ->where('materi', $materi)
            ->pluck('nip');

        // 2. Cari nama di tabel wid DAN foto di tabel wid_pp
        if ($nips->isNotEmpty()) {
            $wis = DB::connection('pakwi')->table('wid')
                ->whereIn('wid.nip', $nips)
                ->leftJoin('wid_pp', 'wid.nip', '=', 'wid_pp.nip') // <-- Join dengan tabel foto
                ->select('wid.nip as nip_wi', 'wid.nama as nama_wi', 'wid_pp.pp as foto_wi') // <-- Ambil kolom pp
                ->get();

            if ($wis->isNotEmpty()) {
                return response()->json(['status' => 'success', 'data' => $wis]);
            }
        }
        
        return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan.']);
    }

    /**
     * Simpan hasil evaluasi ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_diklat_daftar_online' => 'required|integer',
            'nip_peserta'             => 'required|string|max:24',
            'nama_peserta'            => 'required|string|max:128',
            'namadiklat'              => 'required|string|max:255',
            'jenisdiklat'             => 'nullable|string|max:128',
            'tahun'                   => 'required|integer',
            'nipwi'                   => 'required|string|max:48',
            'namawi'                  => 'required|string|max:128',
            'materi'                  => 'required|string|max:255',
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
            'saran'   => 'nullable|string',
        ]);

        $sudahAda = HasilEvaluasiTp::where('nip_peserta', $validated['nip_peserta'])
            ->where('namadiklat', $validated['namadiklat'])
            ->where('materi', $validated['materi'])
            ->where('nipwi', $validated['nipwi'])
            ->exists();

        if ($sudahAda) {
            return back()->withInput()
                ->with('error', 'Anda sudah pernah mengevaluasi widyaiswara dan materi ini sebelumnya.');
        }

        $validated['timestamp'] = now();
        HasilEvaluasiTp::create($validated);

        return redirect()
            ->route('evaluasi-tp.success')
            ->with('namadiklat', $validated['namadiklat'])
            ->with('namawi', $validated['namawi']);
    }

    public function success()
    {
        return view('evaluasi-tp.success');
    }
}