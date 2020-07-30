@extends("layouts.admin") 

@section('titulo', 'Nuevo producto')

@section("contenedor")

<h1>Nuevo Producto</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form
    action="{{ route('producto.store') }}"
    method="post"
    enctype="multipart/form-data"
>
    @csrf
    <label for="">Nombre:</label>
    <input
        type="text"
        name="nombre"
        class="form-control @error('nombre') is-invalid @enderror"
        value="{{ old('nombre') }}"
    />
    @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    <label for="">Cantidad:</label>
    <input
        type="number"
        name="cantidad"
        class="form-control @error('cantidad') is-invalid @enderror"
        value="{{ old('cantidad') }}"
    />
    @error('cantidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    <label for="">Precio:</label>
    <input
        type="number"
        step="0.01"
        name="precio"
        class="form-control @error('precio') is-invalid @enderror"
        value="{{ old('precio') }}"
    />
    <label for="">imagen:</label>
    <input type="file" name="imagen" class="form-control" />
    <label for="">Categoria:</label>
    <select name="categoria_id" id="" class="form-control @error('categoria_id') is-invalid @enderror.">
        <option value="">Seleccionar una opcion</option>
        @foreach($categorias as $cat)
        <option {{ ($cat->id == old('categoria_id'))?'selected':'' }} value="{{ $cat->id }}"
            >
            {{ $cat->nombre }}
        </option>
        @endforeach
    </select>
    <label for="">Proveedor:</label>
    <select name="proveedor_id" id="" class="form-control">
        <option value="">Seleccionar una opcion</option>
        @foreach($proveedores as $prov)
        <option value="{{ $prov->id }}">{{ $prov->nombre }}</option>
        @endforeach
    </select>

    <input type="submit" class="btn btn-success" />
</form>

@endsection
