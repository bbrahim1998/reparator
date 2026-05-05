@extends('layouts.master')

@section('title', 'Preguntas Frecuentes - FAQs')

@section('frameClass', 'faqs')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/faqs.css') }}">
@endsection

@section('content')
<div class="faq-container">
    <h1 class="page-title">FAQs</h1>

    <div class="faq-list">
        <div class="faq-item">
            <div class="faq-question">
                <span>¿Por qué tiramos lo que aún puede funcionar?</span>
                <span class="icon">+</span>
            </div>
            <div class="faq-answer">
                <p>Vivimos en una era donde una batidora deja de girar por un cable suelto y acaba en un vertedero. Donde un frigorífico con diez años de vida se desecha porque un muelle se ha cansado. Nos han enseñado que reparar sale más caro que comprar nuevo. En <strong>Reparator</strong> venghem a demostrar el contrari.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>¿Quiénes somos?</span>
                <span class="icon">+</span>
            </div>
            <div class="faq-answer">
                <p><strong class="highlight">Som l'alternativa al "usar i llençar".</strong></p>
                <p>No som una gran fàbrica ni un robot ensamblador. Som tècnics amb ulls, mans i criteri. Perquè cada aparell és un món: una té un cargol oxidat, un altre un sensor capriciós, un altre un simple cop de calor a la placa. Això no ho detecta una màquina en sèrie. Ho detecta algú que mira, escolta i sap soldar on cal soldat.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>¿Cómo funciona nuestro servicio?</span>
                <span class="icon">+</span>
            </div>
            <div class="faq-answer">
                <p><strong class="highlight">El nostre model: local primer, llunyà només quan té sentit.</strong></p>
                <p>Sabem que enviar una torradora de 20 € a 100 km no és rendible. Per això, el nostre cor bat en lo <strong>local</strong>: recollim i entreguem sense que el cost d'enviament mati el valor de l'apedaç. Però també atenem a qui viu lluny per reparar allò que sí mereix el viatge: un robot de cuina car, un amplificador vintage o aquest electrodomèstic difícil de substituir. Si l'enviament és superior al valor de l'aparell, t'ho direm amb honestitat. No volem que perdis diners, volem que recuperis confiança.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>¿Qué hace diferente a Reparator?</span>
                <span class="icon">+</span>
            </div>
            <div class="faq-answer">
                <p><strong class="highlight">Creant valor on les màquines no arriben.</strong></p>
                <p>Mentre les fàbriques s'automatitzen i el camp es robotitza, el vertader valor del futur està en els serveis que requereixen enginy humà. I això no significa obrir un altre bar. Significa apostem per oficis que les màquines no poden estandarditzar: diagnosticar, improvisar una solució, rescatar un motor que "ja no té arranjament". Això és <strong>Reparator</strong>.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>¿Cuál es vuestra promesa?</span>
                <span class="icon">+</span>
            </div>
            <div class="faq-answer">
                <p><strong class="highlight">La nostra promesa: "Mai res és massa obsolet".</strong></p>
                <p>Si respira, té arranjament. Si el teu aparell té història, nosaltres tenim un soldador i ganes d'escoltar-lo. Perquè el vell no és sinònim d'inservible. És sinònim de ben fet, de reparable, de digne d'una segona oportunitat.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>¿Qué significa Reparator?</span>
                <span class="icon">+</span>
            </div>
            <div class="faq-answer">
                <p><strong class="highlight">Reparator.</strong></p>
                <p class="italic-quote">Tecnologia amb ulls humans. Reparacions assequibles. I un sol dogma: mentre es pugui obrir, es pot tancar funcionant.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', () => {
        const faqItem = question.parentElement;
        faqItem.classList.toggle('active');
    });
});
</script>
@endsection