<?php

namespace App\Http\Controllers;

use App\Models\BodyType;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // fetch each car brand and each brand car number count
        $brands = Brand::withCount('cars')->get();
        $bodyTypes = BodyType::withCount('cars')->get();
        $cars = Car::with(['bodyType', 'user'])->where('is_visible', true)->orderBy('created_at', 'desc')->take(8)->get();

     // Fetch all cars with their image URLs
    // $cars = Car::all();

    // Decode the JSON image URLs for each car
    // $cars->each(function ($car) {
    //     $car->image_urls = json_decode($car->image_urls, true);
    // });
        return view('frontend.home.index', compact('brands', 'bodyTypes', 'cars'));
    }
    public function contact()
    {
        return view('frontend.contact.index');
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
