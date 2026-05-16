<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'apellidos' => 'Sistema',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'rol' => 'administrador',
            'fecha_nacimiento' => '1990-01-15',
            'telefono' => '+34600123456',
            'envio_tipo_via' => 'Calle',
            'envio_nombre_via' => 'Gran Vía',
            'envio_numero' => '42',
            'envio_piso_puerta' => '3º A',
            'envio_codigo_postal' => '28013',
            'envio_municipio' => 'Madrid',
            'envio_provincia' => 'Madrid',
            'facturacion_tipo_via' => 'Calle',
            'facturacion_nombre_via' => 'Gran Vía',
            'facturacion_numero' => '42',
            'facturacion_piso_puerta' => '3º A',
            'facturacion_codigo_postal' => '28013',
            'facturacion_municipio' => 'Madrid',
            'facturacion_provincia' => 'Madrid',
            'distancia' => '<5kms',
        ]);

        User::create([
            'name' => 'Test',
            'apellidos' => 'User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'rol' => 'cliente',
            'fecha_nacimiento' => '1995-06-20',
            'telefono' => '+34611111111',
            'envio_tipo_via' => 'Avenida',
            'envio_nombre_via' => 'Diagonal',
            'envio_numero' => '100',
            'envio_piso_puerta' => '5º 2ª',
            'envio_codigo_postal' => '08018',
            'envio_municipio' => 'Barcelona',
            'envio_provincia' => 'Barcelona',
            'facturacion_tipo_via' => 'Avenida',
            'facturacion_nombre_via' => 'Diagonal',
            'facturacion_numero' => '100',
            'facturacion_piso_puerta' => '5º 2ª',
            'facturacion_codigo_postal' => '08018',
            'facturacion_municipio' => 'Barcelona',
            'facturacion_provincia' => 'Barcelona',
            'distancia' => '<5kms',
        ]);

        User::create([
            'name' => 'María',
            'apellidos' => 'García López',
            'email' => 'maria@example.com',
            'password' => Hash::make('password'),
            'rol' => 'cliente',
            'fecha_nacimiento' => '1988-11-03',
            'telefono' => '+34622222222',
            'envio_tipo_via' => 'Calle',
            'envio_nombre_via' => 'Sierpes',
            'envio_numero' => '15',
            'envio_piso_puerta' => '2º',
            'envio_codigo_postal' => '41004',
            'envio_municipio' => 'Sevilla',
            'envio_provincia' => 'Sevilla',
            'facturacion_tipo_via' => 'Calle',
            'facturacion_nombre_via' => 'Sierpes',
            'facturacion_numero' => '15',
            'facturacion_piso_puerta' => '2º',
            'facturacion_codigo_postal' => '41004',
            'facturacion_municipio' => 'Sevilla',
            'facturacion_provincia' => 'Sevilla',
            'distancia' => '<5kms',
        ]);

        User::create([
            'name' => 'Carlos',
            'apellidos' => 'Martínez Ruiz',
            'email' => 'carlos@example.com',
            'password' => Hash::make('password'),
            'rol' => 'cliente',
            'fecha_nacimiento' => '1975-03-22',
            'telefono' => '+34633333333',
            'envio_tipo_via' => 'Plaza',
            'envio_nombre_via' => 'Ayuntamiento',
            'envio_numero' => '5',
            'envio_piso_puerta' => '1º C',
            'envio_codigo_postal' => '46002',
            'envio_municipio' => 'Valencia',
            'envio_provincia' => 'Valencia',
            'facturacion_tipo_via' => 'Plaza',
            'facturacion_nombre_via' => 'Ayuntamiento',
            'facturacion_numero' => '5',
            'facturacion_piso_puerta' => '1º C',
            'facturacion_codigo_postal' => '46002',
            'facturacion_municipio' => 'Valencia',
            'facturacion_provincia' => 'Valencia',
            'distancia' => '<30kms',
        ]);

        User::create([
            'name' => 'Laura',
            'apellidos' => 'Fernández González',
            'email' => 'laura@example.com',
            'password' => Hash::make('password'),
            'rol' => 'cliente',
            'fecha_nacimiento' => '2000-09-10',
            'telefono' => '+34644444444',
            'envio_tipo_via' => 'Calle',
            'envio_nombre_via' => 'Larios',
            'envio_numero' => '28',
            'envio_piso_puerta' => 'Bajo',
            'envio_codigo_postal' => '29005',
            'envio_municipio' => 'Málaga',
            'envio_provincia' => 'Málaga',
            'facturacion_tipo_via' => 'Calle',
            'facturacion_nombre_via' => 'Larios',
            'facturacion_numero' => '28',
            'facturacion_piso_puerta' => 'Bajo',
            'facturacion_codigo_postal' => '29005',
            'facturacion_municipio' => 'Málaga',
            'facturacion_provincia' => 'Málaga',
            'distancia' => '<5kms',
        ]);
    }
}
