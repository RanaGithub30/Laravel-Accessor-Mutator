<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccessorController;
use App\Http\Controllers\MutatorController;


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

/*
        Check User Model for Accessor & Mutator codes
*/


/*
     Mutator => The mutator allows you to alter data before it's saved to a database. 
     Accessor => On the other hand, the accessor allows you to alter data after it's fetched from a database.
*/

/*
       Accessor Lists
*/

Route::get('short-name-accessor', [AccessorController::class, 'short_name_accessor'])->name('short-name-accessor');
Route::get('user-view-accessor', [AccessorController::class, 'user_view_accessor'])->name('user-view-accessor');
Route::get('user-dynamic-pagination-accessor', [AccessorController::class, 'user_dynamic_pagination_accessor'])->name('user-dynamic-pagination-accessor');

/*
       Mutator Lists
*/

Route::get('set-user-details', [MutatorController::class, 'set_user_details'])->name('set-user-details');
Route::get('update-user-details', [MutatorController::class, 'update_user_details'])->name('update-user-details');
