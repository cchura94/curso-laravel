@extends("layouts.admin")

@section("contenedor")

<h1>Mostrar categoria</h1>


    <label for="">NOMBRE</label>
    <input type="text" class="form-control" name="nombre" value="{{ $categoria->nombre }}" disabled>
    <label for="">Descripción:</label>

    <textarea name="descripcion" class="form-control" disabled>{{ $categoria->descripcion }}</textarea>

    

@endsection