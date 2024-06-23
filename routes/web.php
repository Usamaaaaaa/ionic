<?php

use App\Models\Trafic;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TraficController;

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
//     $totalCount = Trafic::get()->count();
//     return view('dashboard',);
// });

Route::get('/', [TraficController::class, 'index']);
Route::get('/chart', [TraficController::class, 'getChartData']);