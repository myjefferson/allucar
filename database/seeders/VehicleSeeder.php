<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::create([
            'marca' => 'Fiat',
            'modelo' => 'Pulse Drive',
            'preco' => '119.990',
            'image' => 'car_image_.png'
        ]);
    }
}
