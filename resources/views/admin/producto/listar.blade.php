@extends("layouts.admin")

@section("contenedor")

<h1>Lista de Productos</h1>

<a href="{{ route('producto.create') }}" class="btn btn-primary">Nuevo Producto</a>

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
            <img src="{{ asset($prod->imagen) }}" width="60px" alt="">
        </td>
        <td>{{ $prod->categoria->nombre }}</td>
        <td>
            <a href="{{ route('producto.edit', $prod->id) }}" class="btn btn-warning">editar</a>
        </td>
    </tr>
    @endforeach
</table>

@endsection