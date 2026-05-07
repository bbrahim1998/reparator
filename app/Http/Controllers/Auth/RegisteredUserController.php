<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'fecha_nacimiento' => ['required', 'date', 'before:today'],
            'telefono' => ['required', 'string', 'max:20'],
            'telefono_codigo' => ['required', 'string', 'max:5'],
            'envio_tipo_via' => ['required', 'string', 'max:50'],
            'envio_nombre_via' => ['required', 'string', 'max:255'],
            'envio_numero' => ['required', 'string', 'max:10'],
            'envio_piso_puerta' => ['nullable', 'string', 'max:50'],
            'envio_codigo_postal' => ['required', 'string', 'max:10'],
            'envio_provincia' => ['required', 'string', 'max:100'],
            'envio_municipio' => ['required', 'string', 'max:255'],
            'envio_info_adicional' => ['nullable', 'string', 'max:500'],
            'facturacion_tipo_via' => ['nullable', 'string', 'max:50'],
            'facturacion_nombre_via' => ['nullable', 'string', 'max:255'],
            'facturacion_numero' => ['nullable', 'string', 'max:10'],
            'facturacion_piso_puerta' => ['nullable', 'string', 'max:50'],
            'facturacion_codigo_postal' => ['nullable', 'string', 'max:10'],
            'facturacion_provincia' => ['nullable', 'string', 'max:100'],
            'facturacion_municipio' => ['nullable', 'string', 'max:255'],
            'facturacion_info_adicional' => ['nullable', 'string', 'max:500'],
            'distancia' => ['nullable', 'string', 'in:<5kms,<30kms,<100kms,<200kms'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $telefonoCompleto = $request->telefono_codigo . ' ' . $request->telefono;

        $billingFilled = $request->filled('facturacion_tipo_via');

        $user = User::create([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono' => $telefonoCompleto,
            'envio_tipo_via' => $request->envio_tipo_via,
            'envio_nombre_via' => $request->envio_nombre_via,
            'envio_numero' => $request->envio_numero,
            'envio_piso_puerta' => $request->envio_piso_puerta,
            'envio_codigo_postal' => $request->envio_codigo_postal,
            'envio_provincia' => $request->envio_provincia,
            'envio_municipio' => $request->envio_municipio,
            'envio_info_adicional' => $request->envio_info_adicional,
            'facturacion_tipo_via' => $billingFilled ? $request->facturacion_tipo_via : $request->envio_tipo_via,
            'facturacion_nombre_via' => $billingFilled ? $request->facturacion_nombre_via : $request->envio_nombre_via,
            'facturacion_numero' => $billingFilled ? $request->facturacion_numero : $request->envio_numero,
            'facturacion_piso_puerta' => $billingFilled ? $request->facturacion_piso_puerta : $request->envio_piso_puerta,
            'facturacion_codigo_postal' => $billingFilled ? $request->facturacion_codigo_postal : $request->envio_codigo_postal,
            'facturacion_provincia' => $billingFilled ? $request->facturacion_provincia : $request->envio_provincia,
            'facturacion_municipio' => $billingFilled ? $request->facturacion_municipio : $request->envio_municipio,
            'facturacion_info_adicional' => $billingFilled ? $request->facturacion_info_adicional : $request->envio_info_adicional,
            'distancia' => $request->distancia,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
