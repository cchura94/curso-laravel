@extends("layouts.admin") @section("contenedor")

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
        class="form-control"
        value="{{ old('nombre') }}"
    />
    <label for="">Cantidad:</label>
    <input
        type="number"
        name="cantidad"
        class="form-control"
        value="{{ old('cantidad') }}"
    />
    <label for="">Precio:</label>
    <input
        type="number"
        step="0.01"
        name="precio"
        class="form-control"
        value="{{ old('precio') }}"
    />
    <label for="">imagen:</label>
    <input type="file" name="imagen" class="form-control" />
    <label for="">Categoria:</label>
    <select name="categoria_id" id="" class="form-control">
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
