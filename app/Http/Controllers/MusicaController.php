<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use App\Models\TempoLiturgico;
use App\Models\ParteMissa;
use App\Models\TipoCanto;
use Illuminate\Http\Request;

class MusicaController extends Controller
{
    public function index()
    {
        $musicas = Musica::with(['tempoLiturgico', 'parteMissa', 'tipoCanto'])->get();
        return view('musicas.index', compact('musicas'));
    }

    public function create()
    {
        $tempos = TempoLiturgico::all();
        $partes = ParteMissa::all();
        $tipos  = TipoCanto::all();
        return view('musicas.create', compact('tempos', 'partes', 'tipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'arquivo' => 'required|file|mimes:pdf,jpg,png',
            'tempo_liturgico_id' => 'required|exists:tempos_liturgicos,id',
            'parte_missa_id' => 'required|exists:partes_missa,id',
            'tipo_canto_id' => 'required|exists:tipos_canto,id',
        ]);

        $path = $request->file('arquivo')->store('musicas', 'public');

        Musica::create(attributes: [
            'titulo' => $request->titulo,
            'compositor' => $request->compositor,
            'tempo_liturgico_id' => $request->tempo_liturgico_id,
            'parte_missa_id' => $request->parte_missa_id,
            'tipo_canto_id' => $request->tipo_canto_id,
            'arquivo' => $path,
        ]);

        return redirect()->route('musicas.index')->with('success', 'Música cadastrada com sucesso!');
    }

    public function show(Musica $musica)
    {
        return view('musicas.show', compact('musica'));
    }

    public function edit(Musica $musica)
    {
        $tempos = TempoLiturgico::all();
        $partes = ParteMissa::all();
        $tipos  = TipoCanto::all();
        return view('musicas.edit', compact('musica', 'tempos', 'partes', 'tipos'));
    }

    public function update(Request $request, Musica $musica)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tempo_liturgico_id' => 'required|exists:tempos_liturgicos,id',
            'parte_missa_id' => 'required|exists:partes_missa,id',
            'tipo_canto_id' => 'required|exists:tipos_canto,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('arquivo')) {
            $data['arquivo'] = $request->file('arquivo')->store('musicas', 'public');
        }

        $musica->update($data);

        return redirect()->route('musicas.index')->with('success', 'Música atualizada com sucesso!');
    }

    public function destroy(Musica $musica)
    {
        $musica->delete();
        return redirect()->route('musicas.index')->with('success', 'Música excluída com sucesso!');
    }
}
