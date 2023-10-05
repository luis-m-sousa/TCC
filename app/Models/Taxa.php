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
    return $this->belongsTo(Banco::class);
}
public function tipo_taxa()
{
    return $this->belongsTo(Tipo_taxa::class);
}

}
