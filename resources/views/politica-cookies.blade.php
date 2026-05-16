@extends('layouts.master')

@section('title', 'Política de Cookies')

@section('content')
<div class="max-w-4xl mx-auto text-left">
    <h1 class="font-titulos text-2xl sm:text-3xl font-black text-[var(--color-acento)] mb-8">POLÍTICA DE COOKIES</h1>

    <div class="space-y-6 font-parrafos text-sm leading-relaxed text-[var(--color-texto)]">
        <p>En REPARATOR utilizamos cookies propias y de terceros para mejorar tu experiencia de navegación, analizar el tráfico de la web y mostrarte contenido relevante.</p>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">1. ¿Qué son las cookies?</h2>
        <p>Las cookies son pequeños archivos de texto que se almacenan en tu navegador cuando visitas un sitio web. Permiten que el sitio recuerde tus preferencias y hábitos de navegación.</p>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">2. Tipos de cookies que utilizamos</h2>
        <ul class="list-disc pl-6 space-y-2">
            <li><strong>Cookies técnicas (necesarias):</strong> Permiten la navegación básica y el funcionamiento de áreas como el carrito de compra o el inicio de sesión. No requieren tu consentimiento.</li>
            <li><strong>Cookies de personalización:</strong> Recuerdan tus preferencias (idioma, moneda) para ofrecerte una experiencia adaptada.</li>
            <li><strong>Cookies de análisis:</strong> Recogen información anónima sobre cómo usas la web (páginas visitadas, tiempo de navegación) para ayudarnos a mejorarla.</li>
            <li><strong>Cookies de terceros:</strong> Provenientes de servicios externos como Google Analytics o redes sociales, que nos ayudan a medir audiencia y difundir contenido.</li>
        </ul>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">3. Gestión de cookies</h2>
        <p>Puedes configurar, bloquear o eliminar las cookies en cualquier momento desde la configuración de tu navegador:</p>
        <ul class="list-disc pl-6 space-y-1">
            <li>Google Chrome: Ajustes → Privacidad y seguridad → Cookies y otros datos de sitios</li>
            <li>Mozilla Firefox: Opciones → Privacidad y seguridad → Cookies y datos del sitio</li>
            <li>Safari: Preferencias → Privacidad → Cookies</li>
            <li>Microsoft Edge: Configuración → Cookies y permisos del sitio</li>
        </ul>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">4. Duración</h2>
        <p>Las cookies pueden ser de sesión (se eliminan al cerrar el navegador) o persistentes (permanecen hasta su fecha de expiración). En REPARATOR utilizamos ambos tipos según la finalidad.</p>

        <h2 class="font-titulos text-lg font-bold text-[var(--color-acento)]">5. Contacto</h2>
        <p>Si tienes dudas sobre nuestra política de cookies, escríbenos a <span class="text-[var(--color-acento)]">legal@reparator.com</span>.</p>

        <p class="text-white/50 text-xs mt-8">Última actualización: mayo de 2026</p>
    </div>
</div>
@endsection
