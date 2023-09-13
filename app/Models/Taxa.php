<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Taxa extends Model
{
    protected $table = 'taxa';
    use HasFactory;

    protected $fillable = [
        'valor',
        'tipo_taxa_id',
        'banco_id',
    ];

    public function banco()
    {
        return $this->hasOne(Banco::class);
    }
    public function tipo_taxa()
    {
        return $this->hasOne(Tipo_taxa::class);
    }
}
