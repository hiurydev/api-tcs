<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aluno extends Model
{
    use hasFactory;

    protected $table = 'alunos';

    protected $fillable = [
        'id',
        'nome',
        'idade',
        'cpf',
        'nome_responsavel'
    ];
}
