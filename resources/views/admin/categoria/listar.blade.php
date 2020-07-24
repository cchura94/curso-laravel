@extends("layouts.admin")

@section("contenedor")

<h1>Lista de categorias</h1>
{{ $categorias }}
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>DESCRIPCION</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categorias as $cat)
        <tr>
            <td><?= $cat->id ?></td>
            <td>{{ $cat->nombre }}</td>
            <td>{{ $cat->descripcion }}</td>
            <td>
                <a href="" class="btn btn-success btn-xs">ver</a>
                <a href="" class="btn btn-warning btn-xs">editar</a>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>

@endsection