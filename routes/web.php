<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SuperAdminMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CustomerMiddleware;


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
})->name('home');
Route::get('/terms-and-conditions', function () {
    return view('terms');
})->name('terms');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['as'=>'superadmin.','prefix'=>'superadmin','namespace'=>'superadmin','middleware'=>['auth',SuperAdminMiddleware::class]],function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/pendingrequests', 'DashboardController@pending')->name('pending');
    Route::put('/approve_wep','WepCustomerDataController@approve_wep')->name('approve_wep');

    Route::get('/contents', 'ContentController@index')->name('contents');
    Route::get('/contents/edit/{content}', 'ContentController@edit')->name('contents.edit');
    Route::patch('/contents/update/{content}', 'ContentController@update')->name('contents.update');
});
Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'admin','middleware'=>['auth',AdminMiddleware::class]],function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/pendingrequests', 'DashboardController@pending')->name('pending');
    // Route::put('/approve_wep','WepCustomerDataController@approve_wep')->name('approve_wep');
    // Route::get('/contents', 'ContentController@index')->name('contents');
    // Route::get('/contents/edit/{content}', 'ContentController@edit')->name('contents.edit');
    // Route::patch('/contents/update/{content}', 'ContentController@update')->name('contents.update');
});
Route::group(['as'=>'customer.','prefix'=>'customer','namespace'=>'customer','middleware'=>['auth',CustomerMiddleware::class]],function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    
    // Route::get('/contents', 'ContentController@index')->name('contents');
    // Route::get('/contents/edit/{content}', 'ContentController@edit')->name('contents.edit');
    // Route::patch('/contents/update/{content}', 'ContentController@update')->name('contents.update');
});
Route::get('/profile/{wepCustomerData}', 'WepCustomerDataController@show')->name('wepcustomerdata.show')->prefix('customer')->middleware(['auth']);
Route::get('/warrantycard/{wepCustomerData}', 'WepCustomerDataController@getcard')->name('wepcustomerdata.getcard')->prefix('customer')->middleware(['auth']);
Route::get('/edit/{wepCustomerData}', 'WepCustomerDataController@edit')->name('wepcustomerdata.edit')->prefix('customer')->middleware([SuperAdminMiddleware::class]);
Route::put('/{wepCustomerData}', 'WepCustomerDataController@update')->name('wepcustomerdata.update')->prefix('customer')->middleware([SuperAdminMiddleware::class]);
Route::post('/wepcustomerdata', 'WepCustomerDataController@store')->name('wepcustomerdata.store');
Route::delete('/{wepCustomerData}', 'WepCustomerDataController@destroy')->name('wepcustomerdata.destroy')->middleware([SuperAdminMiddleware::class]);

Route::put('/approve/{wepCustomerData}', 'WepCustomerDataController@approve')->name('wepcustomerdata.approve')->middleware([SuperAdminMiddleware::class]);