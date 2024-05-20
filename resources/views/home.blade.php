@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bienvenido</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        {{-- <li class="breadcrumb-item active">Starter Page</li> --}}
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $cantPedidosAnual }}</h3>
                            <p>Cantidad de pedidos del año</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $cantPedidosMensual }}</h3>
                            <p>Cantidad de pedidos del mes</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $cantPedidosDiario }}</h3>
                            <p>Cantidad de pedidos del dia</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ number_format($montoPedidosAnual) }}</h3>
                            <p>Monto de pedidos del año</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money-bill" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ number_format($montoPedidosMensual) }}</h3>
                            <p>Monto de pedidos del mes</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money-bill" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ number_format($montoPedidosDiario) }}</h3>
                            <p>Monto de pedidos del dia</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money-bill" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ number_format($montoPedidosEntregadoAnual) }}</h3>
                            <p>Monto de pedidos entregados del año</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money-bill" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ number_format($montoPedidosEntregadoMensual) }}</h3>
                            <p>Monto de pedidos entregados del mes</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money-bill" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ number_format($montoPedidosEntregadoDiario) }}</h3>
                            <p>Monto de pedidos entregados del dia</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money-bill" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ number_format($montoPedidosPendienteAnual) }}</h3>
                            <p>Monto de pedidos pendientes del año</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money-bill" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ number_format($montoPedidosPendienteMensual) }}</h3>
                            <p>Monto de pedidos pendientes del mes</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money-bill" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ number_format($montoPedidosPendienteDiario) }}</h3>
                            <p>Monto de pedidos pendientes del dia</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money-bill" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ number_format($montoPedidosEnviadoAnual) }}</h3>
                            <p>Monto de pedidos enviados del año</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money-bill" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ number_format($montoPedidosEnviadoMensual) }}</h3>
                            <p>Monto de pedidos enviados del mes</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money-bill" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ number_format($montoPedidosEnviadoDiario) }}</h3>
                            <p>Monto de pedidos enviados del dia</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money-bill" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $cantPedidosPendientesAnual }}</h3>
                            <p>Cantidad de pedidos pendientes del año</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $cantPedidosPendientesMensual }}</h3>
                            <p>Cantidad de pedidos pendientes del mes</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $cantPedidosPendientesDiario }}</h3>
                            <p>Cantidad de pedidos pendientes del dia</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $cantPedidosEnviadosAnual }}</h3>
                            <p>Cantidad de pedidos enviados del año</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $cantPedidosEnviadosMensual }}</h3>
                            <p>Cantidad de pedidos enviados del mes</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $cantPedidosEnviadosDiario }}</h3>
                            <p>Cantidad de pedidos enviados del dia</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                {{-- para mostrar los 10 ultimos pedidos --}}
                <div class="col-5">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Últimos Pedidos</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-dark text-center">
                                        <tr>
                                            <th scope="col">Pedido ID</th>
                                            <th scope="col">Negocio</th>
                                            <th scope="col">Fecha de Creación</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($ultimosDiezPedidos as $pedido)
                                            <tr>
                                                <td>{{ $pedido->id }}</td>
                                                <td>{{ $pedido->negocio->nombre }}</td>
                                                <td>{{ $pedido->fecha }}</td>
                                                <td><a href="{{ url('/pedidos/ver/' . $pedido->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div> --}}
            </div>
        </div>
    </div>
@endsection
