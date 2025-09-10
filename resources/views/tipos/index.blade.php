@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>📂 Tipos de Canto</h2>
    <a href="{{ route('tipos.create') }}" class="btn btn-primary">+ Novo Tipo</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th style="width: 180px;">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($tipos as $tipo)
        <tr>
            <td>{{ $tipo->nome }}</td>
            <td>
                <a href="{{ route('tipos.edit', $tipo) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                <form action="{{ route('tipos.destroy', $tipo) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este tipo de canto?')">🗑️ Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2" class="text-center text-muted">Nenhum tipo cadastrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
