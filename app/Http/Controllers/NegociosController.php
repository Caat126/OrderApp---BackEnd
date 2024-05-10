<?php

namespace App\Http\Controllers;

use App\Models\Negocios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Productos;

class NegociosController extends Controller
{
    public function index()
    {
        $negocios = Negocios::orderBy('id', 'desc')->paginate(10);
        return view('negocios.index', compact('negocios'));
    }

    public function create ()
    {
        return view('negocios.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:negocios',
            'imagen' => 'nullable|image|mimes:png,jpg,jpeg',
            'descripcion' => 'nullable|string|min:10|max:500',
        ]);

        if($request->file('imagen')){
            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('negocios_') . '.png';
            if(!is_dir(public_path('/imagenes/negocios/'))){
                File::makeDirectory(public_path().'/imagenes/negocios/',0777,true);
            }
            $subido = $imagen->move(public_path().'/imagenes/negocios/', $nombreImagen);
        } else {
            $nombreImagen = 'default.png';
        }

        $negocio = new Negocios();
        $negocio->nombre = $request->nombre;
        $negocio->imagen = $nombreImagen;
        $negocio->descripcion = $request->descripcion;
        $negocio->estado = true;
        $negocio->usuario_id = auth()->user()->id;
        if ($negocio->save()) {
            return redirect('/negocios')->with('success', 'Negocio creado con éxito');
        } else {
            return back()->with('error', 'No se pudo crear el Negocio');
        }
    }

    public function edit($id)
    {
        $negocio = Negocios::find($id);
        return view('negocios.edit', compact('negocio'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:negocios,nombre,' .$id,
            'imagen' => 'nullable|image|mimes:png,jpg,jpeg',
            'descripcion' => 'nullable|string|min:10|max:500',
        ]);

        $negocio = Negocios::find($id);

        if($request->file('imagen')){
            if($negocio->imagen != 'default.png'){
                if(file_exists(public_path('/imagenes/negocios/'.$negocio->imagen))){
                    unlink(public_path('/imagenes/negocios/'.$negocio->imagen));
                }
            }

            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('negocios_') . '.png';
            if(!is_dir(public_path('/imagenes/negocios/'))){
                File::makeDirectory(public_path().'/imagenes/negocios/',0777,true);
            }
            $subido = $imagen->move(public_path().'/imagenes/negocios/', $nombreImagen);
            $negocio->imagen = $nombreImagen;
        }

        $negocio->nombre = $request->nombre;
        $negocio->descripcion = $request->descripcion;
        $negocio->estado = true;
        $negocio->usuario_id = auth()->user()->id;
        if ($negocio->save()) {
            return redirect('/negocios')->with('success', 'Negocio actualizado con éxito');
        } else {
            return back()->with('error', 'No se pudo actualizar el Negocio');
        }

    }

    public function estado($id)
    {
        $negocio = Negocios::find($id);
        $negocio->estado = !$negocio->estado;
        if ($negocio->save()) {
            return redirect('/negocios')->with('success', 'Estado actualizado con éxito');
        } else {
            return back()->with('error', 'No se pudo actualizar el estado');
        }
    }

    public function show($id)
    {
        $negocio = Negocios::find($id);
        $productos = Productos::where('negocio_id', $id)->orderBy('id', 'desc')->paginate(10);
        return view('negocios.show', compact('negocio', 'productos'));
    }
}
