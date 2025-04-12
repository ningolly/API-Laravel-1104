<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbAluno extends Model
{

    protected $table = 'tb_alunos';

    protected $fillable = [
        'nome',
        'email',
        'rg',
    ];
}
