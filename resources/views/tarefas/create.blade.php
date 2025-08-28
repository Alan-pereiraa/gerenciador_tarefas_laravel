@extends('layout')

@section('title', 'Criar Tarefa')

@section('content')
<h1>Criar Nova Tarefa</h1>

<form action="{{ route('tarefas.store') }}" method="POST">
@csrf
<div class="mb-3">
    <label for="titulo" class="form-label">Título:</label>
    <input type="text" name="titulo" id="titulo" class="form-control" required>
</div>
<div class="mb-3">
    <label for="prazo" class="form-label">Prazo:</label>
    <input type="date" name="prazo" id="prazo" class="form-control" min="{{ \Carbon\Carbon::now()->toDateString() }}" required>
</div>
<button type="submit" class="btn btn-success">Salvar</button>
<a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection