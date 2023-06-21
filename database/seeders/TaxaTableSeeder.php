<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Taxa;

class TaxaTableSeeder extends Seeder
{
    public function run()
    {
        Taxa::factory()->count(10)->create();
    }
}
