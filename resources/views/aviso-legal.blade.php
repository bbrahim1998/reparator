@extends('layouts.master')

@section('title', 'Aviso Legal')

@section('content')
<div class="max-w-4xl mx-auto text-left">
    <h1 class="font-titulos text-2xl sm:text-3xl font-black text-[var(--color-acento)] mb-8">AVISO LEGAL</h1>

    <div class="space-y-6 font-parrafos text-sm leading-relaxed text-[var(--color-texto)]">
        <p>En cumplimiento con la Ley de Servicios de la Sociedad de la Información y de Comercio Electrónico (LSSICE), se facilitan los siguientes datos informativos:</p>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">1. Identificación del responsable</h2>
        <ul class="list-disc pl-6 space-y-1">
            <li><strong>Razón social:</strong> REPARATOR S.L.</li>
            <li><strong>NIF:</strong> B-12345678</li>
            <li><strong>Domicilio:</strong> Calle de la Reparación, 42, 28001 Madrid</li>
            <li><strong>Email:</strong> legal@reparator.com</li>
            <li><strong>Teléfono:</strong> +34 900 123 456</li>
            <li><strong>Datos registrales:</strong> Registro Mercantil de Madrid, Tomo 42.345, Folio 12, Sección 8, Hoja M-789012</li>
        </ul>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">2. Objeto</h2>
        <p>El presente aviso legal regula el uso del sitio web <strong>reparator.com</strong>, cuyo objeto es la oferta de servicios de reparación de dispositivos electrónicos, informáticos y electrodomésticos, así como la venta de accesorios y servicios relacionados.</p>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">3. Condiciones de uso</h2>
        <p>El usuario se compromete a hacer un uso adecuado del sitio web y de los servicios ofrecidos, no empleándolos para actividades ilícitas o contrarias a la buena fe. REPARATOR no se responsabiliza del mal uso que el usuario pueda hacer del sitio.</p>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">4. Propiedad intelectual</h2>
        <p>Todos los contenidos del sitio web (textos, imágenes, logotipos, diseño) son propiedad de REPARATOR S.L. o de sus legítimos titulares, y están protegidos por las leyes de propiedad intelectual. Queda prohibida su reproducción, distribución o modificación sin autorización expresa.</p>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">5. Protección de datos</h2>
        <p>Los datos personales facilitados a través de los formularios del sitio web serán tratados conforme al Reglamento General de Protección de Datos (RGPD). Puedes ejercer tus derechos de acceso, rectificación, supresión, limitación, portabilidad y oposición escribiendo a <span class="text-[var(--color-acento)]">legal@reparator.com</span>.</p>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">6. Exención de responsabilidad</h2>
        <p>REPARATOR no se hace responsable de los daños o perjuicios derivados del uso del sitio web, ni de la presencia de virus o software malicioso que pudieran afectar al equipo del usuario. El usuario accede al sitio bajo su propia responsabilidad.</p>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">7. Legislación aplicable</h2>
        <p>Las presentes condiciones se rigen por la legislación española. Cualquier controversia se someterá a los juzgados y tribunales de la ciudad de Madrid, con renuncia expresa a cualquier otro fuero.</p>

        <p class="text-white/50 text-xs mt-8">Última actualización: mayo de 2026</p>
    </div>
</div>
@endsection
