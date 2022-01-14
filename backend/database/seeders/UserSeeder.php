<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\VFEX;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(1)
            ->create();
    }
}
