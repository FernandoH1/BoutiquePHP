<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        return view('producto.create', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Producto::$rules);

        $datosProducto = request()->except('_token');
        if($request->hasFile('foto')){
            $datosProducto['foto']=$request->file('foto')->store('uploads','public');
        }

        
        $producto = Producto::create($datosProducto);

        return redirect()->route('producto.index')
            ->with('success', 'El Producto se a Creado con Éxito!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$rules);

        $datosProducto = request()->except(['_token','_method']);
        if($request->hasFile('foto')){
            $producto=Producto::findOrFail($producto->id);
            Storage::delete('public/'.$producto->foto);
            $datosProducto['foto']=$request->file('foto')->store('uploads','public');

        }

        $producto->update($datosProducto);

        return redirect()->route('producto.index')
            ->with('success', 'Producto Editado con Éxito!!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('producto.index')
            ->with('success', 'El Producto Se Elimino Correctamente!!');
    }
}
