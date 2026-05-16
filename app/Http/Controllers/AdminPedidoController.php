<?php

/*
 * CONTROLADOR ADMIN PEDIDOS
 *
 * Panel de administración para gestionar pedidos.
 * Proporciona listado, detalle, edición y actualización
 * de cualquier pedido registrado en el sistema.
 */

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminPedidoController extends Controller
{
    /*
     * Lista paginada de todos los pedidos del sistema,
     * con datos del usuario y líneas de ticket, ordenados
     * del más reciente al más antiguo.
     *
     * @return View
     */
    public function index(): View
    {
        $pedidos = Pedido::with('user', 'lineasTicket')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.pedidos.index', compact('pedidos'));
    }

    /*
     * Muestra el detalle completo de un pedido con la
     * información del usuario, líneas de ticket y productos.
     *
     * @param Pedido $pedido
     * @return View
     */
    public function show(Pedido $pedido): View
    {
        $pedido->load('user', 'lineasTicket.producto');
        return view('admin.pedidos.show', compact('pedido'));
    }

    /*
     * Muestra el formulario de edición de un pedido
     * con todos sus datos precargados.
     *
     * @param Pedido $pedido
     * @return View
     */
    public function edit(Pedido $pedido): View
    {
        $pedido->load('user', 'lineasTicket.producto');
        return view('admin.pedidos.edit', compact('pedido'));
    }

    /*
     * Actualiza los datos de un pedido existente.
     * Valida todos los campos editables y persiste los cambios.
     *
     * @param Request $request
     * @param Pedido $pedido
     * @return RedirectResponse
     */
    public function update(Request $request, Pedido $pedido): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
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
            'total' => 'required|numeric|min:0',
        ]);

        $pedido->update($validated);

        return redirect()->route('admin.pedidos.show', $pedido)
            ->with('status', 'Pedido actualizado correctamente.');
    }
}
