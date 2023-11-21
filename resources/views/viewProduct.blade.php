@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles del Producto</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $product->id }}</h5>
                <p class="card-text">SKU: {{ $product->sku }}</p>
                <p class="card-text">Nombre del Producto: {{ $product->nombre_producto }}</p>
                <p class="card-text">Cantidad: {{ $product->cantidad }}</p>
                <p class="card-text">Precio: {{ $product->precio }}</p>
                <p class="card-text">Estado: {{ $product->estado ? 'Activo' : 'Inactivo' }}</p>
            </div>
        </div>
    </div>
@endsection