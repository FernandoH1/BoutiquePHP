<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function filtrosTalle()
    {
        $filtroTalle = DB::table('productos')
            ->select('talle')
            ->orderBy('talle', 'asc')
            ->distinct()->get();

        return $filtroTalle;
    }

    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }


    public function catalogoView(Request $request)
    {
        $texto = trim($request->get('buscar'));

        $filtroTalle = DB::table('productos')
            ->select('talle')
            ->orderBy('talle', 'asc')
            ->distinct()->get();

        $filtroColor = DB::table('productos')
            ->select('color')
            ->orderBy('color', 'asc')
            ->distinct()->get();

        $filtroMarca = DB::table('productos')
            ->select('marca')
            ->orderBy('marca', 'asc')
            ->distinct()->get();

        //Select * From productos
        $productos = DB::table('productos')->select('*')
            ->where('tipo', 'LIKE', '%' . $texto . '%')
            ->orWhere('marca', 'LIKE', '%' . $texto . '%')
            ->orderBy('tipo', 'asc')
            ->paginate(); //GOD

        return view('producto.catalogo', compact('productos', 'texto'))
            ->with(compact('filtroTalle'))
            ->with(compact('filtroColor'))
            ->with(compact('filtroMarca'));
    }

    public function productosVariables($talle, $color, $marca)
    {
        $filtroTalle = DB::table('productos')
            ->select('talle')
            ->orderBy('talle', 'asc')
            ->distinct()->get();

        $filtroColor = DB::table('productos')
            ->select('color')
            ->orderBy('color', 'asc')
            ->distinct()->get();

        $filtroMarca = DB::table('productos')
            ->select('marca')
            ->orderBy('marca', 'asc')
            ->distinct()->get();


        $productos = DB::table('productos')->select('*')
            ->where('talle', '=', $talle)
            ->orWhere('color', '=', $color)
            ->orWhere('marca', '=', $marca)
            ->paginate();

        return view('producto.catalogo', compact('productos'))
            ->with(compact('filtroTalle'))
            ->with(compact('filtroColor'))
            ->with(compact('filtroMarca'));
    }

    // View 
    public function productoOrdenarPorPrecio($orden)
    {
        $filtroTalle = DB::table('productos')
            ->select('talle')
            ->orderBy('talle', 'asc')
            ->distinct()->get();

        $filtroColor = DB::table('productos')
            ->select('color')
            ->orderBy('color', 'asc')
            ->distinct()->get();

        $filtroMarca = DB::table('productos')
            ->select('marca')
            ->orderBy('marca', 'asc')
            ->distinct()->get();

        if ($orden == 'mayor') {
            $productos = DB::table('productos')->select('*')
                ->orderByDesc('precio')
                ->paginate(10);
            return view('producto.catalogo', compact('productos'))
                ->with(compact('filtroTalle'))
                ->with(compact('filtroColor'))
                ->with(compact('filtroMarca'));
        }

        $productos = DB::table('productos')->select('*')
            ->orderBy('precio')
            ->paginate(10);
        return view('producto.catalogo', compact('productos'))
            ->with(compact('filtroTalle'))
            ->with(compact('filtroColor'))
            ->with(compact('filtroMarca'));
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
        
        $campos = [
            'foto'=>'required'
        ];

        $mensaje = [
            'required'=>'El: atributo es requerido',
            'foto.required' => 'La foto es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosProducto = request()->except('_token');
        if ($request->hasFile('foto')) {
            $datosProducto['foto'] = $request->file('foto')->store('uploads', 'public');
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
        $producto = Producto::findOrFail($id);

        return view('producto.edit', compact('producto') );
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

        $datosProducto = request()->except(['_token', '_method']);

        if ($request->hasFile('foto')) {
            $producto = Producto::findOrFail($producto->id);
            Storage::delete('public/' . $producto->foto);
            $datosProducto['foto'] = $request->file('foto')->store('uploads', 'public');
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
