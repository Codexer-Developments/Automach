<?php

namespace App\Http\Controllers;

use App\Models\BodyType;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // fetch each car brand and each brand car number count
        $brands = Brand::withCount('cars')->get();
        $bodyTypes = BodyType::withCount('cars')->get();
        $models = CarModel::all();
        $cars = Car::with(['bodyType', 'user'])->where('is_visible', true)->orderBy('created_at', 'desc')->take(8)->get();

        return view('frontend.home.index', compact('brands', 'bodyTypes', 'cars', 'models'));
    }
    public function contact()
    {
        return view('frontend.contact.index');
    }

    public function shop(Request $request)
    {
        // Fetch brands and body types (required for the form)
        $brands = Brand::all();
        $bodyTypes = BodyType::all();
        $models = CarModel::all();

        // Build the base query for cars
        $query = Car::query()->with(['brand', 'carModel', 'bodyType'])
            ->where('is_visible', true)
            ->orderBy('created_at', 'desc');

        // Apply search filters if they exist in the request
        if ($request->has('brand_id') && $request->brand_id) {
            $query->where('brand_id', $request->brand_id);
        }

        if ($request->has('car_model_id') && $request->car_model_id) {
            $query->where('car_model_id', $request->car_model_id);
        }

        if ($request->has('transmission') && $request->transmission) {
            $query->where('transmission', $request->transmission);
        }

        if ($request->has('body_type_id') && $request->body_type_id) {
            $query->where('body_type_id', $request->body_type_id);
        }

        // Paginate the results
        $cars = $query->paginate(20);

        // Pass all required variables to the view, including selected values
        return view('frontend.shop.index', [
            'cars' => $cars,
            'brands' => $brands,
            'models' => $models,
            'bodyTypes' => $bodyTypes,
            'selectedBrand' => $request->brand_id,
            'selectedModel' => $request->car_model_id,
            'selectedTransmission' => $request->transmission,
            'selectedBodyType' => $request->body_type_id,
        ]);
    }
    public function faq()
    {
        return view('frontend.faq.index');
    }
    public function about()
    {
        $testimonials = Testimonial::where('is_visible', true)->get();
        return view('frontend.about.index', compact('testimonials'));
    }
}
