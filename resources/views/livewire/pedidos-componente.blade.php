<div>
    @include('includes.alertas')
    {{-- The whole world belongs to you. --}}
    @if ($negocio_id > 0)
        Negocio seleccionado {{ $negocio_id }}

        <div class="row">

            {{-- card items --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Seleccionar Productos</div>
                    <div class="card-body">
                        <input wire:model.live="buscarProducto" type="text" class="form-control mb-3" placeholder="Buscar...">
                        <div class="table-responsive text-center">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Imagne</th>
                                        <th>Producto</th>
                                        <th>Costo</th>
                                        <th>Agregar</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($productos as $itempro)
                                        <tr>
                                            <td><img src="{{ $itempro->getImagenUrl() }}" alt="img" height="40px"></td>
                                            <td>{{ $itempro->nombre }}</td>
                                            <td>{{ $itempro->costo }}</td>
                                            <td>
                                                <button wire:click="agregarCarrito({{ $itempro }})" class="btn btn-primary">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $productos->links() }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- card carrito --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Carrito</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="buscarCliente">Buscar Cliente</label>
                                    <input type="text" wire:model="buscarCliente" class="form-control" placeholder="Ingresar el numero de telefono">
                                    @error('buscarCliente') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Buscar</label>
                                    <br>
                                    <button wire:click="filtrarClientes()" class="btn btn-primary">
                                        Buscar <i class="fa fa-spinner" wire:loading wire:target="filtrarClientes()"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Seleccionar Cliente</label>
                                    <select wire:model="cliente_id" class="form-control">
                                        <option value="">Seleccionar</option>
                                        @foreach ($clientes as $itemcli)
                                            <option value="{{ $itemcli->id }}">{{ $itemcli->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-3 text-center">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th width="10%">Cantidad</th>
                                        <th>Costo</th>
                                        <th>Sub Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carrito as $key => $itemcar)
                                        <tr>
                                            <td>{{ $itemcar['nombre'] }}</td>
                                            <td>
                                                <input wire:model.live="carrito.{{ $key }}.cantidad" wire:change="calcularTotal()" type="number" step="any" class="form-control">
                                            </td>
                                            <td>{{ $itemcar['costo'] }}</td>
                                            <td>{{ $itemcar['subtotal'] }}</td>
                                            <td>
                                                <button wire:click="quitarProducto({{ $key }})" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">TOTAL</td>
                                        <td>{{ $total }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        @if ($cliente_id > 0 && $total > 0)
                            <div class="text-center">
                                <button wire:click="guardarPedido()" class="btn btn-success">
                                    Guardar Pedido <i class="fa fa-spinner" wire:loading wire:target="guardarPedido()"></i>
                                </button>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>

    @else

    <div class="row justify-content-center">
        @foreach ($negocios as $itemneg)
            <div class="col-md-4 p-1">
            <div class="card shadow">
                <div class="card-body text-center">
                    <img src="{{ $itemneg->getImagenUrl() }}" alt="" class="rounded mb-2" height="200px">
                    <h2>{{ $itemneg->nombre }}</h2>
                    <hr>
                    <button wire:click="seleccionaNegocio({{ $itemneg->id }})" class="btn btn-primary shadow">Seleccionar</button>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    @endif

</div>
