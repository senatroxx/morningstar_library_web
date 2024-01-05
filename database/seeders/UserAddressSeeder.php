<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $faker = \Faker\Factory::create();
        $users = User::all();

        $users->each(function ($user) use ($faker) {
            $province = Province::inRandomOrder()->first();
            $user->addresses()->create([
                'street_address_1' => $faker->streetAddress(),
                'phone' => '081234567890',
                'postal_code' => $faker->postcode(),
                'province_id' => $province->id,
                'city_id' => $province->cities()->inRandomOrder()->first()->id,
                'is_primary' => true,
            ]);
        });
    }
}
