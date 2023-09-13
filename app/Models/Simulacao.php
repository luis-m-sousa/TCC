<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Simulacao extends Model
{
    protected $table = 'simulacao';
    use HasFactory;
    protected $fillable = [
        'user_id',
        'valor',
        'taxa',
        'tempo',
        'parcela',
        'titulo',
        'tipo',
        'data_criacao',
    ];

    // Relação com o usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
