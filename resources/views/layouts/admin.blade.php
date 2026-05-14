<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>REPARATOR | @yield('title', 'Admin')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        /* === BASE ADMIN STYLES === */
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
        }
        .admin-table thead tr {
            background: var(--color-acento);
            color: var(--color-fondo);
            text-transform: uppercase;
            font-family: 'sourcesanspro', 'Roboto', sans-serif;
            font-weight: 900;
        }
        .admin-table th {
            padding: 14px 16px;
            text-align: left;
            letter-spacing: 0.5px;
        }
        .admin-table td {
            padding: 12px 16px;
            border-bottom: 1px solid rgba(241, 255, 94, 0.15);
            color: var(--color-texto);
            vertical-align: middle;
        }
        .admin-table tbody tr {
            transition: background 0.2s ease;
        }
        .admin-table tbody tr:hover {
            background: rgba(241, 255, 94, 0.08);
        }
        .admin-table .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            font-family: 'sourcesanspro', 'Roboto', sans-serif;
        }
        .badge-yes { background: rgba(241, 255, 94, 0.2); color: var(--color-acento); }
        .badge-no { background: rgba(255, 255, 255, 0.1); color: rgba(255, 255, 255, 0.5); }
        .badge-stock { background: rgba(34, 197, 94, 0.15); color: #22c55e; }
        .badge-stock-low { background: rgba(239, 68, 68, 0.15); color: #ef4444; }
        .badge-admin {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            font-family: 'sourcesanspro', 'Roboto', sans-serif;
            background: rgba(241, 255, 94, 0.2);
            color: var(--color-acento);
        }
        .precio {
            font-family: 'sourcesanspro', 'Roboto', sans-serif;
            font-weight: 700;
            color: var(--color-acento);
        }
        .btn-admin {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 8px;
            font-family: 'sourcesanspro', 'Roboto', sans-serif;
            font-weight: 700;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            text-decoration: none;
        }
        .btn-admin-primary { background: var(--color-acento); color: var(--color-fondo); }
        .btn-admin-primary:hover { box-shadow: 0 0 15px rgba(241, 255, 94, 0.5); transform: translateY(-1px); }
        .btn-admin-warning { background: rgba(241, 255, 94, 0.15); color: var(--color-acento); }
        .btn-admin-warning:hover { background: rgba(241, 255, 94, 0.25); }
        .btn-admin-danger { background: rgba(239, 68, 68, 0.15); color: #ef4444; }
        .btn-admin-danger:hover { background: rgba(239, 68, 68, 0.25); }
        .btn-admin-secondary { background: rgba(255, 255, 255, 0.1); color: var(--color-texto); }
        .btn-admin-secondary:hover { background: rgba(255, 255, 255, 0.15); }
        .pagination {
            display: flex;
            justify-content: center;
            gap: 6px;
            margin-top: 24px;
        }
        .pagination a, .pagination span {
            padding: 8px 14px;
            border-radius: 8px;
            font-family: 'sourcesanspro', 'Roboto', sans-serif;
            font-size: 14px;
            font-weight: 700;
            background: rgba(241, 255, 94, 0.1);
            color: var(--color-texto);
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .pagination a:hover { background: rgba(241, 255, 94, 0.2); }
        .pagination .active span { background: var(--color-acento); color: var(--color-fondo); }
        .card {
            background: var(--color-secundario);
            border: 1px solid rgba(241, 255, 94, 0.2);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.2);
        }
        .alert {
            padding: 14px 20px;
            border-radius: 10px;
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .alert-success { background: rgba(34, 197, 94, 0.15); color: #22c55e; border: 1px solid rgba(34, 197, 94, 0.3); }
        .alert-error { background: rgba(239, 68, 68, 0.15); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.3); }
        .page-title {
            font-family: 'sourcesanspro', 'Roboto', sans-serif;
            font-weight: 900;
            font-size: clamp(24px, 3vw, 32px);
            color: var(--color-acento);
            margin-bottom: 4px;
        }
        .page-subtitle {
            font-family: 'Roboto', sans-serif;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 24px;
        }

        /* === LAYOUT === */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Roboto', sans-serif;
            background: var(--color-fondo);
            color: var(--color-texto);
            min-height: 100vh;
            display: flex;
        }

        .admin-sidebar {
            width: 260px;
            min-height: 100vh;
            background: var(--color-secundario);
            border-right: 2px solid rgba(241, 255, 94, 0.15);
            display: flex;
            flex-direction: column;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 100;
        }

        .admin-sidebar .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 24px 20px 20px;
            border-bottom: 1px solid rgba(241, 255, 94, 0.15);
        }

        .admin-sidebar .brand .logo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--color-acento);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'sourcesanspro', 'Roboto', sans-serif;
            font-weight: 900;
            font-size: 18px;
            color: var(--color-fondo);
        }

        .admin-sidebar .brand span {
            font-family: 'sourcesanspro', 'Roboto', sans-serif;
            font-weight: 900;
            font-size: 20px;
            color: var(--color-acento);
        }

        .admin-sidebar .nav {
            flex: 1;
            padding: 16px 12px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .admin-sidebar .nav-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255, 255, 255, 0.3);
            padding: 12px 12px 6px;
            font-weight: 700;
        }

        .admin-sidebar .nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 10px;
            font-family: 'sourcesanspro', 'Roboto', sans-serif;
            font-size: 14px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .admin-sidebar .nav a:hover {
            background: rgba(241, 255, 94, 0.1);
            color: var(--color-texto);
        }

        .admin-sidebar .nav a.active {
            background: rgba(241, 255, 94, 0.15);
            color: var(--color-acento);
        }

        .admin-sidebar .nav a svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        .admin-sidebar .nav-footer {
            padding: 12px;
            border-top: 1px solid rgba(241, 255, 94, 0.15);
        }

        .admin-sidebar .nav-footer .user-info {
            padding: 10px 14px;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.5);
        }

        .admin-sidebar .nav-footer .user-info strong {
            display: block;
            color: var(--color-texto);
            font-size: 14px;
        }

        .admin-sidebar .nav-footer form button {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 10px 14px;
            border-radius: 10px;
            background: none;
            border: none;
            font-family: 'sourcesanspro', 'Roboto', sans-serif;
            font-size: 14px;
            font-weight: 600;
            color: rgba(239, 68, 68, 0.7);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .admin-sidebar .nav-footer form button:hover {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .admin-main {
            margin-left: 260px;
            flex: 1;
            min-height: 100vh;
            padding: 32px 40px;
            max-width: 100%;
        }

        @media (max-width: 768px) {
            .admin-sidebar {
                width: 220px;
            }
            .admin-main {
                margin-left: 220px;
                padding: 20px;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <aside class="admin-sidebar">
        <div class="brand">
            <div class="logo">R</div>
            <span>REPARATOR</span>
        </div>

        <nav class="nav">
            <div class="nav-label">Administración</div>

            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="9" rx="1"/>
                    <rect x="14" y="3" width="7" height="5" rx="1"/>
                    <rect x="14" y="12" width="7" height="9" rx="1"/>
                    <rect x="3" y="16" width="7" height="5" rx="1"/>
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin.usuarios') }}" class="{{ request()->routeIs('admin.usuarios*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                Usuarios
            </a>

            <a href="{{ route('admin.categorias') }}" class="{{ request()->routeIs('admin.categorias*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h6v6H4zM14 4h6v6h-6zM4 14h6v6H4zM14 14h6v6h-6z"/>
                </svg>
                Categorías
            </a>

            <a href="{{ route('admin.productos') }}" class="{{ request()->routeIs('admin.productos*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4zM3 6h18"/>
                    <path d="M16 10a4 4 0 0 1-8 0"/>
                </svg>
                Productos
            </a>

            <a href="#" class="{{ request()->routeIs('admin.compras*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="9" cy="21" r="1.5"/>
                    <circle cx="18" cy="21" r="1.5"/>
                    <path d="M2 2h3l2 10h12l2-8H6"/>
                </svg>
                Compras
            </a>
        </nav>

        <div class="nav-footer">
            <div class="user-info">
                <strong>{{ Auth::user()->name }}</strong>
                {{ Auth::user()->email }}
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                    Cerrar sesión
                </button>
            </form>
        </div>
    </aside>

    <main class="admin-main">
        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>
