<?php

namespace App\Http\Controllers;

use App\Models\TempoLiturgico;
use Illuminate\Http\Request;

class TempoLiturgicoController extends Controller
{
    public function index()
    {
        $tempos = TempoLiturgico::all();
        return view('tempos.index', compact('tempos'));
    }

    public function create()
    {
        return view('tempos.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:100']);
        TempoLiturgico::create($request->all());
        return redirect()->route('tempos.index')->with('success', 'Tempo litúrgico criado!');
    }

    public function edit(TempoLiturgico $tempo)
    {
        return view('tempos.edit', compact('tempo'));
    }

    public function update(Request $request, TempoLiturgico $tempo)
    {
        $request->validate(['nome' => 'required|string|max:100']);
        $tempo->update($request->all());
        return redirect()->route('tempos.index')->with('success', 'Tempo litúrgico atualizado!');
    }

    public function destroy(TempoLiturgico $tempo)
    {
        $tempo->delete();
        return redirect()->route('tempos.index')->with('success', 'Tempo litúrgico removido!');
    }
}
