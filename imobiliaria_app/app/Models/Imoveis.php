<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imoveis extends Model
{
    protected $table = 'cadimovel';

    use SoftDeletes;

    protected $fillable = [

        'id',
        'proprietario',
        'tipo_pessoa',
        'documento',
        'e_mail',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'status',
    ];
}
