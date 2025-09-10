@extends('layouts.app')

@section('content')
<h2>📖 {{ $caderno->nome }}</h2>
<p><strong>Descrição:</strong> {{ $caderno->descricao ?? '-' }}</p>

<h4 class="mt-4">Músicas incluídas:</h4>
<ul class="list-group mb-3">
    @forelse($caderno->musicas as $musica)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <strong>{{ $musica->titulo }}</strong>
                <small class="text-muted">
                    ({{ $musica->tempoLiturgico->nome }} • {{ $musica->parteMissa->nome }})
                </small>
            </div>
            <a href="{{ asset('storage/' . $musica->arquivo) }}" target="_blank" class="btn btn-sm btn-outline-primary">📂 Ver Arquivo</a>
        </li>
    @empty
        <li class="list-group-item text-muted">Nenhuma música adicionada.</li>
    @endforelse
</ul>

<a href="{{ route('cadernos.export', $caderno) }}" class="btn btn-success">📄 Exportar para PDF</a>
<a href="{{ route('cadernos.index') }}" class="btn btn-secondary">⬅️ Voltar</a>
@endsection
