<?php

/*
 * CONTROLADOR MI CUENTA
 *
 * Permite al usuario autenticado editar y actualizar
 * sus datos personales, incluida la dirección de envío,
 * facturación y preferencias.
 */

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MiCuentaController extends Controller
{
    /*
     * Muestra el formulario de edición de datos personales
     * del usuario autenticado.
     *
     * @return View
     */
    public function edit(): View
    {
        return view('mi-cuenta', ['currentPage' => 'mi-cuenta']);
    }

    /*
     * Procesa la actualización de los datos del usuario autenticado.
     * Valida todos los campos, incluyendo unicidad del email
     * (exceptuando el propio usuario), y resetea la verificación
     * si el email cambió.
     *
     * @param Request $request Datos del formulario
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'telefono' => 'required|string|max:20',
            'fecha_nacimiento' => 'required|date',
            'envio_tipo_via' => 'required|string|max:50',
            'envio_nombre_via' => 'required|string|max:255',
            'envio_numero' => 'required|string|max:20',
            'envio_piso_puerta' => 'nullable|string|max:50',
            'envio_codigo_postal' => 'required|string|max:10',
            'envio_municipio' => 'required|string|max:255',
            'envio_provincia' => 'required|string|max:100',
            'envio_info_adicional' => 'nullable|string|max:500',
            'facturacion_tipo_via' => 'nullable|string|max:50',
            'facturacion_nombre_via' => 'nullable|string|max:255',
            'facturacion_numero' => 'nullable|string|max:20',
            'facturacion_piso_puerta' => 'nullable|string|max:50',
            'facturacion_codigo_postal' => 'nullable|string|max:10',
            'facturacion_municipio' => 'nullable|string|max:255',
            'facturacion_provincia' => 'nullable|string|max:100',
            'facturacion_info_adicional' => 'nullable|string|max:500',
            'distancia' => 'nullable|string|max:20',
        ]);

        /* Si el email cambió, invalida la verificación para que el usuario la re-confirme */
        if ($validated['email'] !== $user->email) {
            $validated['email_verified_at'] = null;
        }

        $user->update($validated);

        return redirect()->route('mi-cuenta')->with('status', 'Datos actualizados correctamente.');
    }
}
