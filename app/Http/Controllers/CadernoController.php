<?php

namespace App\Http\Controllers;

use App\Models\Caderno;
use App\Models\Musica;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use iio\libmergepdf\Merger;
use iio\libmergepdf\Driver\TcpdiDriver;
use Illuminate\Support\Facades\Storage;

class CadernoController extends Controller
{
    public function index()
    {
        $cadernos = Caderno::with('musicas')->get();
        return view('cadernos.index', compact('cadernos'));
    }

    public function create()
    {
        $musicas = Musica::all();
        return view('cadernos.create', compact('musicas'));
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        $caderno = Caderno::create($request->only('nome', 'descricao'));

        if ($request->has('musicas')) {
            $ordem = 1;
            foreach ($request->musicas as $musica_id) {
                $caderno->musicas()->attach($musica_id, ['ordem' => $ordem++]);
            }
        }

        return redirect()->route('cadernos.index')->with('success', 'Caderno criado!');
    }

    public function show(Caderno $caderno)
    {
        $caderno->load('musicas');
        return view('cadernos.show', compact('caderno'));
    }

    public function edit(Caderno $caderno)
    {
        $musicas = Musica::all();
        $caderno->load('musicas');
        return view('cadernos.edit', compact('caderno', 'musicas'));
    }

    public function update(Request $request, Caderno $caderno)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        $caderno->update($request->only('nome', 'descricao'));

        $caderno->musicas()->detach();
        if ($request->has('musicas')) {
            $ordem = 1;
            foreach ($request->musicas as $musica_id) {
                $caderno->musicas()->attach($musica_id, ['ordem' => $ordem++]);
            }
        }

        return redirect()->route('cadernos.index')->with('success', 'Caderno atualizado!');
    }

    public function destroy(Caderno $caderno)
    {
        $caderno->delete();
        return redirect()->route('cadernos.index')->with('success', 'Caderno removido!');
    }

    public function exportPdf(Caderno $caderno)
    {
        $caderno->load(['musicas' => function ($query) {
            $query->orderBy('pivot_ordem');
        }]);

        $merger = new Merger(new FpdiDriver());

        // 1. Gera capa + sumário em DomPDF
        $pdfIntro = \Pdf::loadView('cadernos.pdf_intro', compact('caderno'))->output();
        $merger->addRaw($pdfIntro);

        // 2. Adiciona as músicas (caso sejam PDFs)
        foreach ($caderno->musicas as $musica) {
            $ext = pathinfo($musica->arquivo, PATHINFO_EXTENSION);
            $path = Storage::disk('public')->path($musica->arquivo);

            if (strtolower($ext) === 'pdf' && file_exists($path)) {
                $merger->addFile($path);
            }
        }

        // 3. Exporta caderno final
        $finalPdf = $merger->merge();
        return response($finalPdf)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', "attachment; filename=Caderno-{$caderno->nome}.pdf");
    }
}
