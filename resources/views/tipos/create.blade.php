@extends('layouts.app')

@section('content')
<h2>➕ Novo Tipo de Canto</h2>

<form action="{{ route('tipos.store') }}" method="POST" class="mt-3">
    @csrf

    <div class="mb-3">
        <label for="nome" class="form-label">Nome *</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
    </div>

    <button type="submit" class="btn btn-success">💾 Salvar</button>
    <a href="{{ route('tipos.index') }}" class="btn btn-secondary">⬅️ Voltar</a>
</form>
@endsection
