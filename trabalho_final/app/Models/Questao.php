<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    use HasFactory;

    protected $table = 'questao'; 

    protected $fillable = [
        'teste_id',
        'enunciado',
        'opcao_a',
        'opcao_b',
        'opcao_c',
        'opcao_d',
        'opcao_e',
        'opcao_certa',
        'valor_questao',
    ];

    public function teste()
    {
        return $this->belongsTo(Teste::class);
    }
}
