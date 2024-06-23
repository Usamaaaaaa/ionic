<?php

namespace Database\Seeders;

use App\Models\Trafic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TraficSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $traficData = [];
        for ($i = 0; $i < 100; $i++) {
            $traficData[] = ['externalId' => $i, 'stages' => 'visited'];
        }
        Trafic::insert($traficData);
    }
}
