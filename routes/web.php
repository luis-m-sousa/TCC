<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimulacaoController;
use App\Models\Simulacao;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/', function () {
    return view('index');
});

Route::post('/emprestimo',[SimulacaoController::class, 'store'])->name('simulacao.store')->middleware('auth');

Route::get('/historico',[SimulacaoController::class, 'historico'])->name('historico.index')->middleware('auth');
Route::get('/historico/delete/{id}',[SimulacaoController::class, 'delete'])->name('historico.delete')->middleware('auth');

Route::get('/emprestimo', function(){
    return view('simulacao');
})->middleware('auth');