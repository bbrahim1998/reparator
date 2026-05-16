<?php

/*
 * MODELO LÍNEA DE TICKET
 *
 * Representa un producto individual dentro de un pedido.
 * Almacena el nombre, precio, cantidad y subtotal
 * en el momento de la compra (histórico inmutable).
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LineaTicket extends Model
{
    /* Nombre personalizado de la tabla en la BD (líneas de ticket) */
    protected $table = 'lineas_ticket';

    /* Campos asignables masivamente: pedido, producto y datos de compra */
    protected $fillable = [
        'pedido_id', 'producto_id', 'nombre', 'precio', 'cantidad', 'subtotal',
    ];

    /*
     * Relación: una línea de ticket pertenece a un pedido.
     *
     * @return BelongsTo
     */
    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class);
    }

    /*
     * Relación: una línea de ticket pertenece a un producto.
     *
     * @return BelongsTo
     */
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }
}
