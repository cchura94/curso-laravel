<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function listar()
    {
        return view("admin.persona.listar");
    }

    public function crear()
    {
        return view("admin.persona.crear");
    }

    public function guardar(Request $request)
    {
        return $request;
    }

    public function mostrar($id)
    {
        return view("admin.persona.mostrar");
    }

    public function editar($id)
    {
        return view("admin.persona.editar");
    }

    public function modificar(Request $request, $id)
    {
        return $request;
    }

    public function eliminar($id)
    {
        return "Eliminando: $id";
    }
}
