<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Listar
        //$categorias = DB::select("select * from categorias");
        //$categorias = DB::table("categorias")->where('nombre',"=",'ropa')->get();
        $categorias = Categoria::paginate(3);
        
        //return view("admin.categoria.listar", ["categorias" => $categorias]);
        //return view("admin.categoria.listar")->with('categorias', $categorias);
        return view("admin.categoria.listar", compact("categorias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Cargar el formulario (GET)
        return view("admin.categoria.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Guardar un recurso (POST)

        //Validacion el lado del servidor
        $request->validate([
            "nombre" => "required|min:2|max:100|unique:categorias"
        ]);

        //Guardar la información
        $cat = new Categoria;
        $cat->nombre = $request->nombre;
        $cat->descripcion = $request->descripcion;
        $cat->save();
        return redirect("/admin/categoria")->with("ok", "Categoria Registrada");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Cargar datos por id (GET)
        $categoria = Categoria::find($id);
        return view("admin.categoria.mostrar", compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // cargar un formulario con un recurso (GET)
        $categoria = Categoria::find($id);
        return view("admin.categoria.editar", compact('categoria'));
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
        // Modificar un recurso (PUT)
        //validar
        //mofificar
        $cat = Categoria::find($id);
        $cat->nombre = $request->nombre;
        $cat->descripcion = $request->descripcion;
        $cat->save();
        return redirect("/admin/categoria")->with('ok', "Categoria Modificada");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar un recurso (DELETE)
        $cat = Categoria::find($id);
        $cat->delete();
        return redirect("/admin/categoria")->with("ok", "Categoria Eliminada");
    }
}
