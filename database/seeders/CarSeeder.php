<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::create([
            'user_id' => 1,
            'make' => 'Toyota',
            'model' => 'Corolla',
            'year' => 2022,
            'color' => 'Red',
            'mileage' => 10000,
            'vin' => '123456789',
            'starting_price' => 20000,
            'current_bid' => 25000,
            'end_date' => '2023-01-01 00:00:00',
        ]);
        Car::create([
            'user_id' => 1,
            'make' => 'Nissan',
            'model' => 'Patroll',
            'year' => 2023,
            'color' => 'white',
            'mileage' => 1000,
            'vin' => '55252515',
            'starting_price' => 50000,
            'current_bid' => 55000,
            'end_date' => '2023-01-01 00:00:00',
        ]);
    }
}
