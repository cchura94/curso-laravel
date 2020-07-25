@extends("layouts.admin")

@section("contenedor")

<h1>Nueva categoria</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categoria.store') }}" method="post">
    @csrf

    <label for="">NOMBRE</label>
    <input type="text" class="form-control" name="nombre">
    <label for="">Descripción:</label>

    <textarea name="descripcion" class="form-control"></textarea>

    <input type="submit" value="Guardar Categoria">

</form>

@endsection