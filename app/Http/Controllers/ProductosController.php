<?php

namespace App\Http\Controllers;

use App\Models\Negocios;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductosController extends Controller
{
    public function index()
    {
        // opción 1
        // $productos = Productos::whith('negocio')
        //                         ->whereHas('negocio', function($query){
        //                             $query->where('usuario_id', auth()->user()->id);
        //                         })
        //                         ->orderBy('id', 'desc')->paginate(10);

        // opción 2
        // $negocios = Negocios::where('usuario_id', auth()->user()->id)->get();
        // $arrayNegocios = [];
        // foreach ($negocios as $value) {
        //     $arrayNegocios[] = $value->id;
        // }
        // $productos = Productos::whereIn('negocio_id', $arrayNegocios)->orderBy('id', 'desc')->paginate(10);

        // opción 3
        $arrayNeg = Negocios::where('usuario_id', auth()->user()->id)->get()->pluck('id');
        $productos = Productos::whereIn('negocio_id', $arrayNeg)->orderBy('id', 'desc')->paginate(10);

        return view('productos.index', compact('productos'));
    }

    public function create ()
    {
        $negocios = Negocios::where('usuario_id', auth()->user()->id)->get();
        return view('productos.create', compact('negocios'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'imagen' => 'nullable|image|mimes:png,jpg,jpeg',
            'costo' => 'required|numeric',
            'descripcion' => 'nullable|string|min:10|max:500',
            'negocio_id' => 'required|exists:negocios,id',
        ]);

        if($request->file('imagen')){
            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('productos_') . '.png';
            if(!is_dir(public_path('/imagenes/productos/'))){
                File::makeDirectory(public_path().'/imagenes/productos/',0777,true);
            }
            $subido = $imagen->move(public_path().'/imagenes/productos/', $nombreImagen);
        } else {
            $nombreImagen = 'default.png';
        }

        $producto = new Productos();
        $producto->nombre = $request->nombre;
        $producto->imagen = $nombreImagen;
        $producto->costo = $request->costo;
        $producto->descripcion = $request->descripcion;
        $producto->estado = true;
        $producto->negocio_id = $request->negocio_id;
        if ($producto->save()) {
            return redirect('/productos')->with('success', 'Negocio creado con éxito');
        } else {
            return back()->with('error', 'No se pudo crear el Negocio');
        }

    }

    public function edit($id)
    {
        $negocios = Negocios::where('usuario_id', auth()->user()->id)->get();
        $producto = Productos::find($id);
        return view('productos.edit', compact('negocios', 'producto'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'imagen' => 'nullable|image|mimes:png,jpg,jpeg',
            'costo' => 'required|numeric',
            'descripcion' => 'nullable|string|min:10|max:500',
            'negocio_id' => 'required|exists:negocios,id',
        ]);

        $producto = Productos::find($id);

        if($request->file('imagen')){
            if($producto->imagen != 'default.png'){
                if(file_exists(public_path('/imagenes/productos/'.$producto->imagen))){
                    unlink(public_path('/imagenes/productos/'.$producto->imagen));
                }
            }
            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('productos_') . '.png';
            if(!is_dir(public_path('/imagenes/productos/'))){
                File::makeDirectory(public_path().'/imagenes/productos/',0777,true);
            }
            $subido = $imagen->move(public_path().'/imagenes/productos/', $nombreImagen);
            $producto->imagen = $nombreImagen;
        }

        $producto->nombre = $request->nombre;
        $producto->costo = $request->costo;
        $producto->descripcion = $request->descripcion;
        $producto->negocio_id = $request->negocio_id;
        $producto->estado = true;
        if ($producto->save()) {
            return redirect('/productos')->with('success', 'Negocio actualizado con éxito');
        } else {
            return back()->with('error', 'No se pudo actualizar el Negocio');
        }
    }

    public function estado($id)
    {
        $producto = Productos::find($id);
        $producto->estado = !$producto->estado;
        if ($producto->save()) {
            return redirect('/productos')->with('success', 'Negocio actualizado con éxito');
        } else {
            return back()->with('error', 'No se pudo actualizar el Negocio');
        }
    }
}
