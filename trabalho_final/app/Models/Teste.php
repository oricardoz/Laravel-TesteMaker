<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teste extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nome',
        'pontuacao_minima_aprovacao',
    ];

    public function questoes()
    {
        return $this->hasMany(Questao::class);
    }

    protected $table = 'teste'; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
