<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function show($id)
    {
        // Fetch the car by ID
        $car = Car::with(['user', 'bodyType', 'brand', 'carModel', 'features'])->findOrFail($id);

        // Pass the car data to the view
        return view('frontend.shop.car', compact('car'));
    }
}
