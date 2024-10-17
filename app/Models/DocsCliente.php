<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocsCliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'doc_tipo',
        'nome',
        'data',
        'docs',
    ];
}
