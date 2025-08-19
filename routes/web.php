<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\TalentHunterController;
use App\Http\Controllers\TipskerjaController;
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

Route::get('/',[HomeController::class, 'index']);
Route::get('/detail/job',[HomeController::class, 'viewjob']);

Route::get('/talenthunter',[TalentHunterController::class, 'index']);

Route::get('/tipskerja',[TipskerjaController::class, 'index']);
Route::get('/tipskerja/details',[TipskerjaController::class, 'details']);  

Route::get('/daftarkandidat',[KandidatController::class, 'index']);
Route::get('/pasanglowongan',[LowonganController::class, 'index']);



Route::get('/login', function(){
    return view('/Auth.login');
}); 
Route::get('/register', function(){
    return view('/Auth.Register');
}); 
