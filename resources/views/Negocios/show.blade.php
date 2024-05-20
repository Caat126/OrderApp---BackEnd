@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Negocios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Negocios</li>
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
                            <h3>Informacion</h3>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ $negocio->getImagenUrl() }}" class="border shadow" height="150px" width="150px"
                                alt="img">
                            <hr>
                            <h3><u>{{ $negocio->nombre }}</u></h3>
                            <small><b>Fecha de creacion: </b>{{ $negocio->created_at }}</small>
                            <br>
                            @if ($negocio->estado == true)
                                <span class="badge badge-success shadow">Activo</span>
                            @else
                                <span class="badge badge-danger shadow">Inactivo</span>
                            @endif
                            <br><br>
                            <p class="text-justify text-center">{{ $negocio->descripcion }}</p>
                            <hr>
                            <a href="{{ url('/negocios') }}" class="btn btn-primary shadow">Volver al listado</a>
                        </div>
                    </div>
                </div>

                {{-- card2 --}}
                <div class="col-8">
                    <div class="card">
                        <div class="card-header text-center bg-dark text-white">
                            <h3>Listado de productos</h3>
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
                                            <th>Descripcion</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($productos as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    <img src="{{ $item->getImagenUrl() }}" alt="img" height="60px">
                                                </td>
                                                <td>{{ $item->nombre }}</td>
                                                <td>{{ $item->costo }}</td>
                                                <td>{{ $item->descripcion }}</td>
                                                <td>
                                                    @if ($item->estado == true)
                                                        <span class="badge badge-success">Activo</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactivo</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('/productos/actualizar/' . $item->id) }}"
                                                        class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i></a>

                                                    @if ($item->estado == true)
                                                        <a href="{{ url('/productos/estado/' . $item->id) }}"
                                                            class="btn btn-danger btn-sm"> <i class="fa fa-ban"></i></a>
                                                    @else
                                                        <a href="{{ url('/productos/estado/' . $item->id) }}"
                                                            class="btn btn-success btn-sm"> <i class="fa fa-check"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $productos->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
