<?php

use App\Http\Controllers\Drivers\DriverController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Reports\ReportController;
use App\Http\Controllers\Stores\StoreController;
use App\Http\Controllers\Welcome\WelcomeController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Workers\WorkerController;
use App\Http\Controllers\Rides\RideController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[LoginController::class,'index'])->name('login_form');

Route::post('/login',[LoginController::class,'login'])->name('login');

Route::get('/login', function(){
    return redirect()->route('login_form');
});

Route::get('/logout', function(){
    return redirect()->route('login_form');
});

Route::group(['middleware' => 'authenticated'], function(){



Route::get('/home',[WelcomeController::class,'index'])->name('welcome');

Route::post('/logout',[LoginController::class,'logout'])->name('logout');

/*

------------------------  Conductores  ------------------------ 

*/
//Index drivers
Route::get('/drivers',[DriverController::class,'index'])->name('show_drivers');

//Create drivers
Route::get('/create-driver',[DriverController::class,'create'])->name('create_driver');

//Store drivers
Route::post('/store-driver',[DriverController::class,'store'])->name('store_driver');

//Edit driver view
Route::get('/edit-driver/{driver}',[DriverController::class,'edit'])->name('edit_driver');

//Update driver route
Route::patch('/update-driver/{driver}',[DriverController::class,'update'])->name('update_driver');

//Delete driver
Route::delete('/delete-driver/{driver}',[DriverController::class,'destroy'])->name('delete_driver');


/*

------------------------  Usuarios  ------------------------ 

*/

//Index users
Route::get('/users',[UserController::class,'index'])->name('show_users');

//Create users
Route::get('/create-user',[UserController::class,'create'])->name('create_user');

//Store users
Route::post('/store-user',[UserController::class,'store'])->name('store_user');

//Edit user view
Route::get('/edit-user/{user}',[UserController::class,'edit'])->name('edit_user');

//Update user route
Route::patch('/update-user/{user}',[UserController::class,'update'])->name('update_user');

//Delete user
Route::delete('/delete-user/{user}',[UserController::class,'destroy'])->name('delete_user');


/*

------------------------  Sucursales  ------------------------ 

*/

//Index stores
Route::get('/stores',[StoreController::class,'index'])->name('show_stores');

//Create store
Route::get('/create-store',[StoreController::class,'create'])->name('create_store');

//Save store
Route::post('/save-store',[StoreController::class,'store'])->name('save_store');

//Edit store view
Route::get('/edit-store/{store}',[StoreController::class,'edit'])->name('edit_store');

//Update store route
Route::patch('/update-store/{store}',[StoreController::class,'update'])->name('update_store');

//Show store details
Route::get('/store-details/{store}',[StoreController::class,'show'])->name('show_store');

//Delete store
Route::delete('/delete-store/{store}',[StoreController::class,'destroy'])->name('delete_store');

//Add distances
Route::patch('/add-distances/{store}',[StoreController::class,'distance'])->name('store_distance');

/*

------------------------  Colaboradores  ------------------------ 

*/

//Index workers
Route::get('/workers',[WorkerController::class,'index'])->name('show_workers');

//Create worker
Route::get('/create-worker',[WorkerController::class,'create'])->name('create_worker');

//Save worker
Route::post('/save-worker',[WorkerController::class,'store'])->name('store_worker');

//Edit worker view
Route::get('/edit-worker/{worker}',[WorkerController::class,'edit'])->name('edit_worker');

//Update worker route
Route::patch('/update-worker/{worker}',[WorkerController::class,'update'])->name('update_worker');


//Delete worker
Route::delete('/delete-worker/{worker}',[WorkerController::class,'destroy'])->name('delete_worker');


/*

------------------------  Viajes  ------------------------ 

*/

//Index rides
Route::get('/rides',[RideController::class,'index'])->name('show_rides');

//Create ride
Route::get('/create-ride',[RideController::class,'create'])->name('create_ride')->middleware(['isAdmin']);

//Select workers
Route::post('/asign-workers',[RideController::class,'asignWorkers'])->name('asign_workers');

//Store ride
Route::post('/save-ride',[RideController::class,'store'])->name('store_ride');

//Update ride route
Route::patch('/update-ride/{ride}',[RideController::class,'update'])->name('update_ride');


//Ride details
Route::get('/ride-details/{ride}',[RideController::class,'rideDetails'])->name('ride_details');



/*

------------------------  Reportes  ------------------------ 

*/

//Index
Route::get('/reports',[ReportController::class,'index'])->name('reports');

//Generate report
Route::get('/generate-report',[ReportController::class,'generate'])->name('generate_report');

});