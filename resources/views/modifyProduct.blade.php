@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Modificar Producto</h2>
        <form action="{{ route('products.update') }}" method="post">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="mb-3">
                <label for="sku" class="form-label">SKU:</label>
                <input type="text" class="form-control" id="sku" name="sku" required value="{{$product->sku}}">
                <input type="hidden" name="id" value="{{$product->id}}">
            </div>
            <div class="mb-3">
                <label for="nombre_producto" class="form-label">Nombre del Producto:</label>
                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required value="{{$product->nombre_producto}}">
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required value="{{$product->cantidad}}">
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio:</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" required value="{{$product->precio}}">
            </div>
            <button type="submit" class="btn btn-primary">Modificar Producto</button>
        </form>
    </div>
@endsection