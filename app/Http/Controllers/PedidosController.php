<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Twilio\Rest\Client;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index()
    {
        $pedidos = Pedidos::with('cliente', 'negocio')->orderBy('id', 'desc')->paginate(10);
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        return view('pedidos.create');
    }

    public function estado($id, $estado)
    {
        $pedido = Pedidos::with('cliente')->find($id);
        $pedido->estado = $estado;
        if ($pedido->save()) {
            // el estado es enviado, se enviara sms : no hacer nada
            if ($estado == 'Enviado'){
                    $sid = env("TWILIO_SID");
                    $token = env("TWILIO_TOKEN");
                    $from = env("TWILIO_FROM");

                    try {
                        $client = new Client($sid, $token);
                        $client->messages->create($pedido->cliente->telefono, [
                            'from' => $from,
                            'body' => "tu pedido con ID: " . $pedido->id . " ha sido enviado."
                        ]);
                    } catch (\Throwable $th) {
                        return back()->with('success', 'No se pudo enviar el SMS, se ah actualizado su pedido con éxito');
                    }
            }

            return back()->with('/pedidos')->with('success', 'Pedido actualizado con éxito');
        } else {
            return back()->with('error', 'No se pudo actualizar el Pedido');
        }
    }

    public function show ($id)
    {
        $pedido = Pedidos::with('cliente', 'negocio', 'detalles', 'detalles.producto')->find($id);
        return view('pedidos.show', compact('pedido'));
    }
}
