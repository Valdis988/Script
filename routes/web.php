<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\VeterinarianController;
use Illuminate\Support\Facades\Route;


Route::resource('/country', CountryController::class);
Route::resource('/veterinarians', VeterinarianController::class);


Route::view('/', 'welcome')->name('welcome');
Route::view('/about', 'site.about')->name('site.about');
Route::view('/contact', 'site.contact')->name('site.contact');
Route::view('/services', 'site.services')->name('site.services');


Route::get('/say/{message?}', [SiteController::class, 'say'])->name('site.say');

Route::get('/entry', [SiteController::class, 'entry'])->name('entry.form');
Route::post('/entry', [SiteController::class, 'entryStore'])->name('entry.store');

Route::get('/booking', [SiteController::class, 'booking'])->name('booking.form');
Route::post('/booking', [SiteController::class, 'bookingStore'])->name('booking.store');


Route::get('/stats', [StatsController::class, 'pages'])->name('stats.pages');
Route::get('/stats/detail', [StatsController::class, 'detail'])->name('stats.detail');
Route::get('/stats/veterinarians', [StatsController::class, 'veterinarians'])->name('stats.veterinarians');
