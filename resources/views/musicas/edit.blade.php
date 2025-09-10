@extends('layouts.app')

@section('content')
<h2>✏️ Editar Música</h2>

<form action="{{ route('musicas.update', $musica) }}" method="POST" enctype="multipart/form-data" class="mt-3">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="titulo" class="form-label">Título *</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $musica->titulo) }}" required>
    </div>

    <div class="mb-3">
        <label for="compositor" class="form-label">Compositor</label>
        <input type="text" class="form-control" id="compositor" name="compositor" value="{{ old('compositor', $musica->compositor) }}">
    </div>

    <div class="mb-3">
        <label for="tempo_liturgico_id" class="form-label">Tempo Litúrgico *</label>
        <select name="tempo_liturgico_id" id="tempo_liturgico_id" class="form-select" required>
            @foreach($tempos as $tempo)
                <option value="{{ $tempo->id }}" {{ old('tempo_liturgico_id', $musica->tempo_liturgico_id) == $tempo->id ? 'selected' : '' }}>
                    {{ $tempo->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="parte_missa_id" class="form-label">Parte da Missa *</label>
        <select name="parte_missa_id" id="parte_missa_id" class="form-select" required>
            @foreach($partes as $parte)
                <option value="{{ $parte->id }}" {{ old('parte_missa_id', $musica->parte_missa_id) == $parte->id ? 'selected' : '' }}>
                    {{ $parte->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="tipo_canto_id" class="form-label">Tipo de Canto *</label>
        <select name="tipo_canto_id" id="tipo_canto_id" class="form-select" required>
            @foreach($tipos as $tipo)
                <option value="{{ $tipo->id }}" {{ old('tipo_canto_id', $musica->tipo_canto_id) == $tipo->id ? 'selected' : '' }}>
                    {{ $tipo->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Arquivo Atual:</label><br>
        @if($musica->arquivo)
            <a href="{{ asset('storage/' . $musica->arquivo) }}" target="_blank" class="btn btn-sm btn-outline-primary">📂 Ver Arquivo</a>
        @else
            <span class="text-muted">Nenhum arquivo enviado.</span>
        @endif
    </div>

    <div class="mb-3">
        <label for="arquivo" class="form-label">Substituir Arquivo (opcional)</label>
        <input type="file" class="form-control" id="arquivo" name="arquivo" accept=".pdf,.jpg,.jpeg,.png">
    </div>

    <button type="submit" class="btn btn-success">💾 Atualizar</button>
    <a href="{{ route('musicas.index') }}" class="btn btn-secondary">⬅️ Voltar</a>
</form>
@endsection
