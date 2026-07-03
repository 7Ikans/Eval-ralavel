<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PakwiSeeder extends Seeder
{
    public function run(): void
    {
        // Master Spesialisasi (Materi)
        $materi = [
            ['idspesialisasi' => 1,  'spesialisasi' => 'Kepemimpinan Transformasional'],
            ['idspesialisasi' => 2,  'spesialisasi' => 'Manajemen ASN'],
            ['idspesialisasi' => 3,  'spesialisasi' => 'Pelayanan Publik'],
            ['idspesialisasi' => 4,  'spesialisasi' => 'Analisis Jabatan'],
            ['idspesialisasi' => 5,  'spesialisasi' => 'Keuangan Negara'],
            ['idspesialisasi' => 6,  'spesialisasi' => 'Sistem Pemerintahan'],
            ['idspesialisasi' => 7,  'spesialisasi' => 'Etika Publik'],
            ['idspesialisasi' => 8,  'spesialisasi' => 'Perencanaan Pembangunan'],
            ['idspesialisasi' => 9,  'spesialisasi' => 'Teknis Kesehatan Masyarakat'],
            ['idspesialisasi' => 10, 'spesialisasi' => 'SKPM & Monitoring'],
        ];
        DB::table('master_spesialisasi')->insert($materi);

        // Widyaiswara
        $wi = [
            ['nip' => '197508122005011001', 'nama' => 'Dr. Ahmad Fauzi, M.Si.',  'pp' => null],
            ['nip' => '198003212005011002', 'nama' => 'Sri Wahyuni, S.E., M.M.',  'pp' => null],
            ['nip' => '197612052005011003', 'nama' => 'Bambang Prayitno, S.H., M.H.', 'pp' => null],
            ['nip' => '198208172005011004', 'nama' => 'Dewi Sartika, S.Pd., M.Pd.', 'pp' => null],
            ['nip' => '197901302005011005', 'nama' => 'Hendra Gunawan, S.Sos., M.Si.', 'pp' => null],
        ];
        DB::table('wid')->insert($wi);

        // Jadwal Alternatif (penugasan WI ke diklat + materi)
        // Diklat Kepemimpinan Tingkat IV
        DB::table('jadwal_alt')->insert([
            ['nip' => '197508122005011001', 'namadiklat' => 'Diklat Kepemimpinan Tingkat IV', 'materi' => 1],
            ['nip' => '198003212005011002', 'namadiklat' => 'Diklat Kepemimpinan Tingkat IV', 'materi' => 2],
            ['nip' => '197612052005011003', 'namadiklat' => 'Diklat Kepemimpinan Tingkat IV', 'materi' => 6],
        ]);

        // Diklat Kepemimpinan Tingkat III
        DB::table('jadwal_alt')->insert([
            ['nip' => '197508122005011001', 'namadiklat' => 'Diklat Kepemimpinan Tingkat III', 'materi' => 1],
            ['nip' => '198208172005011004', 'namadiklat' => 'Diklat Kepemimpinan Tingkat III', 'materi' => 8],
            ['nip' => '197901302005011005', 'namadiklat' => 'Diklat Kepemimpinan Tingkat III', 'materi' => 5],
        ]);

        // Diklat Fungsional Analis SDM
        DB::table('jadwal_alt')->insert([
            ['nip' => '198003212005011002', 'namadiklat' => 'Diklat Fungsional Analis SDM', 'materi' => 2],
            ['nip' => '197901302005011005', 'namadiklat' => 'Diklat Fungsional Analis SDM', 'materi' => 4],
        ]);

        // Diklat Prajabatan Golongan III
        DB::table('jadwal_alt')->insert([
            ['nip' => '197612052005011003', 'namadiklat' => 'Diklat Prajabatan Golongan III', 'materi' => 3],
            ['nip' => '198208172005011004', 'namadiklat' => 'Diklat Prajabatan Golongan III', 'materi' => 7],
        ]);

        // Diklat Prajabatan Golongan II
        DB::table('jadwal_alt')->insert([
            ['nip' => '197612052005011003', 'namadiklat' => 'Diklat Prajabatan Golongan II', 'materi' => 3],
            ['nip' => '198208172005011004', 'namadiklat' => 'Diklat Prajabatan Golongan II', 'materi' => 7],
        ]);

        // Diklat SKPM
        DB::table('jadwal_alt')->insert([
            ['nip' => '197901302005011005', 'namadiklat' => 'Diklat SKPM', 'materi' => 10],
            ['nip' => '198003212005011002', 'namadiklat' => 'Diklat SKPM', 'materi' => 5],
        ]);

        // Diklat Teknis Bidang Kesehatan
        DB::table('jadwal_alt')->insert([
            ['nip' => '198208172005011004', 'namadiklat' => 'Diklat Teknis Bidang Kesehatan', 'materi' => 9],
            ['nip' => '197508122005011001', 'namadiklat' => 'Diklat Teknis Bidang Kesehatan', 'materi' => 8],
        ]);
    }
}
