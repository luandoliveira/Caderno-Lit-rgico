@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>✝️ Partes da Missa</h2>
    <a href="{{ route('partes.create') }}" class="btn btn-primary">+ Nova Parte</a>
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
        @forelse($partes as $parte)
        <tr>
            <td>{{ $parte->nome }}</td>
            <td>
                <a href="{{ route('partes.edit', $parte) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                <form action="{{ route('partes.destroy', $parte) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir esta parte da missa?')">🗑️ Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2" class="text-center text-muted">Nenhuma parte cadastrada.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
