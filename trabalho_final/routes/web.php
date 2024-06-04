<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\QuestaoController;

Route::get('/', function () {
  return view('home');
});

Route::get('/dashboard', [TesteController::class, 'dashboard'])->name('dashboard');

Route::prefix('teste')->name('teste.')->middleware("auth")->group(function() {
  Route::get('/criar', [TesteController::class, 'create'])->name('create');
  Route::post('/', [TesteController::class, 'store'])->name('store');
  Route::get('/{id}', [TesteController::class, 'show'])->name('show');
  Route::get('/edit/{id}', [TesteController::class, 'edit'])->name('edit');
  Route::put('/update/{id}', [TesteController::class, 'update'])->name('update');
  Route::delete('/{id}', [TesteController::class, 'destroy'])->name('destroy');
  Route::get('/{teste_id}/questao/create', [QuestaoController::class, 'create'])->name('questao.create');
  Route::post('/{teste_id}/questao', [QuestaoController::class, 'store'])->name('questao.store');
  Route::post('/{teste_id}/questao/add', [QuestaoController::class, 'storeAndAddAnother'])->name('questao.add_another');
});

Route::prefix('questoes')->name('questoes.')->middleware("auth")->group(function() {
  Route::get('/', [QuestaoController::class, 'view'])->name('view');
  Route::put('/update/{id}', [QuestaoController::class, 'update'])->name('update');
  Route::delete('/{id}', [QuestaoController::class, 'destroy'])->name('destroy');
});