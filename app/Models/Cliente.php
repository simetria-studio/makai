<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'pais',
        'responsavel',
        'documento',
        'observacao',
        'status',

    ];

    public function docs()
    {
        return $this->hasMany(DocsCliente::class, 'cliente_id');
    }
}
