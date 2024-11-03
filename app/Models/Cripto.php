<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cripto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',        // Nome da criptomoeda
        'quantidade',     
        'data_compra', // Data de compra
        'descricao',
        'valorUnitario',
    ];
}

