@extends('layouts.app')

@section('content')
<h2>✏️ Editar Tempo Litúrgico</h2>

<form action="{{ route('tempos.update', $tempo) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome *</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $tempo->nome) }}" required>
    </div>

    <button type="submit" class="btn btn-success">💾 Atualizar</button>
    <a href="{{ route('tempos.index') }}" class="btn btn-secondary">⬅️ Voltar</a>
</form>
@endsection
