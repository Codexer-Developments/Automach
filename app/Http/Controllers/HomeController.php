<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('frontend.home.index');
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
