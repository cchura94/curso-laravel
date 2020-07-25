@extends("layouts.admin")

@section("contenedor")

<h1>Editar categoria</h1>

<form action="{{ route('categoria.update', $categoria->id) }}" method="post">
    @csrf
    @Method('PUT')

    <label for="">NOMBRE</label>
    <input type="text" class="form-control" name="nombre" value="{{ $categoria->nombre }}">
    <label for="">Descripción:</label>

    <textarea name="descripcion" class="form-control">{{ $categoria->descripcion }}</textarea>

    <input type="submit" value="Modificar Categoria" class="btn btn-warning">

</form>

@endsection