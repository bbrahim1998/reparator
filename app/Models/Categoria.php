<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria_padre_id',
        'imagen',
        'solo_local',
        'solo_tienda',
    ];

    protected function casts(): array
    {
        return [
            'solo_local' => 'boolean',
            'solo_tienda' => 'boolean',
        ];
    }

    public function padre(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_padre_id');
    }

    public function hijos(): HasMany
    {
        return $this->hasMany(Categoria::class, 'categoria_padre_id');
    }

    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
