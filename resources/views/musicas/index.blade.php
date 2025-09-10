@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>🎵 Lista de Músicas</h2>
    <a href="{{ route('musicas.create') }}" class="btn btn-primary">+ Nova Música</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>Título</th>
            <th>Compositor</th>
            <th>Tempo Litúrgico</th>
            <th>Parte da Missa</th>
            <th>Tipo de Canto</th>
            <th style="width: 180px;">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($musicas as $musica)
        <tr>
            <td>{{ $musica->titulo }}</td>
            <td>{{ $musica->compositor ?? '-' }}</td>
            <td>{{ $musica->tempoLiturgico->nome }}</td>
            <td>{{ $musica->parteMissa->nome }}</td>
            <td>{{ $musica->tipoCanto->nome }}</td>
            <td>
                <a href="{{ route('musicas.edit', $musica) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                <form action="{{ route('musicas.destroy', $musica) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir esta música?')">🗑️ Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center text-muted">Nenhuma música cadastrada ainda.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
