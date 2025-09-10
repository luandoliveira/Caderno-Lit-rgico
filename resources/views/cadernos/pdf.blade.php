<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Caderno - {{ $caderno->nome }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .capa {
            text-align: center;
            margin-top: 200px;
        }
        .capa img {
            max-width: 200px;
            margin-bottom: 20px;
        }
        .capa h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }
        .capa p {
            font-size: 16px;
            color: #555;
        }
        .sumario {
            page-break-before: always;
        }
        .sumario h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .musica {
            page-break-before: always;
        }
        .musica h3 {
            text-align: center;
            margin-bottom: 10px;
        }
        .nota {
            font-size: 12px;
            color: #777;
            text-align: center;
        }
        .imagem-musica {
            text-align: center;
            margin-top: 10px;
        }
        .imagem-musica img {
            max-width: 90%;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    {{-- CAPA --}}
    <div class="capa">
        <img src="{{ public_path('images/santana.png') }}" alt="Sant’Ana">
        <h1>Caderno de Cifras</h1>
        <p>Paróquia Sant’Ana - Padroeira da Comunidade</p>
        <p><strong>{{ $caderno->nome }}</strong></p>
    </div>

    {{-- SUMÁRIO --}}
    <div class="sumario">
        <h2>Sumário</h2>
        <ol>
            @foreach($caderno->musicas->sortBy('titulo') as $musica)
                <li>{{ $musica->titulo }}</li>
            @endforeach
        </ol>
    </div>

    {{-- MÚSICAS --}}
    @foreach($caderno->musicas as $musica)
        <div class="musica">
            <h3>{{ $musica->titulo }}</h3>
            <p class="nota">{{ $musica->tempoLiturgico->nome }} • {{ $musica->parteMissa->nome }}</p>

            @php
                $ext = pathinfo($musica->arquivo, PATHINFO_EXTENSION);
            @endphp

            @if(in_array(strtolower($ext), ['jpg','jpeg','png']))
                <div class="imagem-musica">
                    <img src="{{ public_path('storage/' . $musica->arquivo) }}" alt="{{ $musica->titulo }}">
                </div>
            @else
                <p class="nota">Arquivo em PDF anexado: não pode ser renderizado diretamente neste caderno.</p>
            @endif
        </div>
    @endforeach

</body>
</html>
