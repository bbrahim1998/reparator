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
            src="https://maps.google.com/maps?q=Carrer+de+Sant+Jordi,+Vilanova+i+la+Geltru&z=15&output=embed" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <div class="contact-info">
        <div class="info-card">
            <div class="info-icon">📍</div>
            <h3>Dirección</h3>
            <p>Carrer de Sant Jordi<br>Vilanova i la Geltrú</p>
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