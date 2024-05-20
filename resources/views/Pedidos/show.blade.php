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
            <div class="row justify-content-center">

                {{-- card1 --}}
                <div class="col-4">
                    <div class="card">
                        <div class="card-header text-center bg-dark text-white">
                            <h3>Detalle del pedido</h3>
                        </div>
                        <div class="card-body text-center">
                            <h3><u>{{ $pedido->nombre }}</u></h3>
                            <p><strong>{{ $pedido->cliente->name }}</strong></p>
                            <p><strong>{{ $pedido->negocio->nombre }}</strong></p>
                            <small><b>Fecha de creacion: </b>{{ $pedido->fecha }}</small>
                            <small><b>Coordenadas: </b>{{ $pedido->coordenadas }}</small>
                            <br>
                                @if($pedido->estado == 'Pendiente')
                                <span class="badge badge-danger shadow">Pendiente</span>
                                @elseif($pedido->estado == 'Enviado')
                                <span class="badge badge-warning shadow">Enviado</span>
                                @else
                                <span class="badge badge-success shadow">Entregado</span>
                                @endif
                            <br><br>
                            <h4>Cambiar estado</h4>
                            <div class="dropdown">
                                <button class="btn @if($pedido->estado == 'Pendiente') btn-danger @elseif($pedido->estado == 'Enviado') btn-warning @else btn-success @endif dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> {{ $pedido->estado }} </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" @if($pedido->estado == 'Pendiente') href="#" @else href="{{ url('/pedidos/estado/' . $pedido->id . '/Pendiente')}}" @endif >Pendiente</a>
                                    <a class="dropdown-item" @if($pedido->estado == 'Enviado') href="#" @else href="{{ url('/pedidos/estado/' . $pedido->id . '/Enviado')}}" @endif href="#">Enviado</a>
                                    <a class="dropdown-item" @if($pedido->estado == 'Entregado') href="#" @else href="{{ url('/pedidos/estado/' . $pedido->id . '/Entregado')}}" @endif href="#">Entregado</a>
                                </div>
                            </div>
                            <br><br>
                            <p class="text-justify text-center">{{ $pedido->comentarios }}</p>
                            <hr>
                            <a href="{{ url('/pedidos') }}" class="btn btn-primary shadow">Volver al listado</a>
                        </div>
                    </div>
                </div>

                {{-- card2 --}}
                <div class="col-8">
                    <div class="card">
                        <div class="card-header text-center bg-dark text-white">
                            <h3>Detalles</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-dark text-center">
                                        <tr>
                                            <th>ID</th>
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Costo</th>
                                            <th>Cantidad</th>
                                            <th>SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($pedido->detalles as $item)
                                            <tr>
                                                <td>{{ $item->producto->id }}</td>
                                                <td>
                                                    <img src="{{ $item->producto->getImagenUrl() }}" alt="img"
                                                        height="60px">
                                                </td>
                                                <td>{{ $item->producto->nombre }}</td>
                                                <td>{{ $item->costo }}</td>
                                                <td>{{ $item->cantidad }}</td>
                                                <td>{{ $item->costo * $item->cantidad }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-center">
                                            <td colspan="5" class="bg-dark text-white"><b>TOTAL</b></td>
                                            <td class="bg-dark text-white"><b>{{ $pedido->total }}</b></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
