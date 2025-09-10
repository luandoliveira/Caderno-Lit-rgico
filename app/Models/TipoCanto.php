<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCanto extends Model
{
    protected $table = "tipos_canto";
    protected $fillable = ['nome'];
}
