<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_peserta')->insert([
            'nip' => '198001012005011001',
            'nama' => 'Budi Santoso',
            'jns_diklat' => 'Kepemimpinan',
            'tgl_mulai' => '2026-06-01',
        ]);

        $peserta = [
            ['nip' => '198001012005011001', 'nama' => 'Budi Santoso',       'jns_diklat' => 'dikpim', 'tgl_mulai' => '2026-06-01'],
            ['nip' => '198101012005011002', 'nama' => 'Siti Rahmawati',    'jns_diklat' => 'dikpim', 'tgl_mulai' => '2026-06-01'],
            ['nip' => '198201012005011003', 'nama' => 'Ahmad Hidayat',     'jns_diklat' => 'dikpim', 'tgl_mulai' => '2026-06-08'],
            ['nip' => '198301012005011004', 'nama' => 'Dewi Lestari',      'jns_diklat' => 'dikpim', 'tgl_mulai' => '2026-06-08'],
            ['nip' => '198401012005011005', 'nama' => 'Rudi Hermawan',     'jns_diklat' => 'dikfung','tgl_mulai' => '2026-06-15'],
            ['nip' => '198501012005011006', 'nama' => 'Ani Susilowati',    'jns_diklat' => 'dikfung','tgl_mulai' => '2026-06-15'],
            ['nip' => '198601012005011007', 'nama' => 'Bambang Wijaya',    'jns_diklat' => 'dikfung','tgl_mulai' => '2026-06-22'],
            ['nip' => '198701012005011008', 'nama' => 'Ratna Sari',        'jns_diklat' => 'prajab', 'tgl_mulai' => '2026-06-22'],
            ['nip' => '198801012005011009', 'nama' => 'Dodi Firmansyah',   'jns_diklat' => 'prajab', 'tgl_mulai' => '2026-07-01'],
            ['nip' => '198901012005011010', 'nama' => 'Fitri Handayani',   'jns_diklat' => 'prajab', 'tgl_mulai' => '2026-07-01'],
            ['nip' => '199001012005011011', 'nama' => 'Agus Prasetyo',     'jns_diklat' => 'skpm',   'tgl_mulai' => '2026-07-05'],
            ['nip' => '199101012005011012', 'nama' => 'Maya Anggraini',    'jns_diklat' => 'skpm',   'tgl_mulai' => '2026-07-05'],
            ['nip' => '199201012005011013', 'nama' => 'Hendra Gunawan',    'jns_diklat' => 'diknis', 'tgl_mulai' => '2026-07-10'],
            ['nip' => '199301012005011014', 'nama' => 'Rina Marlina',      'jns_diklat' => 'diknis', 'tgl_mulai' => '2026-07-10'],
            ['nip' => '199401012005011015', 'nama' => 'Adi Nugroho',       'jns_diklat' => 'diknis', 'tgl_mulai' => '2026-07-10'],
            ['nip' => '199501012005011016', 'nama' => 'Winda Kusuma',      'jns_diklat' => 'dikpim', 'tgl_mulai' => '2026-07-15'],
            ['nip' => '199601012005011017', 'nama' => 'Eko Saputra',       'jns_diklat' => 'dikpim', 'tgl_mulai' => '2026-07-15'],
            ['nip' => '199701012005011018', 'nama' => 'Sari Dewanti',      'jns_diklat' => 'dikfung','tgl_mulai' => '2026-07-20'],
            ['nip' => '199801012005011019', 'nama' => 'Dimas Ardiansyah',  'jns_diklat' => 'dikfung','tgl_mulai' => '2026-07-20'],
            ['nip' => '199901012005011020', 'nama' => 'Lina Suryani',      'jns_diklat' => 'prajab', 'tgl_mulai' => '2026-07-25'],
        ];

        foreach ($peserta as $p) {
            DB::table('data_peserta')->insert($p);
        }

    }
}
