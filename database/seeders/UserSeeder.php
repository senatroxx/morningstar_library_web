<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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
        User::factory()->count(10)->unverified()->create();
        User::factory()->count(5)->create();
        User::factory()->count(1)->create([
            'name' => 'admin',
            'email' => 'admin@morningstar.com',
            'role_id' => Role::where('name', 'admin')->first()->id,
        ]);
    }
}
