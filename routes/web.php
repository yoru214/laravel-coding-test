<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

/**
 * ------------------------------------------------------------------------
 * Get Routes
 * ------------------------------------------------------------------------
 */

/**
 * Route to view Home page where the user list is shown
 */
Route::get('/',  [UserController::class, 'list']);

/**
 * Route to view each user
 * @param   id  Int             id of the user
 */
Route::get('/user/{id}',  [UserController::class, 'show']);




/**
 * ------------------------------------------------------------------------
 * Post Routes
 * ------------------------------------------------------------------------
 */

/**
 * Route to Home page post
 */
Route::post('/',  [UserController::class, 'addComment']);
