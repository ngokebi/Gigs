<?php

use App\Http\Controllers\GigController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Mail\CreateGig;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('site.body.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {

// Gigs Controller

Route::controller(GigController::class)->group(function() {
    Route::get('/gigs/logout', 'destroy')->name('gigs.logout');
    Route::get('/gigs/all', 'Home_Gigs')->name('home.gigs');
    Route::get('/gigs/add', 'add_Gigs')->name('add.gigs');
    Route::post('/gigs/save', 'save_Gigs')->name('save.gigs');
    Route::get('/gigs/edit/{id}', 'edit_Gigs')->name('edit.gigs');
    Route::get('/gigs/status/{id}', 'edit_Status')->name('status.gigs');
    Route::post('/status/update', 'update_Status')->name('update.status');
    Route::post('/gigs/update', 'update_Gigs')->name('update.gigs');
    Route::get('/gigs/delete/{id}', 'delete_Gigs')->name('delete.gigs');
    Route::get('/gigs/show/{id}', 'show_Gigs')->name('show.gigs');

});

Route::controller(CountryController::class)->group(function() {

    Route::get('/country/all', 'Home_Country')->name('home.country');
    Route::get('/country/add', 'add_Country')->name('add.country');
    Route::post('/country/save', 'save_Country')->name('save.country');
    Route::get('/country/edit/{id}', 'edit_Country')->name('edit.country');
    Route::post('/country/update', 'update_Country')->name('update.country');
    Route::get('/country/delete/{id}', 'delete_Country')->name('delete.country');

});

Route::controller(StateController::class)->group(function() {
    Route::get('/state/all', 'Home_State')->name('home.state');
    Route::get('/state/add', 'add_State')->name('add.state');
    Route::post('/state/save', 'save_State')->name('save.state');
    Route::get('/state/edit/{id}', 'edit_State')->name('edit.state');
    Route::post('/state/update', 'update_State')->name('update.state');
    Route::get('/state/delete/{id}', 'delete_State')->name('delete.state');

});

Route::get('states/country/ajax/{country_id}', [GigController::class, 'Get_State']);


Route::get('/email', function() {
    Mail::to('kebidegozi@meme.com')->send(new CreateGig());
    return new CreateGig();
});

});



