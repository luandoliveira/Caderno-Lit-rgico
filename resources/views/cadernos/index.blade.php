@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>📖 Cadernos</h2>
    <a href="{{ route('cadernos.create') }}" class="btn btn-primary">+ Novo Caderno</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Músicas</th>
            <th style="width: 220px;">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($cadernos as $caderno)
        <tr>
            <td>{{ $caderno->nome }}</td>
            <td>{{ $caderno->descricao ?? '-' }}</td>
            <td>{{ $caderno->musicas->count() }}</td>
            <td>
                <a href="{{ route('cadernos.show', $caderno) }}" class="btn btn-sm btn-info">👁️ Ver</a>
                <a href="{{ route('cadernos.edit', $caderno) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                <a href="{{ route('cadernos.export', $caderno) }}" class="btn btn-sm btn-success">📄 PDF</a>
                <form action="{{ route('cadernos.destroy', $caderno) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este caderno?')">🗑️ Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted">Nenhum caderno cadastrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
