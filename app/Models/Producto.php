<?php

/*
 * MODELO PRODUCTO
 *
 * Representa un producto/servicio del catálogo.
 * Contiene nombre, descripción, precio, imagen,
 * stock y flags de disponibilidad (solo_local, solo_tienda).
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    /* Nombre personalizado de la tabla en la BD (productos) */
    protected $table = 'productos';

    /* Campos asignables masivamente: datos del producto, categoría, flags y precio */
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

    /*
     * Convierte solo_local y solo_tienda a booleanos,
     * y precio a decimal con 2 decimales.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'solo_local' => 'boolean',
            'solo_tienda' => 'boolean',
            'precio' => 'decimal:2',
        ];
    }

    /*
     * Relación: un producto pertenece a una categoría.
     *
     * @return BelongsTo
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
