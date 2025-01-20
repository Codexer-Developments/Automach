<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // fetch each car brand and each brand car number count
        $brands = Brand::withCount('cars')->get();
        return view('frontend.home.index', compact('brands'));
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
        $testimonials = Testimonial::where('is_visible',true)->get();
        return view('frontend.about.index', compact('testimonials'));
    }
}
