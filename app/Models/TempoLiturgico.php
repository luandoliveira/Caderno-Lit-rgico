<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempoLiturgico extends Model
{
    protected $table = "tempos_liturgicos";
    protected $fillable = ['nome'];
}
