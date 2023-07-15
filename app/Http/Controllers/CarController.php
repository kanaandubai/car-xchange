<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return response()->json($cars);
    }
    public function getCarBids($carId)
    {
        $car = Car::with('bids.user:id,name')->find($carId)     ;
        return response()->json($car, 201);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'make' => 'required',
            'model' => 'required',
            'year' => 'required|numeric',
            'color' => 'required',
            'mileage' => 'required|numeric',
            'vin' => 'required|unique:cars',
            'starting_price' => 'required|numeric',
            'current_bid' => 'nullable|numeric',
            'end_date' => 'required|date',
        ]);

        $car = Car::create($validatedData);

        return response()->json($car, 201);
    }

    public function show(Car $car)
    {
        return response()->json($car);
    }

    public function update(Request $request, Car $car)
    {
        $validatedData = $request->validate([
            'user_id' => 'exists:users,id',
            'make' => 'required',
            'model' => 'required',
            'year' => 'required|numeric',
            'color' => 'required',
            'mileage' => 'required|numeric',
            'vin' => 'required|unique:cars,vin,' . $car->id,
            'starting_price' => 'required|numeric',
            'current_bid' => 'nullable|numeric',
            'end_date' => 'required|date',
        ]);

        $car->update($validatedData);

        return response()->json($car);
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return response()->json(['message' => 'Car deleted successfully']);
    }
}
