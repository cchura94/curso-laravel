@extends("layouts.admin")

@section("contenedor")


<h1>Lista de categorias</h1>
<!-- {{ $categorias }} -->

@if(session('ok'))
    <div class="alert alert-success">
        <p>{{ session('ok') }}</p>
    </div>
@endif

<a href="/admin/categoria/create" class="btn btn-primary">Nueva Categoria</a>
<a href="{{ route('categoria.create') }}" class="btn btn-info">Nueva Categoria</a>
<a href="{{ url('/admin/categoria/create') }}" class="btn btn-info">Nueva Categoria</a>


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
                <a href="{{ route('categoria.show', $cat->id) }}" class="btn btn-success btn-xs">ver</a>
                <a href="{{ route('categoria.edit', $cat->id) }}" class="btn btn-warning btn-xs">editar</a>

                <form action="{{ route('categoria.destroy', $cat->id) }}" method="post">
                    @csrf
                    @Method('DELETE')
                    <input type="submit" value="eliminar" class="btn btn-danger btn-xs">
                </form>

            </td>
        </tr>
    @endforeach
    </tbody>

</table>

@endsection