@php $currentPage = 'admin'; @endphp
@extends('layouts.master')

@section('title', 'Acceso Administradores')

@section('styles')
<style>
    .login-card {
        background: var(--color-secundario);
        border: 1px solid rgba(241, 255, 94, 0.2);
        border-radius: 16px;
        padding: 40px 32px;
        max-width: 440px;
        margin: 0 auto;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.2);
    }
    .login-card h2 {
        font-family: 'sourcesanspro', 'Roboto', sans-serif;
        font-weight: 900;
        font-size: 24px;
        color: var(--color-acento);
        text-align: center;
        margin-bottom: 8px;
    }
    .login-card .subtitle {
        font-family: 'Roboto', sans-serif;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.5);
        text-align: center;
        margin-bottom: 32px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        font-family: 'sourcesanspro', 'Roboto', sans-serif;
        font-weight: 700;
        font-size: 13px;
        color: var(--color-acento);
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .form-control {
        width: 100%;
        padding: 12px 16px;
        background: var(--color-fondo);
        border: 1px solid rgba(241, 255, 94, 0.2);
        border-radius: 10px;
        color: var(--color-texto);
        font-family: 'Roboto', sans-serif;
        font-size: 15px;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }
    .form-control:focus {
        outline: none;
        border-color: var(--color-acento);
        box-shadow: 0 0 0 3px rgba(241, 255, 94, 0.15);
    }
    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.3);
    }
    .form-error {
        color: #ef4444;
        font-family: 'Roboto', sans-serif;
        font-size: 13px;
        margin-top: 4px;
    }
    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 24px;
    }
    .checkbox-group input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: var(--color-acento);
        cursor: pointer;
    }
    .checkbox-group label {
        font-family: 'Roboto', sans-serif;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.7);
        cursor: pointer;
    }
    .btn-submit {
        width: 100%;
        padding: 14px;
        background: var(--color-acento);
        color: var(--color-fondo);
        border: none;
        border-radius: 10px;
        font-family: 'sourcesanspro', 'Roboto', sans-serif;
        font-weight: 900;
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .btn-submit:hover {
        box-shadow: 0 0 20px rgba(241, 255, 94, 0.5);
        transform: translateY(-1px);
    }
    .alert {
        padding: 12px 16px;
        border-radius: 10px;
        font-family: 'Roboto', sans-serif;
        font-size: 14px;
        margin-bottom: 20px;
        text-align: center;
    }
    .alert-success {
        background: rgba(34, 197, 94, 0.15);
        color: #22c55e;
        border: 1px solid rgba(34, 197, 94, 0.3);
    }
</style>
@endsection

@section('content')
    <div class="min-h-[60vh] flex items-center justify-center">
        <div class="login-card">
            <h2>ACCESO ADMIN</h2>
            <p class="subtitle">Solo para administradores</p>

            <x-auth-session-status class="alert alert-success" :status="session('status')" />

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="correo@ejemplo.com" required autofocus>
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="••••••••" required>
                    @error('password')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="checkbox-group">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Recordarme</label>
                </div>

                <button type="submit" class="btn-submit">Entrar</button>
            </form>
        </div>
    </div>
@endsection
