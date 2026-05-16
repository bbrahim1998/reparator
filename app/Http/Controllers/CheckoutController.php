<?php

/*
 * CONTROLADOR CHECKOUT
 *
 * Gestiona todo el flujo de compra: muestra el formulario de pago,
 * procesa el pedido (validación, creación del pedido y líneas de ticket),
 * y muestra la pantalla de confirmación.
 */

namespace App\Http\Controllers;

use App\Models\LineaTicket;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CheckoutController extends Controller
{
    /*
     * Muestra el formulario de checkout con los datos del carrito
     * para que el usuario complete la compra.
     *
     * @return View
     */
    public function index(): View
    {
        return view('checkout', ['currentPage' => 'checkout']);
    }

    /*
     * Procesa el pedido: valida los datos del formulario,
     * crea el pedido y las líneas de ticket en la BD,
     * y redirige a la confirmación.
     *
     * @param Request $request Datos del formulario
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        /*
         * Validación de todos los campos del formulario,
         * incluyendo reglas personalizadas para tarjeta de crédito
         * y datos del carrito.
         */
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
            'card_holder' => 'required|string|max:255',
            /*
             * Valida que el número de tarjeta tenga entre 13 y 19 dígitos
             * después de eliminar cualquier carácter no numérico.
             */
            'card_number' => ['required', 'string', 'max:19', function ($attribute, $value, $fail) {
                $digits = preg_replace('/\D/', '', $value);
                if (strlen($digits) < 13 || strlen($digits) > 19) {
                    $fail('El número de tarjeta debe tener entre 13 y 19 dígitos.');
                }
            }],
            /*
             * Valida el formato MM/AA y comprueba que la tarjeta
             * no esté caducada comparando con la fecha actual.
             */
            'card_expiry' => ['required', 'string', 'max:5', function ($attribute, $value, $fail) {
                if (!preg_match('/^\d{2}\/\d{2}$/', $value)) {
                    $fail('El formato de caducidad debe ser MM/AA.');
                    return;
                }
                $parts = explode('/', $value);
                $month = (int)$parts[0];
                $year = (int)$parts[1] + 2000;
                if ($month < 1 || $month > 12) {
                    $fail('El mes de caducidad no es válido.');
                    return;
                }
                $now = now();
                $expiry = \Carbon\Carbon::createFromDate($year, $month, 1)->endOfMonth();
                if ($expiry < $now) {
                    $fail('La tarjeta está caducada.');
                }
            }],
            /*
             * Valida que el CVV tenga 3 o 4 dígitos numéricos.
             */
            'card_cvv' => ['required', 'string', function ($attribute, $value, $fail) {
                if (!preg_match('/^\d{3,4}$/', $value)) {
                    $fail('El CVV debe tener 3 o 4 dígitos.');
                }
            }],
            /*
             * Valida que el carrito contenga un JSON con al menos un
             * producto y que cada item tenga id, name, price y quantity.
             */
            'cart_data' => ['required', 'string', function ($attribute, $value, $fail) {
                $data = json_decode($value, true);
                if (!is_array($data) || empty($data)) {
                    $fail('El carrito está vacío.');
                    return;
                }
                foreach ($data as $item) {
                    if (!isset($item['id'], $item['name'], $item['price'], $item['quantity'])) {
                        $fail('Datos del carrito inválidos.');
                        return;
                    }
                }
            }],
        ]);

        /* Decodifica el JSON del carrito para procesarlo */
        $cart = json_decode($request->cart_data, true);

        /* Calcula el importe total del pedido sumando precio * cantidad de cada producto */
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        /* Extrae los últimos 4 dígitos del número de tarjeta para mostrarlos en la confirmación */
        $lastFour = substr(preg_replace('/\D/', '', $validated['card_number']), -4);

        $pedido = Pedido::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'apellidos' => $validated['apellidos'],
            'email' => $validated['email'],
            'telefono' => $validated['telefono'],
            'envio_tipo_via' => $validated['envio_tipo_via'],
            'envio_nombre_via' => $validated['envio_nombre_via'],
            'envio_numero' => $validated['envio_numero'],
            'envio_piso_puerta' => $validated['envio_piso_puerta'] ?? null,
            'envio_codigo_postal' => $validated['envio_codigo_postal'],
            'envio_municipio' => $validated['envio_municipio'],
            'envio_provincia' => $validated['envio_provincia'],
            'envio_info_adicional' => $validated['envio_info_adicional'] ?? null,
            'facturacion_tipo_via' => $validated['facturacion_tipo_via'] ?? null,
            'facturacion_nombre_via' => $validated['facturacion_nombre_via'] ?? null,
            'facturacion_numero' => $validated['facturacion_numero'] ?? null,
            'facturacion_piso_puerta' => $validated['facturacion_piso_puerta'] ?? null,
            'facturacion_codigo_postal' => $validated['facturacion_codigo_postal'] ?? null,
            'facturacion_municipio' => $validated['facturacion_municipio'] ?? null,
            'facturacion_provincia' => $validated['facturacion_provincia'] ?? null,
            'facturacion_info_adicional' => $validated['facturacion_info_adicional'] ?? null,
            'distancia' => $validated['distancia'] ?? null,
            'has_to_comment' => 'en otro momento',
            'total' => $total,
            'ultimos_cuatro' => $lastFour,
        ]);

        /* Crea una línea de ticket por cada producto del carrito para mantener el histórico */
        foreach ($cart as $item) {
            LineaTicket::create([
                'pedido_id' => $pedido->id,
                'producto_id' => $item['id'],
                'nombre' => $item['name'],
                'precio' => $item['price'],
                'cantidad' => $item['quantity'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);
        }

        /* Guarda los datos completos del pedido en sesión para mostrarlos en la confirmación */
        $validated['cart_data'] = $cart;
        $validated['pedido_id'] = $pedido->id;

        session(['checkout_data' => $validated]);

        return redirect()->route('checkout.confirmacion');
    }

    /*
     * Muestra la pantalla de confirmación del pedido tras
     * completar la compra. Recupera los datos de la sesión.
     *
     * @return View
     */
    public function confirmacion(): View
    {
        /* Recupera los datos del pedido guardados en sesión */
        $data = session('checkout_data');

        /* Si no hay datos, lanza error 404 (acceso directo sin compra) */
        abort_if(!$data, 404, 'No hay datos de compra para mostrar.');

        /* Recalcula el total para mostrarlo en la vista */
        $total = 0;
        foreach ($data['cart_data'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        /* Enmascara el número de tarjeta mostrando solo los últimos 4 dígitos */
        $lastFour = substr(preg_replace('/\D/', '', $data['card_number']), -4);

        return view('checkout-confirmacion', [
            'currentPage' => 'checkout',
            'data' => $data,
            'total' => $total,
            'lastFour' => $lastFour,
        ]);
    }
}
