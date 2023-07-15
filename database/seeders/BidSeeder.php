<?php

namespace Database\Seeders;

use App\Models\Bid;

use Illuminate\Database\Seeder;

class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all the cars and users
        $cars = \App\Models\Car::all();
        $users = \App\Models\User::all();

        foreach ($cars as $car) {
            // Generate random bids for each car
            $numBids = mt_rand(0, 5);

            for ($i = 0; $i < $numBids; $i++) {
                $user = $users->random();
                $amount = mt_rand($car->current_bid + 1, $car->current_bid + 500);
                $createdDate = $car->created_at->addMinutes(mt_rand(0, 60 * 24 * 30)); // Random date within 30 days from car creation

                Bid::create([
                    'car_id' => $car->id,
                    'user_id' => $user->id,
                    'amount' => $amount,
                    'created_at' => $createdDate,
                    'updated_at' => $createdDate,
                ]);
            }
        }
    }
}
