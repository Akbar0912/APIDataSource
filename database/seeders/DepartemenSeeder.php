<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departemen = [
            'Keuangan', 'Pemasaran', 'Sumber Daya Manusia', 'Operasional',
            'Teknologi Informasi', 'Penelitian dan Pengembangan', 'Hukum',
            'Hubungan Masyarakat', 'Produksi', 'Logistik'
        ];

        foreach ($departemen as $dept) {
            Departemen::create(['nama_departemen' => $dept]);
        }
    }
}
