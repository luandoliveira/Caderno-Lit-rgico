@extends('layouts.app')

@section('content')
<h2>➕ Novo Caderno</h2>

<form action="{{ route('cadernos.store') }}" method="POST" class="mt-3">
    @csrf

    <div class="mb-3">
        <label for="nome" class="form-label">Nome *</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3">{{ old('descricao') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="musicas" class="form-label">Selecione as músicas *</label>
        <select name="musicas[]" id="musicas" class="form-select" multiple required>
            @foreach($musicas as $musica)
                <option value="{{ $musica->id }}">{{ $musica->titulo }}</option>
            @endforeach
        </select>
        <small class="text-muted">Segure CTRL (ou CMD no Mac) para selecionar várias músicas.</small>
    </div>

    <button type="submit" class="btn btn-success">💾 Salvar</button>
    <a href="{{ route('cadernos.index') }}" class="btn btn-secondary">⬅️ Voltar</a>
</form>
@endsection
