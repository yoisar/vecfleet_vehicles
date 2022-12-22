<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VecfleetVehicleBrandController;
use App\Http\Controllers\VecfleetVehicleController;
use App\Http\Controllers\VecfleetVehicleTypeController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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

// Register an user and create toeken access 
Route::post('/register', [AuthController::class, 'register']);
// create user access 
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});
//login the user
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Vehicles endpoint
Route::middleware('auth:sanctum')->resource('vehicles', VecfleetVehicleController::class);
Route::middleware('auth:sanctum')->patch('/vehicles/{id}', 'App\Http\Controllers\VecfleetVehicleController@update')->name('vehicles.update');
// Types endpoint
Route::resource('types', VecfleetVehicleTypeController::class);
// Brands endpoint
Route::resource('brands', VecfleetVehicleBrandController::class);
