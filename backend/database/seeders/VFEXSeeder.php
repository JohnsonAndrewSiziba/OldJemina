<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\VFEX;
use Illuminate\Database\Seeder;

class VFEXSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VFEX::factory()
            ->count(2)
            ->create();
    }
}
