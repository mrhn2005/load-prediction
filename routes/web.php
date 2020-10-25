<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PanelController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('logged_in', [LoginController::class, 'authenticate']);

$limiter = config('fortify.limiters.login');
Route::post('/login', [LoginController::class, 'authenticate'])
        ->middleware(array_filter([
            'guest',
            $limiter ? 'throttle:'.$limiter : null,
        ]));

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', [PanelController::class, 'dashboard'])
    ->name('dashboard');

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth:sanctum', 'verified']
], function () {
    Route::get('/', [PanelController::class, 'dashboard'])->name('dashboard');
    Route::post('/change-city', [PanelController::class, 'changeCity'])->name('change-city');
});
