<?php

namespace Database\Seeders;

use App\Models\Penyewa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyewaSeeder extends Seeder
{

    public function run(): void
    {
        Penyewa::factory(4)->create();
    }
}
