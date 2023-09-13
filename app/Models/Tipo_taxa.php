<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tipo_taxa extends Model
{
    use HasFactory;
    
    protected $table = 'tipo_taxa';
    protected $fillable = [
        'nome',
    ];

    public function taxa(): BelongsTo{
        return $this->belongsTo(Taxa::class);
    }
}
