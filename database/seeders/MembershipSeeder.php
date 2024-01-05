<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $membership = [
            [
                'name' => 'Bronze',
                'description' => '',
                'image' => '',
                'balance' => 100000,
                'price' => 100000,
                'discount_price' => 0,
                'max_borrow_count' => 2,
                'max_borrow_weeks' => 1,
                'fine_per_weeks' => 8000,
            ],
            [
                'name' => 'Silver',
                'description' => '',
                'image' => '',
                'balance' => 200000,
                'price' => 200000,
                'discount_price' => 0,
                'max_borrow_count' => 4,
                'max_borrow_weeks' => 2,
                'fine_per_weeks' => 6000,
            ],
            [
                'name' => 'Gold',
                'description' => '',
                'image' => '',
                'price' => 250000,
                'balance' => 250000,
                'discount_price' => 0,
                'max_borrow_count' => 6,
                'max_borrow_weeks' => 4,
                'fine_per_weeks' => 5000,
            ],
        ];

        foreach ($membership as $key => $value) {
            Membership::create($value);
        }
    }
}
