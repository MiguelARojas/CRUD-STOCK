<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class productsController extends Controller
{
    // SELECT PRODUCTOS
    public function create()
    {
        $products = Productos::all()->where('estado', 1);
        return view('home', ['products' => $products]);
    }

    // ALMACENAR EL PRODUCTO
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'sku' => 'required|min:4|regex:/^[0-9-]+$/',
            'nombre_producto' => 'required|string|max:60',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric',
        ], [
            'sku' => 'El campo SKU solo puede contener 4 caracteres (números y guiones).',
            'nombre_producto' => 'El campo nombre del producto debe ser una cadena de texto max 60 caracteres',
            'cantidad' => 'El campo cantidad debe ser numerico y min 1',
            'precio' => 'El campo de precio debe ser numerico',
        ]);

        // Crear un nuevo producto en la base de datos
        $producto = new Productos();
        $producto->sku = $request->input('sku');
        $producto->nombre_producto = $request->input('nombre_producto');
        $producto->cantidad = $request->input('cantidad');
        $producto->precio = $request->input('precio');

        // Guardar el producto
        $producto->save();

        // Redireccionar a la vista de productos o a donde desees
        return redirect()->route('home')->with('success', 'Producto añadido correctamente');
    }

    // MOSTRAR EL PRODUCTO
    public function show(Productos $product)
    {   
        return view('viewProduct', ['product' => $product]);
    }

    // MODIFICAR PRODUCTO
    public function update(Request $request)
    {   
        // Validar los datos del formulario
        $request->validate([
            'sku' => 'required|min:4|regex:/^[0-9-]+$/',
            'nombre_producto' => 'required|string|max:60',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric',
        ], [
            'sku' => 'El campo SKU solo puede contener 4 caracteres (números y guiones).',
            'nombre_producto' => 'El campo nombre del producto debe ser una cadena de texto max 60 caracteres',
            'cantidad' => 'El campo cantidad debe ser numerico y min 1',
            'precio' => 'El campo de precio debe ser numerico',
        ]);

        // Asegurar que el campo estado sea un booleano y asignarle el valor 1 por defecto

        $producto = Productos::where('id', $request->id)->first();
        // Crear un nuevo producto en la base de datos
        $producto->sku = $request->input('sku');
        $producto->nombre_producto = $request->input('nombre_producto');
        $producto->cantidad = $request->input('cantidad');
        $producto->precio = $request->input('precio');

        // Guardar el producto
        $producto->update();

        // Redireccionar a la vista de productos o a donde desees
        return redirect()->route('home')->with('success', 'Producto actualizado correctamente');
    }

    public function modify(Productos $product)
    {
        return view('modifyProduct', ['product' => $product]);
    }

    public function destroy(Request $request)
    {   
        $product = Productos::where('id', $request->id)->first();
        $product->estado = 0;
        // Guardar el producto
        $product->update();

        // Redireccionar a la vista de productos o a donde desees
        return redirect()->route('home')->with('success', 'Producto actualizado correctamente');
    }
}
