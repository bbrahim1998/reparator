@extends('layouts.master')

@section('title', 'Consultas y reclamaciones')

@section('frameClass', 'contacto')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/consultasyreclamaciones.css') }}">
@endsection

@section('content')
<div class="contact-box">
    <h1 class="page-title">Envianos tu consulta</h1>

    <form id="contactForm" class="form-grid">
        <div class="form-left">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" placeholder="Tus apellidos" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" id="correo" name="correo" placeholder="tu@email.com" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" placeholder="Tu número de teléfono">
            </div>
        </div>

        <div class="form-right">
            <div class="form-group">
                <label for="consulta">Consulta:</label>
                <textarea id="consulta" name="consulta" placeholder="Escribe aquí tu consulta o reclamación..." required></textarea>
            </div>
        </div>

        <div style="grid-column: 1/-1; display: flex; justify-content: center;">
            <button type="submit" class="submit-btn">Enviar consulta</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
const contactForm = document.getElementById('contactForm');

contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    const nombre = document.getElementById('nombre').value;
    const apellidos = document.getElementById('apellidos').value;
    const correo = document.getElementById('correo').value;
    const telefono = document.getElementById('telefono').value;
    const consulta = document.getElementById('consulta').value;
    
    if (!nombre || !apellidos || !correo || !consulta) {
        alert('⚠️ Por favor, completa todos los campos obligatorios.');
        return;
    }
    
    if (!correo.includes('@')) {
        alert('⚠️ Por favor, introduce un correo electrónico válido.');
        return;
    }
    
    alert(`✅ ¡Gracias ${nombre}!\n\nHemos recibido tu consulta. Nos pondremos en contacto contigo lo antes posible.\n\n📧 Respuesta enviada a: ${correo}\n📞 Teléfono: ${telefono || 'No proporcionado'}`);
    
    contactForm.reset();
});
</script>
@endsection