<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('apellidos')->nullable()->after('name');
            $table->date('fecha_nacimiento')->nullable()->after('apellidos');
            $table->string('telefono')->nullable()->after('fecha_nacimiento');
            $table->string('direccion_envio')->nullable()->after('telefono');
            $table->string('direccion_facturacion')->nullable()->after('direccion_envio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'apellidos',
                'fecha_nacimiento',
                'telefono',
                'direccion_envio',
                'direccion_facturacion',
            ]);
        });
    }
};
