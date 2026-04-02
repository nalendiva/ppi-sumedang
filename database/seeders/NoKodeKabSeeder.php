<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NoKodeKabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('no_kode_kab')->insert([
            // Jawa Barat
            ['nama_kabupaten' => 'Bogor',       'kode_kab' => 1],
            ['nama_kabupaten' => 'Sukabumi',    'kode_kab' => 2],
            ['nama_kabupaten' => 'Cianjur',     'kode_kab' => 3],
            ['nama_kabupaten' => 'Bandung',     'kode_kab' => 4],
            ['nama_kabupaten' => 'Garut',       'kode_kab' => 5],
            ['nama_kabupaten' => 'Tasikmalaya', 'kode_kab' => 6],
            ['nama_kabupaten' => 'Ciamis',      'kode_kab' => 7],
            ['nama_kabupaten' => 'Kuningan',    'kode_kab' => 8],
            ['nama_kabupaten' => 'Cirebon',     'kode_kab' => 9],
            ['nama_kabupaten' => 'Majalengka',  'kode_kab' => 10],
            ['nama_kabupaten' => 'Sumedang',    'kode_kab' => 11],
            ['nama_kabupaten' => 'Indramayu',   'kode_kab' => 12],
            ['nama_kabupaten' => 'Subang',      'kode_kab' => 13],
            ['nama_kabupaten' => 'Purwakarta',  'kode_kab' => 14],
            ['nama_kabupaten' => 'Karawang',    'kode_kab' => 15],
            ['nama_kabupaten' => 'Bekasi',      'kode_kab' => 16],
            ['nama_kabupaten' => 'Bandung Barat','kode_kab' => 17],
            // tambahkan kabupaten lain sesuai kebutuhan
        ]);
    }
}
