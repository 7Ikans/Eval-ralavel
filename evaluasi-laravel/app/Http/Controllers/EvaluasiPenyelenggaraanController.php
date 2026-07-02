<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use App\Models\PelayananPeserta;
use App\Models\Kebersihan;
use App\Models\Keberfungsian;
use App\Models\Ketersediaan;
use App\Models\Perlengkapan;
use App\Models\Konsumsi;
use App\Models\Observasi;
use App\Models\Relevan;
use Illuminate\Http\Request;

class EvaluasiPenyelenggaraanController extends Controller
{
    /**
     * Simpan data peserta dari popup halaman depan ke session
     */
    public function setSession(Request $request)
    {
        $request->session()->put('peserta_penyelenggaraan', $request->all());
        return redirect()->route('evaluasi-penyelenggaraan.create');
    }

    /**
     * Tampilkan form evaluasi penyelenggaraan.
     */
    public function create(Request $request)
    {
        $peserta = $request->session()->get('peserta_penyelenggaraan');

        if (!$peserta) {
            return redirect()->route('home')->with('error', 'Silakan cek NIP terlebih dahulu dari halaman utama.');
        }

        return view('evaluasi-penyelenggaraan.form', compact('peserta'));
    }

    /**
     * Simpan data evaluasi ke 9 tabel terkait.
     */
    public function store(Request $request)
    {
        $peserta = $request->session()->get('peserta_penyelenggaraan');

        if (!$peserta) {
            return redirect()->route('home')->with('error', 'Sesi Anda telah berakhir, silakan ulangi dari awal.');
        }

        $validated = $request->validate([
            'nama_diklat' => 'required|string|max:100',

            'pelayanan.soal1' => 'required|string',
            'pelayanan.soal2' => 'required|string',
            'pelayanan.soal3' => 'required|string',
            'pelayanan.soal4' => 'required|string',
            'pelayanan.catatan' => 'nullable|string',

            'pelayanan_peserta.soal1' => 'required|string',
            'pelayanan_peserta.soal2' => 'required|string',
            'pelayanan_peserta.soal3' => 'required|string',
            'pelayanan_peserta.soal4' => 'required|string',
            'pelayanan_peserta.soal5' => 'required|string',
            'pelayanan_peserta.soal6' => 'required|string',
            'pelayanan_peserta.soal7' => 'required|string',
            'pelayanan_peserta.catatan' => 'nullable|string',

            'kebersihan.kelas' => 'required|string',
            'kebersihan.asrama' => 'required|string',
            'kebersihan.soal1' => 'required|string',
            'kebersihan.soal2' => 'required|string',
            'kebersihan.soal3' => 'required|string',
            'kebersihan.soal4' => 'required|string',
            'kebersihan.soal5' => 'required|string',
            'kebersihan.soal6' => 'required|string',
            'kebersihan.soal7' => 'required|string',
            'kebersihan.soal8' => 'required|string',
            'kebersihan.soal9' => 'required|string',
            'kebersihan.catatan' => 'nullable|string',

            'keberfungsian.soal1' => 'required|string',
            'keberfungsian.soal2' => 'required|string',
            'keberfungsian.soal3' => 'required|string',
            'keberfungsian.soal4' => 'required|string',
            'keberfungsian.soal5' => 'required|string',
            'keberfungsian.soal6' => 'required|string',
            'keberfungsian.soal7' => 'required|string',
            'keberfungsian.catatan' => 'nullable|string',

            'ketersediaan.soal1' => 'required|string',
            'ketersediaan.soal2' => 'required|string',
            'ketersediaan.soal3' => 'required|string',
            'ketersediaan.soal4' => 'required|string',
            'ketersediaan.catatan' => 'nullable|string',

            'perlengkapan.soal1' => 'required|string',
            'perlengkapan.soal2' => 'required|string',
            'perlengkapan.soal3' => 'required|string',
            'perlengkapan.soal4' => 'required|string',
            'perlengkapan.soal5' => 'required|string',
            'perlengkapan.catatan' => 'nullable|string',

            'konsumsi.ruang' => 'required|string',
            'konsumsi.soal1' => 'required|string',
            'konsumsi.soal2' => 'required|string',
            'konsumsi.soal3' => 'required|string',
            'konsumsi.soal4' => 'required|string',
            'konsumsi.soal5' => 'required|string',
            'konsumsi.catatan' => 'nullable|string',

            'observasi.soal1' => 'nullable|string',
            'observasi.soal2' => 'nullable|string',
            'observasi.soal3' => 'nullable|string',
            'observasi.soal4' => 'nullable|string',
            'observasi.soal5' => 'nullable|string',
            'observasi.soal6' => 'nullable|string',
            'observasi.soal7' => 'nullable|string',
            'observasi.catatan' => 'nullable|string',

            'relevan.soal1' => 'required|string',
            'relevan.soal2' => 'required|string',
            'relevan.soal3' => 'required|string',
            'relevan.catatan' => 'nullable|string',
        ]);

        $validated['nip_peserta'] = $peserta['nip_peserta'];
        $validated['nama_peserta'] = $peserta['nama_peserta'];

        $namaDiklat = $validated['nama_diklat'];

        Pelayanan::updateOrCreate(
            ['nama_diklat' => $namaDiklat],
            [
                'nip_peserta' => $peserta['nip_peserta'],
                'nama_peserta' => $peserta['nama_peserta'],
                'soal1' => $validated['pelayanan']['soal1'],
                'soal2' => $validated['pelayanan']['soal2'],
                'soal3' => $validated['pelayanan']['soal3'],
                'soal4' => $validated['pelayanan']['soal4'],
                'catatan' => $validated['pelayanan']['catatan'] ?? '',
            ]
        );

        PelayananPeserta::updateOrCreate(
            ['diklat' => $namaDiklat],
            [
                'nip_peserta' => $peserta['nip_peserta'],
                'nama_peserta' => $peserta['nama_peserta'],
                'soal1' => $validated['pelayanan_peserta']['soal1'],
                'soal2' => $validated['pelayanan_peserta']['soal2'],
                'soal3' => $validated['pelayanan_peserta']['soal3'],
                'soal4' => $validated['pelayanan_peserta']['soal4'],
                'soal5' => $validated['pelayanan_peserta']['soal5'],
                'soal6' => $validated['pelayanan_peserta']['soal6'],
                'soal7' => $validated['pelayanan_peserta']['soal7'],
                'catatan' => $validated['pelayanan_peserta']['catatan'] ?? '',
            ]
        );

        Kebersihan::updateOrCreate(
            ['diklat' => $namaDiklat],
            [
                'nip_peserta' => $peserta['nip_peserta'],
                'nama_peserta' => $peserta['nama_peserta'],
                'kelas' => $validated['kebersihan']['kelas'],
                'asrama' => $validated['kebersihan']['asrama'],
                'soal1' => $validated['kebersihan']['soal1'],
                'soal2' => $validated['kebersihan']['soal2'],
                'soal3' => $validated['kebersihan']['soal3'],
                'soal4' => $validated['kebersihan']['soal4'],
                'soal5' => $validated['kebersihan']['soal5'],
                'soal6' => $validated['kebersihan']['soal6'],
                'soal7' => $validated['kebersihan']['soal7'],
                'soal8' => $validated['kebersihan']['soal8'],
                'soal9' => $validated['kebersihan']['soal9'],
                'catatan' => $validated['kebersihan']['catatan'] ?? '',
            ]
        );

        Keberfungsian::updateOrCreate(
            ['diklat' => $namaDiklat],
            [
                'nip_peserta' => $peserta['nip_peserta'],
                'nama_peserta' => $peserta['nama_peserta'],
                'soal1' => $validated['keberfungsian']['soal1'],
                'soal2' => $validated['keberfungsian']['soal2'],
                'soal3' => $validated['keberfungsian']['soal3'],
                'soal4' => $validated['keberfungsian']['soal4'],
                'soal5' => $validated['keberfungsian']['soal5'],
                'soal6' => $validated['keberfungsian']['soal6'],
                'soal7' => $validated['keberfungsian']['soal7'],
                'catatan' => $validated['keberfungsian']['catatan'] ?? '',
            ]
        );

        Ketersediaan::updateOrCreate(
            ['diklat' => $namaDiklat],
            [
                'nip_peserta' => $peserta['nip_peserta'],
                'nama_peserta' => $peserta['nama_peserta'],
                'soal1' => $validated['ketersediaan']['soal1'],
                'soal2' => $validated['ketersediaan']['soal2'],
                'soal3' => $validated['ketersediaan']['soal3'],
                'soal4' => $validated['ketersediaan']['soal4'],
                'catatan' => $validated['ketersediaan']['catatan'] ?? '',
            ]
        );

        Perlengkapan::updateOrCreate(
            ['diklat' => $namaDiklat],
            [
                'nip_peserta' => $peserta['nip_peserta'],
                'nama_peserta' => $peserta['nama_peserta'],
                'soal1' => $validated['perlengkapan']['soal1'],
                'soal2' => $validated['perlengkapan']['soal2'],
                'soal3' => $validated['perlengkapan']['soal3'],
                'soal4' => $validated['perlengkapan']['soal4'],
                'soal5' => $validated['perlengkapan']['soal5'],
                'catatan' => $validated['perlengkapan']['catatan'] ?? '',
            ]
        );

        Konsumsi::updateOrCreate(
            ['diklat' => $namaDiklat],
            [
                'nip_peserta' => $peserta['nip_peserta'],
                'nama_peserta' => $peserta['nama_peserta'],
                'ruang' => $validated['konsumsi']['ruang'],
                'soal1' => $validated['konsumsi']['soal1'],
                'soal2' => $validated['konsumsi']['soal2'],
                'soal3' => $validated['konsumsi']['soal3'],
                'soal4' => $validated['konsumsi']['soal4'],
                'soal5' => $validated['konsumsi']['soal5'],
                'catatan' => $validated['konsumsi']['catatan'] ?? '',
            ]
        );

        if (!empty($validated['observasi']['soal1'])) {
            Observasi::updateOrCreate(
                ['diklat' => $namaDiklat],
                [
                    'nip_peserta' => $peserta['nip_peserta'],
                    'nama_peserta' => $peserta['nama_peserta'],
                    'soal1' => $validated['observasi']['soal1'] ?? '',
                    'soal2' => $validated['observasi']['soal2'] ?? '',
                    'soal3' => $validated['observasi']['soal3'] ?? '',
                    'soal4' => $validated['observasi']['soal4'] ?? '',
                    'soal5' => $validated['observasi']['soal5'] ?? '',
                    'soal6' => $validated['observasi']['soal6'] ?? '',
                    'soal7' => $validated['observasi']['soal7'] ?? '',
                    'catatan' => $validated['observasi']['catatan'] ?? '',
                ]
            );
        }

        Relevan::updateOrCreate(
            ['diklat' => $namaDiklat],
            [
                'nip_peserta' => $peserta['nip_peserta'],
                'nama_peserta' => $peserta['nama_peserta'],
                'soal1' => $validated['relevan']['soal1'],
                'soal2' => $validated['relevan']['soal2'],
                'soal3' => $validated['relevan']['soal3'],
                'catatan' => $validated['relevan']['catatan'] ?? '',
            ]
        );

        return redirect()
            ->route('evaluasi-penyelenggaraan.success')
            ->with('nama_diklat', $namaDiklat);
    }

    /**
     * Halaman sukses setelah submit.
     */
    public function success()
    {
        return view('evaluasi-penyelenggaraan.success');
    }
}
