<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');
header('Access-Control-Expose-Headers:Authorization');

Route::get('products', 'ProductController@get');
Route::get('pageProduct', 'ProductController@index');
Route::get('sections', 'SectionController@index');
Route::get('categories', 'CategoryController@index');
Route::post('addOrder', 'OrderController@store');
Route::get('ordersByUser', 'OrderController@getByUser');
Route::get('users', 'UserController@getUsers');
Route::post('addProduct', 'ProductController@store');
Route::post('deleteProduct', 'ProductController@delete');
Route::post('updateProduct/{id}', 'ProductController@update');
Route::post('destroyUser/{id}', 'UserController@destroy');
Route::post('updateUser/{id}', 'UserController@update');
Route::post('addCategory', 'CategoryController@store');
Route::post('deleteCategory/{id}', 'CategoryController@destroy');
Route::post('updateCategory/{id}', 'CategoryController@update');


Route::prefix('auth')->group(function () {
    // Below mention routes are public, user can access those without any restriction.
    // Create New User
    Route::post('register', 'AuthController@register');
    // Login User
    Route::post('login', 'AuthController@login');
    
    // Refresh the JWT Token
    Route::get('refresh', 'AuthController@refresh');
    
    // Below mention routes are available only for the authenticated users.
    Route::middleware('auth:api')->group(function () {
        // Get user info
        Route::get('user', 'AuthController@user');
        // Logout user from application
        Route::post('logout', 'AuthController@logout');
    });
});
