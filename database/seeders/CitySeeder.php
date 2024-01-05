<?php

namespace Database\Seeders;

use App\Helpers\RajaOngkir;
use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $rajaOngkir = new RajaOngkir();
        $provinces = Province::all();

        foreach ($provinces as $province) {
            $cities = $rajaOngkir->getCity(null, $province->id);
            foreach ($cities["rajaongkir"]["results"] as $city) {
                $city = City::create([
                    'id' => $city['city_id'],
                    'name' => "{$city['type']} {$city['city_name']}",
                    'province_id' => $city['province_id'],
                ]);
            }
        }
    }
}
