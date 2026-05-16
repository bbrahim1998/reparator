<?php

/*
 * MODELO CATEGORÍA
 *
 * Representa una categoría de productos con soporte
 * jerárquico (categoría padre e hijas). Cada categoría
 * puede tener múltiples productos asociados.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    /* Nombre personalizado de la tabla en la BD (categorías) */
    protected $table = 'categorias';

    /* Campos asignables masivamente: nombre, descripción, padre, imagen y flags */
    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria_padre_id',
        'imagen',
        'solo_local',
        'solo_tienda',
    ];

    /*
     * Convierte solo_local y solo_tienda a booleanos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'solo_local' => 'boolean',
            'solo_tienda' => 'boolean',
        ];
    }

    /*
     * Relación: una categoría puede pertenecer a una categoría padre.
     *
     * @return BelongsTo
     */
    public function padre(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_padre_id');
    }

    /*
     * Relación: una categoría puede tener muchas categorías hijas.
     *
     * @return HasMany
     */
    public function hijos(): HasMany
    {
        return $this->hasMany(Categoria::class, 'categoria_padre_id');
    }

    /*
     * Relación: una categoría tiene muchos productos.
     *
     * @return HasMany
     */
    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
