<!-- Footer -->
<footer class="border-t-[7px] border-[var(--color-acento)] {{ ($frameClass ?? 'default') === 'home' ? 'bg-[var(--color-fondo)]' : 'bg-[var(--color-secundario)]' }} px-5 sm:px-[5%] py-10 mt-[60px]">
    <div class="mx-auto grid max-w-6xl grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
        <div>
            <h4 class="font-titulos mb-5 text-[clamp(14px,1.5vw,16px)] font-bold text-[var(--color-acento)]">Informació Legal</h4>
            <a href="{{ route('aviso-legal') }}" class="mb-3 block font-parrafos text-[clamp(14px,1.5vw,17px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-1.5">Aviso Legal</a>
            <a href="{{ route('politica-cookies') }}" class="mb-3 block font-parrafos text-[clamp(14px,1.5vw,17px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-1.5">Política de cookies</a>
            <a href="{{ route('politica-envio') }}" class="mb-3 block font-parrafos text-[clamp(14px,1.5vw,17px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-1.5">Condicions d'enviament</a>
        </div>
        <div>
            <h4 class="font-titulos mb-5 text-[clamp(14px,1.5vw,16px)] font-bold text-[var(--color-acento)]">Atenció al client</h4>
            <a href="#" class="mb-3 block font-parrafos text-[clamp(14px,1.5vw,17px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-1.5">Atenció al client</a>
            <a href="#" class="mb-3 block font-parrafos text-[clamp(14px,1.5vw,17px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-1.5">Contacte</a>
            <a href="#" class="mb-3 block font-parrafos text-[clamp(14px,1.5vw,17px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-1.5">FAQs</a>
            <a href="#" class="mb-3 block font-parrafos text-[clamp(14px,1.5vw,17px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-1.5">Condicions d'enviament</a>
        </div>
        <div>
            <h4 class="font-titulos mb-5 text-[clamp(14px,1.5vw,16px)] font-bold text-[var(--color-acento)]">Formes de pagament</h4>
            <a href="#" class="mb-3 block font-parrafos text-[clamp(14px,1.5vw,17px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-1.5">Formes de pagament</a>
            <a href="#" class="mb-3 block font-parrafos text-[clamp(14px,1.5vw,17px)] text-[var(--color-texto)] transition-all duration-300 hover:text-[var(--color-acento)] hover:pl-1.5">Confidencialitat</a>
        </div>
    </div>
    <div class="mt-10 border-t border-[var(--color-acento)]/30 pt-5 text-center font-parrafos text-[11px] italic text-white/60">
        © 2024 REPARATOR · Tots els drets reservats
    </div>
</footer>
