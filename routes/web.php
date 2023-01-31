<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

// all listings
/*
Route::get('/', function () {
    return view('listings',[
        'heading' => 'Lastest Listings',
        'listings' => Listing::all()
    ]);
});*/

//single listing
/*
Route::get('listings/{listing}',function(Listing $listing)
{
        return view('listing',
        ['listing'=>$listing]);
});
*/
Route::get('/welcome',function()
{
    return 'welcome to my page';
});

Route::get('/welcome',function()
{
    return response ('welcome to my response page');
});

Route::get('/posts/{id}',function($id){
   // ddd($id);
return response('Post ' .$id);
})->where('id','[0-9]+');

Route::get('/search',function(Request $request){
    //dd($request);
    return $request->name . ' ' .$request->city;
});

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

// All Listings
Route::get('/', [ListingController::class, 'index']);

// Show Create Form
Route::get('/listings/create', 
[ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', 
[ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', 
[ListingController::class, 'edit'])->middleware('auth');



// Update Listing OR Edit Submit to update
Route::put('/listings/{listing}', 
[ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', 
[ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', 
[ListingController::class, 'manage'])->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', 
[ListingController::class, 'show']);

// Show Register/Create Form
Route::get('/register', 
[UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);