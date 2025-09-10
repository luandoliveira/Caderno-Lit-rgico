<?php

namespace App\Http\Controllers;

use App\Models\ParteMissa;
use Illuminate\Http\Request;

class ParteMissaController extends Controller
{
    public function index()
    {
        $partes = ParteMissa::all();
        return view('partes.index', compact('partes'));
    }

    public function create()
    {
        return view('partes.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:100']);
        ParteMissa::create($request->all());
        return redirect()->route('partes.index')->with('success', 'Parte da missa criada!');
    }

    public function edit(ParteMissa $parte)
    {
        return view('partes.edit', compact('parte'));
    }

    public function update(Request $request, ParteMissa $parte)
    {
        $request->validate(['nome' => 'required|string|max:100']);
        $parte->update($request->all());
        return redirect()->route('partes.index')->with('success', 'Parte da missa atualizada!');
    }

    public function destroy(ParteMissa $parte)
    {
        $parte->delete();
        return redirect()->route('partes.index')->with('success', 'Parte da missa removida!');
    }
}
