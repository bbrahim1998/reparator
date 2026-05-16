<?php

/*
 * MODELO USUARIO
 *
 * Modelo de autenticación que extiende la clase base
 * de Laravel. Almacena datos personales, direcciones
 * de envío y facturación, y el rol del usuario.
 */

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'name', 'apellidos', 'email', 'password',
    'fecha_nacimiento', 'telefono',
    'envio_tipo_via', 'envio_nombre_via', 'envio_numero', 'envio_piso_puerta',
    'envio_codigo_postal', 'envio_provincia', 'envio_municipio', 'envio_info_adicional',
    'facturacion_tipo_via', 'facturacion_nombre_via', 'facturacion_numero', 'facturacion_piso_puerta',
    'facturacion_codigo_postal', 'facturacion_provincia', 'facturacion_municipio', 'facturacion_info_adicional',
    'distancia',
    'rol'
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /*
     * Define los casts de atributos: email_verified_at como datetime,
     * password como hash, y rol como string.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'rol' => 'string',
        ];
    }
}
