<?php

namespace Database\Seeders;

use App\Helpers\RajaOngkir;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $rajaOngkir = new RajaOngkir();
        $provinces = $rajaOngkir->getProvince();

        $provinces = $provinces['rajaongkir']['results'];

        usort($provinces, fn ($a, $b) => $a['province_id'] <=> $b['province_id']);

        foreach ($provinces as $province) {
            $province = Province::create([
                'name' => $province['province'],
            ]);
        }
    }
}
