@extends("layouts.admin")

@section("contenedor")

<h1>Lista de Productos</h1>

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
    @foreach($productos as $prod)
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