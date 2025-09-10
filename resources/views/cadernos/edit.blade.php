@extends('layouts.app')

@section('content')
<h2>✏️ Editar Caderno</h2>

<form action="{{ route('cadernos.update', $caderno) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome *</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $caderno->nome) }}" required>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3">{{ old('descricao', $caderno->descricao) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="musicas" class="form-label">Selecione as músicas *</label>
        <select name="musicas[]" id="musicas" class="form-select" multiple required>
            @foreach($musicas as $musica)
                <option value="{{ $musica->id }}"
                    {{ in_array($musica->id, $caderno->musicas->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $musica->titulo }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">💾 Atualizar</button>
    <a href="{{ route('cadernos.index') }}" class="btn btn-secondary">⬅️ Voltar</a>
</form>
@endsection
