<?php

namespace Database\Seeders;

use App\Models\Lend;
use Illuminate\Database\Seeder;

class LendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lend::factory()->count(10)->create();
    }
}
