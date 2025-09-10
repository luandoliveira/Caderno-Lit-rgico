@extends('layouts.app')

@section('content')
<h2>✏️ Editar Tipo de Canto</h2>

<form action="{{ route('tipos.update', $tipo) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome *</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $tipo->nome) }}" required>
    </div>

    <button type="submit" class="btn btn-success">💾 Atualizar</button>
    <a href="{{ route('tipos.index') }}" class="btn btn-secondary">⬅️ Voltar</a>
</form>
@endsection
