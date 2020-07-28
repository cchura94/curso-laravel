@extends("layouts.admin")

@section("contenedor")

<h1>Mostrar categoria</h1>


    <label for="">NOMBRE</label>
    <input type="text" class="form-control" name="nombre" value="{{ $categoria->nombre }}" disabled>
    <label for="">Descripción:</label>

    <textarea name="descripcion" class="form-control" disabled>{{ $categoria->descripcion }}</textarea>

    <hr>
    <h2>Lista de Productos</h2>
    <table class="table">
    <tr>
        <td>ID</td>
        <td>NOMBRE</td>
        <td>PRECIO</td>
        <td>CANTIDAD</td>
        <td>IMAGEN</td>
        <td>CATEGORIA</td>
        <td>ACCIONES</td>
    </tr>
    @foreach($categoria->productos as $prod)
    <tr>
        <td>{{ $prod->id }}</td>
        <td>{{ $prod->nombre }}</td>
        <td>{{ $prod->precio }}</td>
        <td>{{ $prod->cantidad }}</td>
        <td>
        </td>
        <td>{{ $prod->categoria->nombre }}</td>
        <td>
        </td>
    </tr>
    @endforeach
</table>

@endsection