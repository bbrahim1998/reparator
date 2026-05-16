<?php

/*
 * MODELO CONSULTA
 *
 * Almacena las consultas que los usuarios realizan
 * sobre productos concretos. Incluye datos de contacto
 * y el mensaje de la consulta.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Consulta extends Model
{
    /* Nombre personalizado de la tabla en la BD (consultas) */
    protected $table = 'consultas';

    /* Campos asignables masivamente: datos de contacto, producto y mensaje */
    protected $fillable = [
        'nombre',
        'apellidos',
        'mail',
        'producto_id',
        'consulta',
    ];

    /*
     * Relación: una consulta pertenece a un producto.
     *
     * @return BelongsTo
     */
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }
}
