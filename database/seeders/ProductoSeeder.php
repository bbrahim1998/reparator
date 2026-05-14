<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            ['nombre' => 'Cambio de batería de teléfono', 'categoria' => 'Smartphones', 'descripcion' => 'Sustitución de baterías agotadas o dañadas para recuperar la autonomía del dispositivo.', 'imagen' => '/images/Products/bateria-telefono.png', 'solo_local' => false, 'solo_tienda' => true, 'stock' => 0, 'precio' => 29.90],
            ['nombre' => 'Cambio de puerto de carga', 'categoria' => 'Smartphones', 'descripcion' => 'Reparación o sustitución del conector de carga cuando el móvil no carga correctamente.', 'imagen' => '/images/Products/puerto-carga.png', 'solo_local' => false, 'solo_tienda' => true, 'stock' => 0, 'precio' => 34.90],
            ['nombre' => 'Cambio de pantalla de teléfono', 'categoria' => 'Smartphones', 'descripcion' => 'Sustitución de pantallas rotas, táctiles dañados o paneles sin imagen.', 'imagen' => '/images/Products/pantalla-telefono.png', 'solo_local' => false, 'solo_tienda' => true, 'stock' => 0, 'precio' => 59.90],
            ['nombre' => 'Reparación de cámara de teléfono', 'categoria' => 'Smartphones', 'descripcion' => 'Reparación de cámaras que fallan, no enfocan o muestran manchas.', 'imagen' => '/images/Products/camara-telefono.png', 'solo_local' => false, 'solo_tienda' => true, 'stock' => 0, 'precio' => 39.90],
            ['nombre' => 'Reparación de altavoz o micrófono', 'categoria' => 'Smartphones', 'descripcion' => 'Solución de problemas de sonido, micrófonos que no captan voz o altavoces distorsionados.', 'imagen' => '/images/Products/altavoz-microfono.png', 'solo_local' => false, 'solo_tienda' => true, 'stock' => 0, 'precio' => 29.90],
            ['nombre' => 'Cambio de batería de portátil', 'categoria' => 'Portátiles', 'descripcion' => 'Sustitución de baterías internas o externas para mejorar la autonomía del equipo.', 'imagen' => '/images/Products/bateria-portatil.png', 'solo_local' => false, 'solo_tienda' => true, 'stock' => 0, 'precio' => 49.90],
            ['nombre' => 'Cambio de pantalla de portátil', 'categoria' => 'Portátiles', 'descripcion' => 'Reparación o sustitución de pantallas rotas, con fugas de luz o sin imagen.', 'imagen' => '/images/Products/pantalla-portatil.png', 'solo_local' => false, 'solo_tienda' => true, 'stock' => 0, 'precio' => 89.90],
            ['nombre' => 'Limpieza interna y cambio de pasta térmica', 'categoria' => 'Portátiles', 'descripcion' => 'Mantenimiento interno para reducir temperatura y mejorar el rendimiento del portátil.', 'imagen' => '/images/Products/limpieza-portatil.png', 'solo_local' => false, 'solo_tienda' => true, 'stock' => 0, 'precio' => 39.90],
            ['nombre' => 'Sustitución de teclado', 'categoria' => 'Portátiles', 'descripcion' => 'Cambio de teclados dañados, con teclas que no funcionan o derrames.', 'imagen' => '/images/Products/teclado-portatil.png', 'solo_local' => false, 'solo_tienda' => true, 'stock' => 0, 'precio' => 49.90],
            ['nombre' => 'Reparación de bisagras', 'categoria' => 'Portátiles', 'descripcion' => 'Reparación de bisagras rotas o chasis dañados que impiden abrir o cerrar el portátil.', 'imagen' => '/images/Products/bisagras-portatil.png', 'solo_local' => false, 'solo_tienda' => true, 'stock' => 0, 'precio' => 44.90],
            ['nombre' => 'Reparación de batidora', 'categoria' => 'Procesado y mezcla', 'descripcion' => 'Reparación de motores, engranajes y sistemas de giro en batidoras domésticas.', 'imagen' => '/images/Products/batidora.png', 'solo_local' => false, 'solo_tienda' => true, 'stock' => 0, 'precio' => 24.90],
            ['nombre' => 'Revisión de microondas', 'categoria' => 'Cocina', 'descripcion' => 'Diagnóstico y reparación de fallos de calentamiento, plato giratorio o panel de control.', 'imagen' => '/images/Products/microondas.png', 'solo_local' => false, 'solo_tienda' => true, 'stock' => 0, 'precio' => 29.90],
            ['nombre' => 'Reparación de robot de cocina', 'categoria' => 'Procesado y mezcla', 'descripcion' => 'Reparación de motores, cuchillas, placas electrónicas y sistemas de mezcla.', 'imagen' => '/images/Products/robot-cocina.png', 'solo_local' => false, 'solo_tienda' => true, 'stock' => 0, 'precio' => 49.90],
            ['nombre' => 'Reparación de cafetera', 'categoria' => 'Cocina', 'descripcion' => 'Reparación de cafeteras de cápsulas, goteo y espresso con fallos de presión o calentamiento.', 'imagen' => '/images/Products/cafetera.png', 'solo_local' => false, 'solo_tienda' => true, 'stock' => 0, 'precio' => 29.90],
            ['nombre' => 'Revisión de lavadora', 'categoria' => 'Lavadoras', 'descripcion' => 'Diagnóstico de fallos de centrifugado, fugas, ruidos o problemas electrónicos.', 'imagen' => '/images/Products/lavadora.png', 'solo_local' => true, 'solo_tienda' => false, 'stock' => 0, 'precio' => 39.90],
            ['nombre' => 'Revisión de secadora', 'categoria' => 'Secadoras', 'descripcion' => 'Revisión de fallos de calentamiento, sensores o tambor.', 'imagen' => '/images/Products/secadora.png', 'solo_local' => true, 'solo_tienda' => false, 'stock' => 0, 'precio' => 39.90],
            ['nombre' => 'Revisión de nevera', 'categoria' => 'Neveras y congeladores', 'descripcion' => 'Diagnóstico de problemas de frío, compresor, termostato o fugas.', 'imagen' => '/images/Products/nevera.png', 'solo_local' => true, 'solo_tienda' => false, 'stock' => 0, 'precio' => 49.90],
            ['nombre' => 'Reparación de lavavajillas', 'categoria' => 'Lavavajillas', 'descripcion' => 'Reparación de bombas, filtros, calentadores y fallos electrónicos.', 'imagen' => '/images/Products/lavavajillas.png', 'solo_local' => true, 'solo_tienda' => false, 'stock' => 0, 'precio' => 44.90],
            ['nombre' => 'Cambio de HDMI en consolas', 'categoria' => 'Consolas', 'descripcion' => 'Sustitución del puerto HDMI dañado en consolas de videojuegos.', 'imagen' => '/images/Products/hdmi-consola.png', 'solo_local' => false, 'solo_tienda' => true, 'stock' => 0, 'precio' => 59.90],
            ['nombre' => 'Limpieza interna de consola', 'categoria' => 'Consolas', 'descripcion' => 'Limpieza profunda para evitar sobrecalentamiento y mejorar el rendimiento.', 'imagen' => '/images/Products/limpieza-consola.png', 'solo_local' => false, 'solo_tienda' => true, 'stock' => 0, 'precio' => 29.90],
        ];

        foreach ($productos as $data) {
            $categoria = Categoria::where('nombre', $data['categoria'])->first();

            if (!$categoria) {
                $this->command->warn("Categoría '{$data['categoria']}' no encontrada. Producto '{$data['nombre']}' saltado.");
                continue;
            }

            Producto::create([
                'nombre' => $data['nombre'],
                'descripcion' => $data['descripcion'],
                'imagen' => $data['imagen'],
                'categoria_id' => $categoria->id,
                'solo_local' => $data['solo_local'],
                'solo_tienda' => $data['solo_tienda'],
                'stock' => $data['stock'],
                'precio' => $data['precio'],
            ]);
        }
    }
}
