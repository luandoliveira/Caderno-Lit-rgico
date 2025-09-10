<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caderno extends Model
{
    protected $fillable = ['nome', 'descricao'];

    public function musicas() {
        return $this->belongsToMany(Musica::class, 'caderno_musicas')->withPivot('ordem');
    }
}
