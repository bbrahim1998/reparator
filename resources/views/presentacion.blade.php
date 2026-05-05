@extends('layouts.master')

@section('title', 'Presentación - Quiénes somos')

@section('content')
<h1 class="mb-10 text-center font-titulos text-[28px] font-semibold text-[var(--color-acento)] sm:text-[32px]">
    Presentacion - "Nunca nada es demasiado viejo"
</h1>

<div class="rounded-[58px] border border-[var(--color-primario)] bg-[var(--color-primario)]/15 p-10 transition-all duration-300 hover:border-[var(--color-acento)] hover:bg-[var(--color-primario)]/25 hover:shadow-[0_10px_30px_rgba(0,0,0,0.2)] sm:rounded-[30px] sm:p-6">
    <div class="font-parrafos text-sm leading-relaxed text-[var(--color-texto)] text-justify [&>p]:mb-5 [&>p:last-child]:mb-0">
        <p>
            <strong class="mb-4 mt-6 block font-titulos text-lg font-semibold text-[var(--color-acento)]">¿Por qué tiramos lo que aún puede funcionar?</strong>
            Vivimos en una era donde una batidora deja de girar por un cable suelto y acaba en un vertedero. Donde un frigorífico con diez años de vida se desecha porque un muelle se ha cansado. Nos han enseñado que reparar sale más caro que comprar nuevo. En <strong>Reparator</strong> venimos a demostrar lo contrario.
        </p>

        <p>&nbsp;</p>

        <p>
            <strong class="mb-4 mt-6 block font-titulos text-lg font-semibold text-[var(--color-acento)]">Somos la alternativa al "usar y tirar".</strong>
            No somos una gran fábrica ni un robot ensamblador. Somos técnicos con ojos, manos y criterio. Porque cada lavadora es un mundo: una tiene un tornillo oxidado, otra un sensor caprichoso, otra un simple golpe de calor en la placa. Eso no lo detecta una máquina en serie. Lo detecta alguien que mira, escucha y sabe soldar donde hay que soldar.
        </p>

        <p>&nbsp;</p>

        <p>
            <strong class="mb-4 mt-6 block font-titulos text-lg font-semibold text-[var(--color-acento)]">Nuestro modelo: local primero, lejano solo cuando tiene sentido.</strong>
            Sabemos que enviar una tostadora de 20 € a 100 km no es rentable. Por eso, nuestro corazón late en lo <strong>local</strong>: recogemos y entregamos sin que el coste de envío mate el valor del apaño. Pero también atendemos a quien vive lejos para reparar aquello que sí merece el viaje: un robot de cocina caro, un amplificador vintage o ese electrodoméstico difícil de sustituir. Si el envío es superior al valor del aparato, te lo diremos con honestidad. No queremos que pierdas dinero, queremos que recuperes confianza.
        </p>

        <p>&nbsp;</p>

        <p>
            <strong class="mb-4 mt-6 block font-titulos text-lg font-semibold text-[var(--color-acento)]">Creando valor donde las máquinas no llegan.</strong>
            Mientras las fábricas se automatizan y el campo se robotiza, el verdadero valor del futuro está en los servicios que requieren ingenio humano. Y eso no significa abrir otro bar. Significa apostar por oficios que las máquinas no pueden estandarizar: diagnosticar, improvisar una solución, rescatar un motor que "ya no tiene arreglo". Eso es <strong>Reparator</strong>.
        </p>

        <p>&nbsp;</p>

        <p>
            <strong class="mb-4 mt-6 block font-titulos text-lg font-semibold text-[var(--color-acento)]">Nuestra promesa: "Nunca nada es demasiado viejo".</strong>
            Si respiras, tienes arreglo. Si tu aparato tiene historia, nosotros tenemos un soldador y ganas de escucharlo. Porque lo viejo no es sinónimo de inservible. Es sinónimo de bien hecho, de reparable, de digno de una segunda oportunidad.
        </p>

        <p>&nbsp;</p>

        <p>
            <strong class="mb-3 mt-5 block font-titulos text-lg font-semibold text-[var(--color-acento)]">Reparator.</strong>
            <span class="italic text-sm text-[var(--color-acento)]">Tecnología con ojos humanos. Reparaciones asequibles. Y un solo dogma: mientras se pueda abrir, se puede cerrar funcionando.</span>
        </p>
    </div>
</div>
@endsection
