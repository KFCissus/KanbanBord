<?php
use App\Http\Controllers\StackUnderflowController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [StackUnderflowController::class,'index']);
Route::post('/create', [StackUnderflowController::class,'create']);
Route::post('/destroy/{id}', [StackUnderflowController::class,'destroy']);
Route::get('/edit/{id}', [StackUnderflowController::class,'edit']);
Route::post('/save', [StackUnderflowController::class,'update']);


//Route::post('/edit', [StackUnderflowController::class,'edit']);
