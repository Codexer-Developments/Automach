<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/about', [HomeController::class, 'about'])->name('about');



Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

