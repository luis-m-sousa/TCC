<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Taxa extends Model
{
    protected $table = 'taxa';
    use HasFactory;
    protected $fillable = [
        'banco',
        'taxa',
        'tipo_taxa'
    ];
}
