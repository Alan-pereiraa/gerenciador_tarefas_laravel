<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
use App\Models\Tarefa;

Route::resource('tarefas', TarefaController::class);
Route::post('/prazo', [Tarefa::class, 'definePrazo'])->name("prazo");