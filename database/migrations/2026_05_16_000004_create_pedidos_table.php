<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('apellidos');
            $table->string('email');
            $table->string('telefono')->nullable();
            $table->string('envio_tipo_via');
            $table->string('envio_nombre_via');
            $table->string('envio_numero');
            $table->string('envio_piso_puerta')->nullable();
            $table->string('envio_codigo_postal');
            $table->string('envio_municipio');
            $table->string('envio_provincia');
            $table->text('envio_info_adicional')->nullable();
            $table->string('facturacion_tipo_via')->nullable();
            $table->string('facturacion_nombre_via')->nullable();
            $table->string('facturacion_numero')->nullable();
            $table->string('facturacion_piso_puerta')->nullable();
            $table->string('facturacion_codigo_postal')->nullable();
            $table->string('facturacion_municipio')->nullable();
            $table->string('facturacion_provincia')->nullable();
            $table->text('facturacion_info_adicional')->nullable();
            $table->string('distancia')->nullable();
            $table->enum('has_to_comment', ['comentado', 'no quiere comentar', 'en otro momento'])->default('no quiere comentar');
            $table->decimal('total', 10, 2);
            $table->string('ultimos_cuatro')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
