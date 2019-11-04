<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Producto::all(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Producto::create([
            'nombre' => $request->nombre,
            'detalle' => $request->detalle,
            'stock' => $request->stock,
            'precio' => $request->precio,
            'imagen' => $request->imagen
        ]);

        return response()->json([
            'status' => (bool) $product,
            'data'   => $product,
            'message' => $product ? 'Producto Creado!' : 'Error Creando Producto'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return response()->json($producto,200);
    }

    public function uploadFile(Request $request)
    {
        if($request->hasFile('imagen')){
            $name = time()."_".$request->file('imagen')->getClientOriginalName();
            $request->file('imagen')->move(public_path('images'), $name);
        }
        return response()->json(asset("images/$name"),201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $status = $producto->update(
            $request->only(['nombre', 'detalle', 'stock', 'precio', 'imagen'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Producto Actualizado!' : 'Error Actualizando Producto'
        ]);
    }

    public function updateStock(Request $request, Producto $producto)
        {
            $producto->stock = $producto->stock + $request->get('stock');
            $status = $producto->save();

            return response()->json([
                'status' => $status,
                'message' => $status ? 'Stock Añadido!' : 'Error Añadiendo Stock'
            ]);
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $status = $producto->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Producto Eliminado!' : 'Error ELiminando Producto'
        ]);
    }
}
