<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pedidos;
use Twilio\Rest\Client;
use App\Models\Negocios;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $arrayNeg = Negocios::where('usuario_id', auth()->user()->id)->get()->pluck('id');

        // cantidad de pedidos anual
        $cantPedidosAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->count();
        // cantidad de pedidos mensuales
        $cantPedidosMensual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->count();
        // cantidad de pedidos diarios
        $cantPedidosDiario = Pedidos::whereIn('negocio_id', $arrayNeg)->whereDate('fecha', date('Y-m-d'))->count();

        // monto total de pedidos anuales
        $montoPedidosAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->sum('total');
        // monto total de pedidos mensuales
        $montoPedidosMensual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->sum('total');
        // monto total de pedidos diarios
        $montoPedidosDiario = Pedidos::whereIn('negocio_id', $arrayNeg)->whereDate('fecha', date('Y-m-d'))->sum('total');

        // monto total de ventas entregadas anual
        $montoPedidosEntregadoAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->where('estado', 'Entregado')->sum('total');
        // monto total de ventas entregadas mensual
        $montoPedidosEntregadoMensual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->where('estado', 'Entregado')->sum('total');
        // monto total de ventas entregadas diarias
        $montoPedidosEntregadoDiario = Pedidos::whereIn('negocio_id', $arrayNeg)->whereDate('fecha', date('Y-m-d'))->where('estado', 'Entregado')->sum('total');

        // monto total de ventas pendientes anual
        $montoPedidosPendienteAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->where('estado', 'Pendiente')->sum('total');
        // monto total de ventas pendientes mensual
        $montoPedidosPendienteMensual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->where('estado', 'Pendiente')->sum('total');
        // monto total de ventas pendientes diarias
        $montoPedidosPendienteDiario = Pedidos::whereIn('negocio_id', $arrayNeg)->whereDate('fecha', date('Y-m-d'))->where('estado', 'Pendiente')->sum('total');

        // monto total de ventas enviadas anual
        $montoPedidosEnviadoAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->where('estado', 'Enviado')->sum('total');
        // monto total de ventas enviadas mensual
        $montoPedidosEnviadoMensual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->where('estado', 'Enviado')->sum('total');
        // monto total de ventas enviadas diarias
        $montoPedidosEnviadoDiario = Pedidos::whereIn('negocio_id', $arrayNeg)->whereDate('fecha', date('Y-m-d'))->where('estado', 'Enviado')->sum('total');

        // cantidad de pedidos pendientes anual
        $cantPedidosPendientesAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->where('estado', 'Pendiente')->count();
        // cantidad de pedidos pendientes mensual
        $cantPedidosPendientesMensual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->where('estado', 'Pendiente')->count();
        // cantidad de pedidos pendientes diarios
        $cantPedidosPendientesDiario = Pedidos::whereIn('negocio_id', $arrayNeg)->whereDate('fecha', date('Y-m-d'))->where('estado', 'Pendiente')->count();

        // cantidad de pedidos enviados anual
        $cantPedidosEnviadosAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->where('estado', 'Enviado')->count();
        // cantidad de pedidos enviados mensual
        $cantPedidosEnviadosMensual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->where('estado', 'Enviado')->count();
        // cantidad de pedidos enviados diarios
        $cantPedidosEnviadosDiario = Pedidos::whereIn('negocio_id', $arrayNeg)->whereDate('fecha', date('Y-m-d'))->where('estado', 'Enviado')->count();

        // cantidad de pedidos entregados anual
        $cantPedidosEntregadosAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->where('estado', 'Entregado')->count();
        // cantidad de pedidos entregados mensual
        $cantPedidosEntregadosMensual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->where('estado', 'Entregado')->count();
        // cantidad de pedidos entregados diarios
        $cantPedidosEntregadosDiario = Pedidos::whereIn('negocio_id', $arrayNeg)->whereDate('fecha', date('Y-m-d'))->where('estado', 'Entregado')->count();

        // listar de los ulitmos 10 pedidos
        $ultimosDiezPedidos = Pedidos::with('cliente', 'negocio')->orderBy('id', 'desc')->take(10)->get();

        return view('home', compact(
            'cantPedidosAnual',
            'cantPedidosMensual',
            'cantPedidosDiario',
            'montoPedidosAnual',
            'montoPedidosMensual',
            'montoPedidosDiario',
            'montoPedidosEntregadoAnual',
            'montoPedidosEntregadoMensual',
            'montoPedidosEntregadoDiario',
            'montoPedidosPendienteAnual',
            'montoPedidosPendienteMensual',
            'montoPedidosPendienteDiario',
            'montoPedidosEnviadoAnual',
            'montoPedidosEnviadoMensual',
            'montoPedidosEnviadoDiario',
            'cantPedidosPendientesAnual',
            'cantPedidosPendientesMensual',
            'cantPedidosPendientesDiario',
            'cantPedidosEnviadosAnual',
            'cantPedidosEnviadosMensual',
            'cantPedidosEnviadosDiario',
            'cantPedidosEntregadosAnual',
            'cantPedidosEntregadosMensual',
            'cantPedidosEntregadosDiario',
            'ultimosDiezPedidos'
        ));
    }

    //para verificar el OTP
    public function verificar(Request $request)
    {
        $this->validate($request, [
            'otp' => 'required|numeric',
        ]);

        $user = User::where('id', auth()->user()->id)->first();

        if ($user->otp == $request->otp) {
            $user->verificado = true;
            $user->save();
            return redirect('/home');
        } else {
            return back()->with('error', 'El codigo OTP incorrecto');
        }
    }

    //para reenviar el OTP
    public function reenviar()
    {
        $paraOtp = rand(100000, 999999);
        $user = User::where('id', auth()->user()->id)->first();
        $user->otp = $paraOtp;
        $user->save();


        //enviamos el SMS con el OTP
        $sid = env("TWILIO_SID");
        $token = env("TWILIO_TOKEN");
        $from = env("TWILIO_FROM");

        try{
            $client = new Client($sid, $token);

            $client->messages->create($user->telefono, [
                'from' => $from,
                'body' => "tu codigo OTP es: " . $paraOtp . ". No lo compartas con nadie."
            ]);
            return redirect('/home')->with('info', 'SMS enviado');
        } catch (\Throwable $th) {
            return back()->with('error', 'No se pudo enviar el SMS');
        }
    }
}
