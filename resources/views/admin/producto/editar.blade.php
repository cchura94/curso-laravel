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
    action="{{ route('producto.update', $producto->id) }}"
    method="post"
    enctype="multipart/form-data"
>
    @csrf
    @Method('PUT')
    <label for="">Nombre:</label>
    <input
        type="text"
        name="nombre"
        class="form-control"
        value="{{$producto->nombre}}"
    />
    <label for="">Cantidad:</label>
    <input
        type="number"
        name="cantidad"
        class="form-control"
        value="{{$producto->cantidad}}"
    />
    <label for="">Precio:</label>
    <input
        type="number"
        step="0.01"
        name="precio"
        class="form-control"
        value="{{$producto->precio}}"
    />
    <label for="">imagen:</label>
    <img src="{{ asset($producto->imagen)}}" width="300px" alt="">
    <input type="file" name="imagen" class="form-control" />
    <label for="">Categoria:</label>
    <select name="categoria_id" id="" class="form-control">
        <option value="">Seleccionar una opcion</option>
        @foreach($categorias as $cat)
        <option {{ ($cat->id == $producto->categoria_id)?'selected':'' }} value="{{ $cat->id }}"
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
