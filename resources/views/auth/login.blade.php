<div id="loginModal" class="fixed inset-0 z-[300] hidden items-center justify-center">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" id="loginOverlay"></div>

    <!-- Modal -->
    <div class="relative w-full max-w-md mx-4 bg-[var(--color-secundario)] rounded-2xl shadow-[0_0_30px_rgba(241,255,94,0.3)] border border-[var(--color-acento)]/30 overflow-hidden">
        <!-- Header con botón X -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-[var(--color-acento)]/30">
            <h2 class="font-titulos text-xl font-bold text-[var(--color-acento)]">INICIAR SESIÓN</h2>
            <button type="button" id="closeLoginModal" class="flex size-10 items-center justify-center rounded-full bg-white/5 transition-all duration-300 hover:bg-[var(--color-acento)]/20 hover:scale-110">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="text-[var(--color-acento)]">
                    <path d="M18 6L6 18M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Formulario -->
        <div class="px-6 py-6">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="emaillogin" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Email</label>
                    <input id="emaillogin" type="email" name="emaillogin" value="{{ old('emaillogin') }}" required autofocus
                           class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-[var(--color-acento)]/30 rounded-lg text-[var(--color-texto)] placeholder-white/40 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/20 focus:outline-none transition-all font-parrafos">
                    @error('email')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="passwordlogin" class="font-titulos block text-sm font-semibold text-[var(--color-texto)] mb-2">Contraseña</label>
                    <input id="passwordlogin" type="password" name="passwordlogin" required
                           class="w-full px-4 py-3 bg-[var(--color-fondo)] border border-[var(--color-acento)]/30 rounded-lg text-[var(--color-texto)] placeholder-white/40 focus:border-[var(--color-acento)] focus:ring-2 focus:ring-[var(--color-acento)]/20 focus:outline-none transition-all font-parrafos">
                    @error('password')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="mb-6">
                    <label for="remember_me" class="flex items-center gap-3 cursor-pointer">
                        <input id="remember_me" type="checkbox" class="w-5 h-5 rounded border-[var(--color-acento)]/30 bg-[var(--color-fondo)] text-[var(--color-acento)] focus:ring-[var(--color-acento)]/20 cursor-pointer" name="remember">
                        <span class="font-parrafos text-sm text-[var(--color-texto)]">Recordarme</span>
                    </label>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-[var(--color-acento)]/30">
                    <a href="#" id="showRegisterFromLogin" class="font-parrafos text-sm text-[var(--color-texto)] hover:text-[var(--color-acento)] transition-colors underline underline-offset-2">
                        ¿No tienes cuenta?
                    </a>

                    <button type="submit" class="font-titulos px-6 py-3 bg-[var(--color-acento)] text-[var(--color-fondo)] font-bold rounded-lg hover:bg-[var(--color-acento)]/90 hover:shadow-[0_0_15px_rgba(241,255,94,0.5)] transition-all duration-300">
                        ENTRAR
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
