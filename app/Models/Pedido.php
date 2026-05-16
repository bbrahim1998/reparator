<?php

/*
 * MODELO PEDIDO
 *
 * Representa un pedido realizado por un usuario.
 * Contiene datos de envío, facturación, pago
 * y se relaciona con el usuario y las líneas de ticket.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedido extends Model
{
    /* Campos asignables masivamente: datos del cliente, direcciones, pago y total */
    protected $fillable = [
        'user_id',
        'name', 'apellidos', 'email', 'telefono',
        'envio_tipo_via', 'envio_nombre_via', 'envio_numero', 'envio_piso_puerta',
        'envio_codigo_postal', 'envio_municipio', 'envio_provincia', 'envio_info_adicional',
        'facturacion_tipo_via', 'facturacion_nombre_via', 'facturacion_numero',
        'facturacion_piso_puerta', 'facturacion_codigo_postal', 'facturacion_municipio',
        'facturacion_provincia', 'facturacion_info_adicional',
        'distancia', 'has_to_comment', 'total', 'ultimos_cuatro',
    ];

    /*
     * Relación: un pedido pertenece a un usuario.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /*
     * Relación: un pedido tiene muchas líneas de ticket (productos comprados).
     *
     * @return HasMany
     */
    public function lineasTicket(): HasMany
    {
        return $this->hasMany(LineaTicket::class, 'pedido_id');
    }
}
