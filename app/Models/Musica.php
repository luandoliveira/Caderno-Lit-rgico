<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    protected $fillable = [
        'titulo',
        'compositor',
        'tempo_liturgico_id',
        'parte_missa_id',
        'tipo_canto_id',
        'arquivo',
    ];

    public function tempoLiturgico() {
        return $this->belongsTo(TempoLiturgico::class);
    }

    public function parteMissa() {
        return $this->belongsTo(ParteMissa::class);
    }

    public function tipoCanto() {
        return $this->belongsTo(TipoCanto::class);
    }

    public function cadernos() {
        return $this->belongsToMany(Caderno::class, 'caderno_musicas')->withPivot('ordem');
    }
}

