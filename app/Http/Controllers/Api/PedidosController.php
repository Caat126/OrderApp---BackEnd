<?php

namespace App\Http\Controllers\Api;

use App\Models\Pedidos;
use App\Models\Detalles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PedidosController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'cliente_id' => 'required|exists:users,id',
            'negocio_id' => 'required|exists:negocios,id',
            'total' => 'required|numeric',
        ]);

        $pedido = new Pedidos();
        $pedido->cliente_id = $request->cliente_id;
        $pedido->negocio_id = $request->negocio_id;
        $pedido->total = $request->total;
        $pedido->fecha = now(); //date('Y-m-d H:i:s');
        $pedido->comentarios = $request->comentarios;
        $pedido->coordenadas = $request->coordenadas;
        $pedido->estado = 'Pendiente';

        if ($pedido->save()) {
            foreach ($request->detalles as $item) {
                $detalle = new Detalles();
                $detalle->pedido_id = $pedido->id;
                $detalle->producto_id = $item['producto_id'];
                $detalle->cantidad = $item['cantidad'];
                $detalle->costo = $item['costo'];
                $detalle->save();
            }
            return response()->json(['mensaje' => 'Registro exitoso', 'pedido' => $pedido], 200);
        } else {
            return response()->json(['mensaje' => 'Error al registrar!'], 400);
        }
    }

    public function historial($cliente_id)
    {
        $pedidos = Pedidos::where('cliente_id', $cliente_id)
                            ->with('negocio', 'detalles', 'detalles.producto')
                            ->orderBy('id', 'desc')
                            ->take(20)
                            ->get();

        return response()->json([
            'mensaje' => 'Datos cargados correctamente',
            'datos' => $pedidos
        ], 200);
    }
}
