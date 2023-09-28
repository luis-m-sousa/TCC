<?php

use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimulacaoController;
use App\Http\Controllers\TaxaController;
use App\Http\Controllers\CompararController;
use App\Http\Controllers\PessoalINSSController;
use App\Http\Controllers\PessoalNaoConsignadoController;
use App\Http\Controllers\PessoalPrivadoController;
use App\Http\Controllers\PessoalPublicoController;
use App\Http\Controllers\CalculoMinimoController;

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
Route::get('/emprestimo', function(){return view('simulacao.create');})->middleware('auth');
Route::post('/emprestimo/taxa', [SimulacaoController::class, 'obterTaxa'])->name('obterTaxa');
Route::post('/emprestimo/banco', [SimulacaoController::class, 'obterSugestoesBanco'])->name('obterSugestoesBanco');

Route::get('/pessoal-privado', [PessoalPrivadoController::class, 'index'])->name('pessoalPrivado.index')->middleware('auth');
Route::post('/pessoal-privado', [PessoalPrivadoController::class, 'store'])->name('pessoalPrivado.store')->middleware('auth');

Route::get('/pessoal-publico', [PessoalPublicoController::class, 'index'])->name('pessoalPublico.index')->middleware('auth');
Route::post('/pessoal-publico', [PessoalPublicoController::class, 'store'])->name('pessoalPublico.store')->middleware('auth');

Route::get('/pessoal-inss', [PessoalINSSController::class, 'index'])->name('pessoalINSS.index')->middleware('auth');
Route::post('/pessoal-inss', [PessoalINSSController::class, 'store'])->name('pessoalINSS.store')->middleware('auth');

Route::get('/pessoal-naoconsignado', [PessoalNaoConsignadoController::class, 'index'])->name('pessoalNaoConsignado.index')->middleware('auth');
Route::post('/pessoal-naoconsignado', [PessoalNaoConsignadoController::class, 'store'])->name('pessoalNaoConsignado.store')->middleware('auth');

Route::get('/calculo-minimo', [CalculoMinimoController::class, 'index'])->name('calculoMinimo.index')->middleware('auth');
Route::post('/calculo-minimo', [CalculoMinimoController::class,'calcular'])->name('calculoMinimo.calcular')->middleware('auth');

Route::get('/historico',[SimulacaoController::class, 'historico'])->name('historico.index')->middleware('auth');
Route::get('/historico/delete/{id}',[SimulacaoController::class, 'delete'])->name('historico.delete')->middleware('auth');
Route::get('/historico/edit/{id}',[SimulacaoController::class, 'edit'])->name('historico.edit')->middleware('auth');
Route::post('/historico/update/{id}',[SimulacaoController::class, 'update'])->name('simulacao.update')->middleware('auth');
Route::get('/historico/exportar/{id}', [PdfController::class, 'geraPdf'])->name('historico.exportar')->middleware('auth');
    
Route::get('/taxa',[TaxaController::class, 'index'])->name('taxa.index');
Route::get('/taxa/create',[TaxaController::class, 'create'])->name('taxa.create');
Route::post('/taxa/create',[TaxaController::class, 'store'])->name('taxa.store');
Route::get('/taxa/edit/{id}',[TaxaController::class, 'edit'])->name('taxa.edit');
Route::post('/taxa/update/{id}',[TaxaController::class, 'update'])->name('taxa.update');
Route::get('/taxa/delete/{id}',[TaxaController::class, 'delete'])->name('taxa.delete');

Route::get('/banco',[BancoController::class, 'index'])->name('banco.index');
Route::get('/banco/create',[BancoController::class, 'create'])->name('banco.create');
Route::post('/banco/create',[BancoController::class, 'store'])->name('banco.store');
Route::get('/banco/edit/{id}',[BancoController::class, 'edit'])->name('banco.edit');
Route::post('/banco/update/{id}',[BancoController::class, 'update'])->name('banco.update');
Route::get('/banco/delete/{id}',[BancoController::class, 'delete'])->name('banco.delete');

Route::get('/comparar', [CompararController::class, 'index'])->name('historico.comparar')->middleware('auth');
Route::post('/comparar', [CompararController::class, 'comparar'])->name('historico.comparacao')->middleware('auth');




Route::get('/faq', function(){
    return view('faq');
})->name('faq');



Route::get('/teste', [AutocompleteController::class, 'index']);
Route::get('/autocomplete-search', [AutocompleteController::class, 'autocompleteSearch']);

Route::get('/grafico', function(){
    return view('grafico');
});