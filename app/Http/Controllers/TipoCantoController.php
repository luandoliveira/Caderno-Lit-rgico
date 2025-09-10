<?php

namespace App\Http\Controllers;

use App\Models\TipoCanto;
use Illuminate\Http\Request;

class TipoCantoController extends Controller
{
    public function index()
    {
        $tipos = TipoCanto::all();
        return view('tipos.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipos.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:100']);
        TipoCanto::create($request->all());
        return redirect()->route('tipos.index')->with('success', 'Tipo de canto criado!');
    }

    public function edit(TipoCanto $tipo)
    {
        return view('tipos.edit', compact('tipo'));
    }

    public function update(Request $request, TipoCanto $tipo)
    {
        $request->validate(['nome' => 'required|string|max:100']);
        $tipo->update($request->all());
        return redirect()->route('tipos.index')->with('success', 'Tipo de canto atualizado!');
    }

    public function destroy(TipoCanto $tipo)
    {
        $tipo->delete();
        return redirect()->route('tipos.index')->with('success', 'Tipo de canto removido!');
    }
}
