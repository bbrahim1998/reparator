<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['direccion_envio', 'direccion_facturacion']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('envio_tipo_via')->nullable()->after('telefono');
            $table->string('envio_nombre_via')->nullable()->after('envio_tipo_via');
            $table->string('envio_numero')->nullable()->after('envio_nombre_via');
            $table->string('envio_piso_puerta')->nullable()->after('envio_numero');
            $table->string('envio_codigo_postal', 10)->nullable()->after('envio_piso_puerta');
            $table->string('envio_provincia')->nullable()->after('envio_codigo_postal');
            $table->string('envio_municipio')->nullable()->after('envio_provincia');
            $table->text('envio_info_adicional')->nullable()->after('envio_municipio');

            $table->string('facturacion_tipo_via')->nullable()->after('envio_info_adicional');
            $table->string('facturacion_nombre_via')->nullable()->after('facturacion_tipo_via');
            $table->string('facturacion_numero')->nullable()->after('facturacion_nombre_via');
            $table->string('facturacion_piso_puerta')->nullable()->after('facturacion_numero');
            $table->string('facturacion_codigo_postal', 10)->nullable()->after('facturacion_piso_puerta');
            $table->string('facturacion_provincia')->nullable()->after('facturacion_codigo_postal');
            $table->string('facturacion_municipio')->nullable()->after('facturacion_provincia');
            $table->text('facturacion_info_adicional')->nullable()->after('facturacion_municipio');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'envio_tipo_via', 'envio_nombre_via', 'envio_numero', 'envio_piso_puerta',
                'envio_codigo_postal', 'envio_provincia', 'envio_municipio', 'envio_info_adicional',
                'facturacion_tipo_via', 'facturacion_nombre_via', 'facturacion_numero', 'facturacion_piso_puerta',
                'facturacion_codigo_postal', 'facturacion_provincia', 'facturacion_municipio', 'facturacion_info_adicional',
            ]);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('direccion_envio')->nullable()->after('telefono');
            $table->string('direccion_facturacion')->nullable()->after('direccion_envio');
        });
    }
};
