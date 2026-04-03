<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoKodeProvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('no_kode_prov')->insert([
            ['nama_provinsi' => 'Aceh',                  'kode_prov' => 1],
            ['nama_provinsi' => 'Sumatera Utara',        'kode_prov' => 2],
            ['nama_provinsi' => 'Sumatera Barat',        'kode_prov' => 3],
            ['nama_provinsi' => 'Riau',                  'kode_prov' => 4],
            ['nama_provinsi' => 'Jambi',                 'kode_prov' => 5],
            ['nama_provinsi' => 'Sumatera Selatan',      'kode_prov' => 6],
            ['nama_provinsi' => 'Bengkulu',              'kode_prov' => 7],
            ['nama_provinsi' => 'Lampung',               'kode_prov' => 8],
            ['nama_provinsi' => 'Kepulauan Bangka Belitung', 'kode_prov' => 9],
            ['nama_provinsi' => 'Kepulauan Riau',        'kode_prov' => 10],
            ['nama_provinsi' => 'DKI Jakarta',           'kode_prov' => 11],
            ['nama_provinsi' => 'Jawa Barat',            'kode_prov' => 12],
            ['nama_provinsi' => 'Jawa Tengah',           'kode_prov' => 13],
            ['nama_provinsi' => 'DI Yogyakarta',         'kode_prov' => 14],
            ['nama_provinsi' => 'Jawa Timur',            'kode_prov' => 15],
            ['nama_provinsi' => 'Banten',                'kode_prov' => 16],
            ['nama_provinsi' => 'Bali',                  'kode_prov' => 17],
            ['nama_provinsi' => 'Nusa Tenggara Barat',   'kode_prov' => 18],
            ['nama_provinsi' => 'Nusa Tenggara Timur',   'kode_prov' => 19],
            ['nama_provinsi' => 'Kalimantan Barat',      'kode_prov' => 20],
            ['nama_provinsi' => 'Kalimantan Tengah',     'kode_prov' => 21],
            ['nama_provinsi' => 'Kalimantan Selatan',    'kode_prov' => 22],
            ['nama_provinsi' => 'Kalimantan Timur',      'kode_prov' => 23],
            ['nama_provinsi' => 'Kalimantan Utara',      'kode_prov' => 24],
            ['nama_provinsi' => 'Sulawesi Utara',        'kode_prov' => 25],
            ['nama_provinsi' => 'Sulawesi Tengah',       'kode_prov' => 26],
            ['nama_provinsi' => 'Sulawesi Selatan',      'kode_prov' => 27],
            ['nama_provinsi' => 'Sulawesi Tenggara',     'kode_prov' => 28],
            ['nama_provinsi' => 'Gorontalo',             'kode_prov' => 29],
            ['nama_provinsi' => 'Sulawesi Barat',        'kode_prov' => 30],
            ['nama_provinsi' => 'Maluku',                'kode_prov' => 31],
            ['nama_provinsi' => 'Maluku Utara',          'kode_prov' => 32],
            ['nama_provinsi' => 'Papua',                 'kode_prov' => 33],
            ['nama_provinsi' => 'Papua Barat',           'kode_prov' => 34],
        ]);

    }
}
