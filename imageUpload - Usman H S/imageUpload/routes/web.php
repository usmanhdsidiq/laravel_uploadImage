<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantsController;

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

// Route::get('/', function () {
//     return view('index', [PlantsController:class, 'index']);
// });

Route::resource('plants', PlantsController::class);
//Route::put('/plants/{plants}', [PlantsController::class, 'update'])->name('plants.update')->withoutMiddleware('verifyCsrfToken');
Route::delete('/plants/{plants}', [PlantsController::class, 'destroy'])->name('plants.destroy');