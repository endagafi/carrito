<?php

namespace App\Http\Controllers;

use App\Accessorio;
use Illuminate\Http\Request;

class AccessorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Accesorio::all(),200);
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
        $product = Accesorio::create([
            'nombre' => $request->nombre,
            'detalle' => $request->detalle,
            'id_producto'=> $request->id_producto,
            'stock' => $request->stock,
            'precio' => $request->precio,
            'imagen' => $request->imagen
        ]);

        return response()->json([
            'status' => (bool) $product,
            'data'   => $product,
            'message' => $product ? 'Accesorio Creado!' : 'Error Creando Accesorio'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accesorio  $accesorio
     * @return \Illuminate\Http\Response
     */
    public function show(Accesorio $accesorio)
    {
        return response()->json($accesorio,200);
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
     * @param  \App\Accesorio  $accesorio
     * @return \Illuminate\Http\Response
     */
    public function edit(Accesorio $accesorio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accesorio  $accesorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accesorio $accesorio)
    {
        $status = $accesorio->update(
            $request->only(['nombre', 'detalle', 'stock', 'precio', 'imagen'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Accesorio Actualizado!' : 'Error Actualizando Accesorio'
        ]);
    }

    public function updateStock(Request $request, Accesorio $accesorio)
        {
            $accesorio->stock = $accesorio->stock + $request->get('stock');
            $status = $accesorio->save();

            return response()->json([
                'status' => $status,
                'message' => $status ? 'Stock Añadido!' : 'Error Añadiendo Stock'
            ]);
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accesorio  $accesorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accesorio $accesorio)
    {
        $status = $accesorio->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Accesorio Eliminado!' : 'Error ELiminando Accesorio'
        ]);
    }
}
