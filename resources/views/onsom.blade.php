@extends('layouts.master')

@section('title', 'Dónde estamos - Ubicación')

@section('frameClass', 'onsom')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/onsom.css') }}">
@endsection

@section('content')
<div class="location-box">
    <h1 class="page-title">On som</h1>

    <div class="map-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1x2992.573279512613!2d2.173686!3d41.385064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a2e8c8b8b8b8%3A0x0!2sBarcelona!5e0!3m2!1ses!2ses!4v1700000000000!5m2!1ses!2ses" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <div class="contact-info">
        <div class="info-card">
            <div class="info-icon">📍</div>
            <h3>Dirección</h3>
            <p>Carrer de la Reparació, 42<br>08001 Barcelona</p>
        </div>
        <div class="info-card">
            <div class="info-icon">📞</div>
            <h3>Teléfono</h3>
            <p><a href="tel:+34931234567">+34 931 234 567</a></p>
        </div>
        <div class="info-card">
            <div class="info-icon">✉️</div>
            <h3>Email</h3>
            <p><a href="mailto:info@reparator.com">info@reparator.com</a></p>
        </div>
    </div>
</div>
@endsection