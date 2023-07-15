<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use Illuminate\Http\Request;
use App\Models\Car;
use Carbon\Carbon;


class BidController extends Controller
{
    public function index()
    {
        $bids = Bid::all();
        return response()->json($bids);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'car_id' => 'required|exists:cars,id',
        'user_id' => 'required|exists:users,id',
        'amount' => 'required|numeric',
    ]);

    $car = Car::findOrFail($validatedData['car_id']);

    if ($car->end_date <= Carbon::now()) {
        return response()->json(['error' => 'Bidding has ended for this car.'], 400);
    }

    if ($car->current_bid >= $validatedData['amount']) {
        return response()->json(['error' => 'The bid amount should be higher than the current bid.'], 400);
    }

    $bid = Bid::create($validatedData);

    // Update the current_bid and save the changes to the car
    $car->current_bid = $validatedData['amount'];
    $car->save();

    return response()->json($bid, 201);
}
    public function update(Request $request, Bid $bid)
    {
        $validatedData = $request->validate([
            'car_id' => 'exists:cars,id',
            'user_id' => 'exists:users,id',
            'amount' => 'numeric',
        ]);

        $bid->update($validatedData);

        return response()->json($bid);
    }

    public function destroy(Bid $bid)
    {
        $bid->delete();

        return response()->json(['message' => 'Bid deleted successfully']);
    }
}
