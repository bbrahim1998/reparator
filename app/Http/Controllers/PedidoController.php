<?php

/*
 * CONTROLADOR PEDIDOS (usuario)
 *
 * Muestra el historial de pedidos del usuario autenticado
 * y permite ver el detalle de cada uno de ellos.
 * Solo el usuario propietario del pedido puede acceder.
 */

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\View\View;

class PedidoController extends Controller
{
    /*
     * Muestra el historial paginado de pedidos del usuario autenticado,
     * ordenados del más reciente al más antiguo.
     *
     * @return View
     */
    public function index(): View
    {
        $pedidos = Pedido::with('lineasTicket')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('mis-pedidos', compact('pedidos') + ['currentPage' => 'mis-pedidos']);
    }

    /*
     * Muestra el detalle de un pedido con sus líneas de ticket
     * y productos asociados. Verifica que el pedido pertenezca
     * al usuario autenticado.
     *
     * @param Pedido $pedido Modelo inyectado por Laravel (route model binding)
     * @return View
     */
    public function show(Pedido $pedido): View
    {
        /* Evita que un usuario vea pedidos de otros usuarios */
        if ($pedido->user_id !== auth()->id()) {
            abort(403);
        }

        $pedido->load('lineasTicket.producto');

        return view('mis-pedidos-detalle', compact('pedido') + ['currentPage' => 'mis-pedidos']);
    }
}
