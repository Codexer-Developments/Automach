<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home.index');
})->name('home');

Route::get('contact', function () {
    return view('frontend.contact.index');
})->name('contact');


Route::get('faq', function () {
    return view('frontend.faq.index');
})->name('faq');

Route::get('about', function () {
    return view('frontend.about.index');
})->name('about');

