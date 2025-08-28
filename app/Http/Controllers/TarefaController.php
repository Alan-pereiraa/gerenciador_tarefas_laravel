<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    public function index()
    {
    $tarefas = Tarefa::all();
    return view('tarefas.index', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function store(Request $request)
    {
        $request->validate(['titulo' => 'required', 'prazo' => 'required|date|after_or_equal:today']);
        Tarefa::create($request->all());
        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function show(Tarefa $tarefa)
    {
    return view('tarefas.show', compact('tarefa'));
    }

    public function edit(Tarefa $tarefa)
    {
        return view('tarefas.edit', compact('tarefa'));
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $request->validate(['titulo' => 'required', 'prazo' => 'required|date|after_or_equal:today']);
        $tarefa->update($request->all());
        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada!');
    }

    public function destroy(Tarefa $tarefa)
    {
    $tarefa->delete();
    return redirect()->route('tarefas.index')->with('success', 'Tarefa excluída!');
    }

    public function definePrazo(Request $request, string $id)
    {
        $tarefa = Tarefa::findOrFail($id);

        $validated = $request->validate([
            'prazo' => 'required|string|min:10'
        ]);

        $tarefa->update($validated);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada!');
    }
}
