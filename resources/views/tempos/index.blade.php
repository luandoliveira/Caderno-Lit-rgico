@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>⏳ Tempos Litúrgicos</h2>
    <a href="{{ route('tempos.create') }}" class="btn btn-primary">+ Novo Tempo</a>
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
        @forelse($tempos as $tempo)
        <tr>
            <td>{{ $tempo->nome }}</td>
            <td>
                <a href="{{ route('tempos.edit', $tempo) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                <form action="{{ route('tempos.destroy', $tempo) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este tempo?')">🗑️ Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2" class="text-center text-muted">Nenhum tempo litúrgico cadastrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
