<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cuti;

class CutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cuti::create([
            'nomor_induk' => 'IP06001',
            'tanggal_cuti' => '2020-08-02',
            'lama_cuti' => 2,
            'keterangan' => 'Acara Keluarga',
        ]);

        Cuti::create([
            'nomor_induk' => 'IP06001',
            'tanggal_cuti' => '2020-08-18',
            'lama_cuti' => 2,
            'keterangan' => 'Anak Sakit',
        ]);

        Cuti::create([
            'nomor_induk' => 'IP06006',
            'tanggal_cuti' => '2020-08-19',
            'lama_cuti' => 1,
            'keterangan' => 'Nenek Sakit',
        ]);

        Cuti::create([
            'nomor_induk' => 'IP06007',
            'tanggal_cuti' => '2020-08-23',
            'lama_cuti' => 1,
            'keterangan' => 'Sakit',
        ]);

        Cuti::create([
            'nomor_induk' => 'IP06004',
            'tanggal_cuti' => '2020-08-29',
            'lama_cuti' => 5,
            'keterangan' => 'Menikah',
        ]);

        Cuti::create([
            'nomor_induk' => 'P06003',
            'tanggal_cuti' => '2020-08-30',
            'lama_cuti' => 2,
            'keterangan' => 'Acara Keluarga',
        ]);
    }
}
