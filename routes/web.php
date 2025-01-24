<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/car/{id}', [CarController::class, 'show'])->name('car.detail');



Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
Route::post('/contact/inquery', [ContactController::class, 'submitFormAjax'])->name('contact.inquery');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'store'])->name('newsletter.subscribe');
Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');

