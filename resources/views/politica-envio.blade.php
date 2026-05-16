@extends('layouts.master')

@section('title', 'Política de Envío')

@section('content')
<div class="max-w-4xl mx-auto text-left">
    <h1 class="font-titulos text-2xl sm:text-3xl font-black text-[var(--color-acento)] mb-8">POLÍTICA DE ENVÍO</h1>

    <div class="space-y-6 font-parrafos text-sm leading-relaxed text-[var(--color-texto)]">
        <p>En REPARATOR ofrecemos un servicio de reparación y recogida a domicilio en las zonas indicadas durante el proceso de compra. A continuación, detallamos las condiciones de envío y recogida.</p>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">1. Zonas de cobertura</h2>
        <p>Realizamos recogidas y entregas en todo el territorio nacional, con distintas tarifas según la distancia:</p>
        <ul class="list-disc pl-6 space-y-1">
            <li><strong>&lt; 5 km:</strong> Servicio exprés sin coste adicional.</li>
            <li><strong>&lt; 30 km:</strong> Recogida y entrega en 24-48 horas.</li>
            <li><strong>&lt; 100 km:</strong> Servicio estándar con entrega en 2-4 días.</li>
            <li><strong>&lt; 200 km:</strong> Servicio ampliado con entrega en 3-6 días.</li>
        </ul>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">2. Proceso de recogida</h2>
        <p>Una vez realizado el pedido, nuestro equipo se pondrá en contacto contigo para coordinar la recogida del dispositivo. El técnico evaluará el equipo en el momento de la recogida para confirmar el presupuesto.</p>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">3. Plazos de reparación</h2>
        <p>El tiempo estimado de reparación depende de la complejidad del servicio contratado:</p>
        <ul class="list-disc pl-6 space-y-1">
            <li>Reparaciones simples (batería, puerto de carga): 24-48 horas.</li>
            <li>Reparaciones intermedias (pantalla, cámara): 2-4 días.</li>
            <li>Reparaciones complejas (electrodomésticos, consolas): 4-7 días.</li>
        </ul>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">4. Entrega</h2>
        <p>Una vez finalizada la reparación, entregamos el dispositivo en la misma dirección de recogida. Recibirás una notificación por correo electrónico cuando el equipo esté listo.</p>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">5. Costes</h2>
        <p>El coste del servicio de recogida y entrega está incluido en el presupuesto final. No aplicamos cargos ocultos ni tasas adicionales.</p>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">6. Incidencias</h2>
        <p>Si surge cualquier incidencia con la recogida o entrega, nuestro equipo de atención al cliente te informará en menos de 24 horas y buscaremos la mejor solución posible.</p>

        <p class="text-white/50 text-xs mt-8">Última actualización: mayo de 2026</p>
    </div>
</div>
@endsection
