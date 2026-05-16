<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminClienteController extends Controller
{
    public function index(): View
    {
        $clientes = User::where('rol', 'cliente')->orderBy('id')->paginate(15);

        return view('admin.clientes.index', compact('clientes'));
    }

    public function create(): View
    {
        return view('admin.clientes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = [];
        $warnings = [];

        if ($request->filled('name')) {
            $data['name'] = $request->name;
        } else {
            $warnings[] = 'No se ha indicado un nombre. Se recomienda añadirlo para identificar al cliente.';
            $data['name'] = $request->name ?? '';
        }

        $data['apellidos'] = $request->apellidos;

        if ($request->filled('email')) {
            $request->validate(['email' => ['string', 'lowercase', 'email', 'max:255', 'unique:' . User::class]]);
            $data['email'] = $request->email;
        } else {
            $warnings[] = 'No se ha indicado un email. El cliente no podrá iniciar sesión sin él.';
            $data['email'] = $request->email ?? '';
        }

        if ($request->filled('password')) {
            $request->validate(['password' => ['string', 'min:8', 'confirmed']]);
            $data['password'] = Hash::make($request->password);
        } else {
            $warnings[] = 'No se ha indicado una contraseña. El cliente no podrá iniciar sesión sin ella.';
        }

        $data['fecha_nacimiento'] = $request->fecha_nacimiento;
        $data['telefono'] = $request->telefono;

        $data['envio_tipo_via'] = $request->envio_tipo_via;
        $data['envio_nombre_via'] = $request->envio_nombre_via;
        $data['envio_numero'] = $request->envio_numero;
        $data['envio_piso_puerta'] = $request->envio_piso_puerta;
        $data['envio_codigo_postal'] = $request->envio_codigo_postal;
        $data['envio_provincia'] = $request->envio_provincia;
        $data['envio_municipio'] = $request->envio_municipio;
        $data['envio_info_adicional'] = $request->envio_info_adicional;

        $data['facturacion_tipo_via'] = $request->facturacion_tipo_via;
        $data['facturacion_nombre_via'] = $request->facturacion_nombre_via;
        $data['facturacion_numero'] = $request->facturacion_numero;
        $data['facturacion_piso_puerta'] = $request->facturacion_piso_puerta;
        $data['facturacion_codigo_postal'] = $request->facturacion_codigo_postal;
        $data['facturacion_provincia'] = $request->facturacion_provincia;
        $data['facturacion_municipio'] = $request->facturacion_municipio;
        $data['facturacion_info_adicional'] = $request->facturacion_info_adicional;

        $data['distancia'] = $request->distancia;
        $data['rol'] = 'cliente';

        User::create($data);

        return redirect()->route('admin.clientes')
            ->with('status', 'Cliente creado correctamente.')
            ->with('warnings', $warnings);
    }

    public function edit(User $user): View|RedirectResponse
    {
        if ($user->rol !== 'cliente') {
            return redirect()->route('admin.clientes')->with('error', 'El usuario no es un cliente.');
        }

        return view('admin.clientes.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        if ($user->rol !== 'cliente') {
            return redirect()->route('admin.clientes')->with('error', 'El usuario no es un cliente.');
        }

        $data = [];
        $warnings = [];

        if ($request->filled('name')) {
            $data['name'] = $request->name;
        } else {
            $warnings[] = 'No se ha indicado un nombre. Se recomienda añadirlo para identificar al cliente.';
            $data['name'] = $request->name ?? '';
        }

        $data['apellidos'] = $request->apellidos;

        if ($request->filled('email')) {
            $request->validate(['email' => ['string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)]]);
            $data['email'] = $request->email;
        } else {
            $warnings[] = 'No se ha indicado un email. El cliente no podrá iniciar sesión sin él.';
            $data['email'] = $request->email ?? '';
        }

        if ($request->filled('password')) {
            $request->validate(['password' => ['string', 'min:8', 'confirmed']]);
            $data['password'] = Hash::make($request->password);
        }

        $data['fecha_nacimiento'] = $request->fecha_nacimiento;
        $data['telefono'] = $request->telefono;

        $data['envio_tipo_via'] = $request->envio_tipo_via;
        $data['envio_nombre_via'] = $request->envio_nombre_via;
        $data['envio_numero'] = $request->envio_numero;
        $data['envio_piso_puerta'] = $request->envio_piso_puerta;
        $data['envio_codigo_postal'] = $request->envio_codigo_postal;
        $data['envio_provincia'] = $request->envio_provincia;
        $data['envio_municipio'] = $request->envio_municipio;
        $data['envio_info_adicional'] = $request->envio_info_adicional;

        $data['facturacion_tipo_via'] = $request->facturacion_tipo_via;
        $data['facturacion_nombre_via'] = $request->facturacion_nombre_via;
        $data['facturacion_numero'] = $request->facturacion_numero;
        $data['facturacion_piso_puerta'] = $request->facturacion_piso_puerta;
        $data['facturacion_codigo_postal'] = $request->facturacion_codigo_postal;
        $data['facturacion_provincia'] = $request->facturacion_provincia;
        $data['facturacion_municipio'] = $request->facturacion_municipio;
        $data['facturacion_info_adicional'] = $request->facturacion_info_adicional;

        $data['distancia'] = $request->distancia;

        $user->update($data);

        return redirect()->route('admin.clientes')
            ->with('status', 'Cliente actualizado correctamente.')
            ->with('warnings', $warnings);
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->rol !== 'cliente') {
            return redirect()->route('admin.clientes')->with('error', 'El usuario no es un cliente.');
        }

        $user->delete();

        return redirect()->route('admin.clientes')->with('status', 'Cliente eliminado correctamente.');
    }
}
