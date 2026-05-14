<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'categoria_id',
        'solo_local',
        'solo_tienda',
        'stock',
        'precio',
    ];

    protected function casts(): array
    {
        return [
            'solo_local' => 'boolean',
            'solo_tienda' => 'boolean',
            'precio' => 'decimal:2',
        ];
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
