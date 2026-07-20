<?php

namespace App\Http\Controllers;

use App\Models\HasilEvaluasiTp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluasiTpController extends Controller
{
    public function setSession(Request $request)
    {
        $request->session()->put('peserta_tp', $request->all());
        return redirect()->route('evaluasi-tp.create');
    }

    public function create(Request $request)
    {
        $peserta = $request->session()->get('peserta_tp');

        if (!$peserta) {
            return redirect()->route('home')->with('error', 'Silakan cek NIP terlebih dahulu dari halaman utama.');
        }

        $materi = DB::connection('pakwi')
            ->table('jadwal_alt as j')
            ->join('master_spesialisasi as m', 'j.materi', '=', 'm.idspesialisasi')
            ->where('j.namadiklat', 'like', '%' . $peserta['nama_pelatihan'] . '%')
            ->select(
                'm.idspesialisasi as id_materi',
                'm.spesialisasi as nama_materi'
            )
            ->distinct()
            ->orderBy('m.spesialisasi')
            ->get();

        return view('evaluasi-tp.form', compact('peserta', 'materi'));
    }

    public function getWidyaiswara(Request $request)
    {
        $materi = $request->materi;
        $peserta = $request->session()->get('peserta_tp');

        if (!$peserta) {
            return response()->json(['status' => 'error', 'message' => 'Sesi berakhir.']);
        }

        $nips = DB::connection('pakwi')->table('jadwal_alt')
            ->where('namadiklat', 'like', '%' . $peserta['nama_pelatihan'] . '%')
            ->where('materi', $materi)
            ->pluck('nip');

        if ($nips->isNotEmpty()) {
            $wis = DB::connection('pakwi')->table('wid')
                ->whereIn('wid.nip', $nips)
                ->leftJoin('wid_pp', 'wid.nip', '=', 'wid_pp.nip') 
                ->select('wid.nip as nip_wi', 'wid.nama as nama_wi', 'wid_pp.pp as foto_wi') 
                ->get();

            if ($wis->isNotEmpty()) {
                return response()->json(['status' => 'success', 'data' => $wis]);
            }
        }

        return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan.']);
    }

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
            'hasil1'                  => 'required|string',
            'hasil2'                  => 'required|string',
            'hasil3'                  => 'required|string',
            'hasil4'                  => 'required|string',
            'hasil5'                  => 'required|string',
            'hasil6'                  => 'required|string',
            'hasil7'                  => 'required|string',
            'hasil8'                  => 'required|string',
            'hasil9'                  => 'required|string',
            'hasil10'                 => 'required|string',
            'hasil11'                 => 'required|string',
            'hasil12'                 => 'required|string',
            'hasil13'                 => 'required|string',
            'hasil14'                 => 'nullable|string',
            'saran'                   => 'nullable|string',
        ]);

        $sudahAda = HasilEvaluasiTp::where('nip_peserta', $validated['nip_peserta'])
            ->where('id_diklat_daftar_online', $validated['id_diklat_daftar_online'])
            ->where('materi', $validated['materi'])
            ->where('nipwi', $validated['nipwi'])
            ->exists();

        if ($sudahAda) {
            return redirect()->route('evaluasi-tp.create')
                ->with('warning', 'Anda sudah mengevaluasi pengajar ini pada materi tersebut.');
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
