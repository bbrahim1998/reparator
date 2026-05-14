<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Gran electrodoméstico', 'descripcion' => 'Reparación y mantenimiento de grandes electrodomésticos como lavadoras, secadoras, neveras y lavavajillas.', 'categoria_padre_id' => 0, 'imagen' => '/images/category/gran-electrodomestico.png', 'solo_local' => true, 'solo_tienda' => false],
            ['nombre' => 'Lavadoras', 'descripcion' => 'Servicios de revisión, diagnóstico y reparación de lavadoras domésticas.', 'categoria_padre_id' => 0, 'imagen' => '/images/category/lavadoras.png', 'solo_local' => true, 'solo_tienda' => false],
            ['nombre' => 'Secadoras', 'descripcion' => 'Reparación y mantenimiento de secadoras de condensación, evacuación y bomba de calor.', 'categoria_padre_id' => 0, 'imagen' => '/images/category/secadoras.png', 'solo_local' => true, 'solo_tienda' => false],
            ['nombre' => 'Neveras y congeladores', 'descripcion' => 'Revisión y reparación de sistemas de refrigeración domésticos.', 'categoria_padre_id' => 0, 'imagen' => '/images/category/neveras.png', 'solo_local' => true, 'solo_tienda' => false],
            ['nombre' => 'Lavavajillas', 'descripcion' => 'Diagnóstico y reparación de lavavajillas de todas las marcas.', 'categoria_padre_id' => 0, 'imagen' => '/images/category/lavavajillas.png', 'solo_local' => true, 'solo_tienda' => false],
            ['nombre' => 'Pequeño electrodoméstico', 'descripcion' => 'Reparación de aparatos pequeños que pueden enviarse o traerse a tienda.', 'categoria_padre_id' => 0, 'imagen' => '/images/category/pequeno-electrodomestico.png', 'solo_local' => false, 'solo_tienda' => true],
            ['nombre' => 'Cocina', 'descripcion' => 'Reparación de microondas, cafeteras, tostadoras y otros aparatos de cocina.', 'categoria_padre_id' => 0, 'imagen' => '/images/category/cocina.png', 'solo_local' => false, 'solo_tienda' => true],
            ['nombre' => 'Procesado y mezcla', 'descripcion' => 'Reparación de batidoras, robots de cocina, picadoras y aparatos de mezcla.', 'categoria_padre_id' => 0, 'imagen' => '/images/category/procesado-mezcla.png', 'solo_local' => false, 'solo_tienda' => true],
            ['nombre' => 'Aspiración y limpieza', 'descripcion' => 'Reparación de aspiradoras, robots aspiradores y equipos de limpieza.', 'categoria_padre_id' => 0, 'imagen' => '/images/category/aspiracion-limpieza.png', 'solo_local' => false, 'solo_tienda' => true],
            ['nombre' => 'Smartphones', 'descripcion' => 'Servicios de reparación de móviles, cambio de componentes y mantenimiento.', 'categoria_padre_id' => 0, 'imagen' => '/images/category/smartphones.png', 'solo_local' => false, 'solo_tienda' => true],
            ['nombre' => 'Portátiles', 'descripcion' => 'Reparación de ordenadores portátiles, limpieza interna y sustitución de piezas.', 'categoria_padre_id' => 0, 'imagen' => '/images/category/portatiles.png', 'solo_local' => false, 'solo_tienda' => true],
            ['nombre' => 'Consolas', 'descripcion' => 'Reparación de consolas de videojuegos, puertos HDMI y mantenimiento interno.', 'categoria_padre_id' => 0, 'imagen' => '/images/category/consolas.png', 'solo_local' => false, 'solo_tienda' => true],
        ];

        foreach ($categorias as $data) {
            Categoria::create($data);
        }

        $this->setParentRelations();
    }

    private function setParentRelations(): void
    {
        $map = [
            'Lavadoras' => 'Gran electrodoméstico',
            'Secadoras' => 'Gran electrodoméstico',
            'Neveras y congeladores' => 'Gran electrodoméstico',
            'Lavavajillas' => 'Gran electrodoméstico',
            'Cocina' => 'Pequeño electrodoméstico',
            'Procesado y mezcla' => 'Pequeño electrodoméstico',
            'Aspiración y limpieza' => 'Pequeño electrodoméstico',
        ];

        foreach ($map as $hijo => $padre) {
            $padreModel = Categoria::where('nombre', $padre)->first();
            $hijoModel = Categoria::where('nombre', $hijo)->first();

            if ($padreModel && $hijoModel) {
                $hijoModel->update(['categoria_padre_id' => $padreModel->id]);
            }
        }
    }
}
