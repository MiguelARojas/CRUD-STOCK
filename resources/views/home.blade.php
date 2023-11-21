@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Productos') }}</div>

                    <div class="card-body">
                        @if ($products->isEmpty())
                            <div>
                                <center>
                                    <span>
                                        No hay productos en el inventario
                                    </span>
                                </center>
                            </div>
                        @else
                        <div style="margin-left:85%;">
                            <a href="{{ route('addProduct') }}">
                                <button type="button" class="btn btn-success">Add Product </button>
                            </a>
                        </div>
                        <br>
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>SKU</th>
                                    <th>Nombre del Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Ver Detalles</th>
                                    <th>Modificar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->nombre_producto }}</td>
                                        <td>{{ $product->cantidad }}</td>
                                        <td>{{ $product->precio }}</td>
                                        <td><a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">Ver Detalles</a></td>
                                        <td><a href="{{ route('products.modify', $product) }}" class="btn btn-warning btn-sm">Modificar</a></td>
                                        <td>
                                            <form action="{{ route('products.destroy') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
