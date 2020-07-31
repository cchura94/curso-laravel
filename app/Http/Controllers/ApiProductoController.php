<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ApiProductoController extends Controller
{
    /**
     * Lista de los productos peticion get
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate(10);
        return response()->json(["productos" => $productos], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod = new Producto;
        $prod->nombre = $request->nombre;
        $prod->cantidad = $request->cantidad;
        $prod->precio = $request->precio;
        $prod->categoria_id = $request->categoria_id;
        $prod->proveedor_id = $request->proveedor_id;
        $prod->descripcion = $request->descripcion;

        if($file = $request->file("imagen")){
            $nombre_archivo = $file->getClientOriginalName();
            $file->move("img/productos", $nombre_archivo);
        
        $prod->imagen = "/img/productos/" . $nombre_archivo;
        }
        $prod->save();

        return response()->json(["mensaje" => "Producto registrado"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        $producto->categoria;
        if($producto){
            return response()->json($producto, 200);
        }else{
            return response()->json(["mensaje" => "Producto no encontrado"], 200);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prod = Producto::find($id);
        $prod->nombre = $request->nombre;
        $prod->cantidad = $request->cantidad;
        $prod->precio = $request->precio;
        $prod->categoria_id = $request->categoria_id;
        $prod->proveedor_id = $request->proveedor_id;
        $prod->descripcion = $request->descripcion;

        if($file = $request->file("imagen")){
            $nombre_archivo = $file->getClientOriginalName();
            $file->move("img/productos", $nombre_archivo);
        
        $prod->imagen = "/img/productos/" . $nombre_archivo;
        }
        $prod->save();

        return response()->json(["mensaje" => "Producto modificado"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Producto::find($id);
        $prod->delete();
        return response()->json(["mensaje" => "Producto eliminado"], 200);
    
    }
}
