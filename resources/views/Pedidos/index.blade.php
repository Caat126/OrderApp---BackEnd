@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pedidos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Pedidos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">Listado de Pedidos</div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6"></div>

                        <div class="col-md-6 text-end">
                            <a href="{{ url('/pedidos/registrar')}}" class="btn btn-primary">Nuevo</a>
                        </div>

                    </div>

                    <div class="table-responsive text-center mt-3">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Negocio</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($pedidos as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->cliente->name }}</td>
                                        <td>{{ $item->negocio->nombre }}</td>
                                        <td>{{ $item->fecha }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>
                                            @if($item->estado == 'Pendiente')
                                            <span class="badge badge-danger shadow">Pendiente</span>
                                            @elseif($item->estado == 'Enviado')
                                            <span class="badge badge-warning shadow">Enviado</span>
                                            @else
                                            <span class="badge badge-success shadow">Entregado</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/pedidos/ver/' . $item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                            {{ $pedidos->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
