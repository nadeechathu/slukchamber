<?php

use App\Http\Controllers\WebClient\Home\HomeController;
use App\Http\Controllers\WebClient\Pages\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('web.home');

//About Us
Route::get('/about-us',[PageController::class,'loadAboutUs'])->name('web.about-us');
Route::get('/direct-board',[PageController::class,'loadDirectBoard'])->name('web.direct-board');
Route::get('/privacy-policy',[PageController::class,'loadPrivacyPolicy'])->name('web.privacy-policy');

//Contact Us
Route::get('/contact-us',[PageController::class,'loadContactUs'])->name('web.contact-us');
Route::post('/save-contact',[PageController::class,'saveContact'])->name('web.save.contact');

//Events
Route::get('/events',[PageController::class,'loadEvents'])->name('web.events');
Route::get('/events/{slug}',[PageController::class,'loadEventSingle'])->name('web.events.event-single');


//Memberships
Route::get('/memberships/{s}',[PageController::class,'loadMembership'])->name('web.memberships');
