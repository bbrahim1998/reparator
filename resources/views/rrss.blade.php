@extends('layouts.master')

@section('title', 'Redes Sociales')

@section('frameClass', 'rrss')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/rrss.css') }}">
@endsection

@section('content')
<div class="rrss-box">
    <h1 class="page-title">Nuestras RRSS</h1>

    <div class="social-grid">
        <div class="social-card" data-social="facebook">
            <div class="social-icon facebook">
                <svg viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5.02 3.66 9.18 8.44 9.94v-7.03H7.9v-2.91h2.54V9.67c0-2.48 1.49-3.85 3.77-3.85 1.09 0 2.23.2 2.23.2v2.43h-1.26c-1.24 0-1.63.76-1.63 1.54v1.85h2.77l-.44 2.91h-2.33v7.03c4.78-.76 8.44-4.92 8.44-9.94z"/>
                </svg>
            </div>
            <div class="social-name">reparator_fb</div>
        </div>

        <div class="social-card" data-social="instagram">
            <div class="social-icon instagram">
                <svg viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2.16c3.2 0 3.58.01 4.85.07 1.17.05 1.8.25 2.22.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.05.41 2.22.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.05 1.17-.25 1.8-.41 2.22-.22.56-.48.96-.9 1.38-.42.42-.82.68-1.38.9-.42.16-1.05.36-2.22.41-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-1.17-.05-1.8-.25-2.22-.41-.56-.22-.96-.48-1.38-.9-.42-.42-.68-.82-.9-1.38-.16-.42-.36-1.05-.41-2.22-.06-1.27-.07-1.65-.07-4.85s.01-3.58.07-4.85c.05-1.17.25-1.8.41-2.22.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.05-.36 2.22-.41 1.27-.06 1.65-.07 4.85-.07M12 0C8.74 0 8.33.01 7.05.07c-1.28.06-2.16.26-2.93.56-.8.31-1.48.73-2.16 1.41-.68.68-1.1 1.36-1.41 2.16-.3.77-.5 1.65-.56 2.93C.01 8.33 0 8.74 0 12s.01 3.67.07 4.95c.06 1.28.26 2.16.56 2.93.31.8.73 1.48 1.41 2.16.68.68 1.36 1.1 2.16 1.41.77.3 1.65.5 2.93.56 1.28.06 1.69.07 4.95.07s3.67-.01 4.95-.07c1.28-.06 2.16-.26 2.93-.56.8-.31 1.48-.73 2.16-1.41.68-.68 1.1-1.36 1.41-2.16.3-.77.5-1.65.56-2.93.06-1.28.07-1.69.07-4.95s-.01-3.67-.07-4.95c-.06-1.28-.26-2.16-.56-2.93-.31-.8-.73-1.48-1.41-2.16-.68-.68-1.36-1.1-2.16-1.41-.77-.3-1.65-.5-2.93-.56C15.67.01 15.26 0 12 0z"/>
                    <path d="M12 5.84c-3.4 0-6.16 2.76-6.16 6.16s2.76 6.16 6.16 6.16 6.16-2.76 6.16-6.16S15.4 5.84 12 5.84zm0 10.16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z"/>
                    <circle cx="18.41" cy="5.59" r="1.44"/>
                </svg>
            </div>
            <div class="social-name">reparator_es</div>
        </div>

        <div class="social-card" data-social="twitter">
            <div class="social-icon twitter">
                <svg viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                </svg>
            </div>
            <div class="social-name">reparator_fb</div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
const socialLinks = {
    facebook: 'https://facebook.com/reparator',
    instagram: 'https://instagram.com/reparator_es',
    twitter: 'https://x.com/reparator'
};

document.querySelectorAll('.social-card').forEach(card => {
    const social = card.getAttribute('data-social');
    card.addEventListener('click', () => {
        if (socialLinks[social]) {
            window.open(socialLinks[social], '_blank');
        } else {
            alert(`📱 Síguenos en ${social.toUpperCase()} para conocer todas nuestras novedades y promociones.`);
        }
    });
});
</script>
@endsection