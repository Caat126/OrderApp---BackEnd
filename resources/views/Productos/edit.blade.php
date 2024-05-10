@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Productos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Productos</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Actualizacion del Producto</div>

                    <div class="card-body">

                        <form action="{{ url('/productos/actualizar/' . $producto->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')

                        @csrf

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="text" value="{{ $producto->nombre }}" name="nombre">
                            @error('nombre')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <img src="{{ $producto->getImagenUrl() }}" alt="">

                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input class="form-control" type="file" accept="imagen/*" name="imagen">
                            @error('imagen')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="negocio">Negocio</label>
                            <select class="form-control" name="negocio_id">
                                <option value="">Seleccione...</option>
                                @foreach ($negocios as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $producto->negocio_id ? 'selected' : '' }}>{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="costo">Costo</label>
                            <input class="form-control" type="number" value="{{ $producto->costo }}" name="costo">
                            @error('costo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea class="form-control" name="descripcion" cols="30" rows="3">{{ $producto->descripcion }}</textarea>
                            @error('descripcion')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <a href="{{ url('/productos')}}" type="button" class="btn btn-primary">Volver al Listado</a>
                        <button type="submit" class="btn btn-success">Actualizar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
