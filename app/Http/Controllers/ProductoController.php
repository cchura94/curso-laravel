<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;
use App\Categoria;
use App\Proveedor;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::All();
        return view('admin.producto.listar', compact("productos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::All();
        $proveedores = Proveedor::All();
        return view('admin.producto.crear', compact("categorias", "proveedores"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required|min:2|max:150",
            "precio" => "required",
            "cantidad" => "required",
            "categoria_id" => "required",
            "proveedor_id" => "required",
        ]);

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

        return redirect("/admin/producto");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.producto.mostrar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Categoria::All();
        $proveedores = Proveedor::All();
        $producto = Producto::find($id);
        return view('admin.producto.editar', compact('categorias', 'proveedores', 'producto'));
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
        $request->validate([
            "nombre" => "required|min:2|max:150",
            "precio" => "required",
            "cantidad" => "required",
            "categoria_id" => "required",
            "proveedor_id" => "required",
        ]);

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

        return redirect("/admin/producto");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
