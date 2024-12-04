<?php
//Prueba Técnica para Nerdcom
//Lic Informatica. José Perera
//Fecha: 04/12/2024


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class ProductsController extends Controller
{
    
    public function getAllProducts (){
        $product = Product::orderBy('id_producto', 'desc')->get();

        if ($product->isNotEmpty()) {
            return response()->json($product); 
        } else { 
            return response()->json(['message' => 'No hay productos.'], 200);
        }
    }

    public function getProductById($id) {
        $product = Product::find($id);

        if ($product) {
            return response()->json($product); 
        } else {
            return response()->json(['message' => 'Producto no encontrado.'], 200);
        }

    }

    public function createProduct(Request $request) { 
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:150',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
        ]);

        $product = Product::create([
            'nombre' => $validatedData['nombre'],
            'descripcion' => $validatedData['descripcion'],
            'precio' => $validatedData['precio'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return response()->json(['message' => 'Producto creado correctamente.', 'product' => $product], 200); 
    }

    public function updateProduct(Request $request, $id) {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:150',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
        ]); 

        $product = Product::findOrFail($id);
        $validatedData['updated_at'] = Carbon::now();
        $product->update($validatedData);

        return response()->json(['message' => 'Producto actualizado correctamente.', 'product' => $product], 200); 
    }


    public function deleteProduct($id) {
        
        if (!is_numeric($id) || $id <= 0) {
            return response()->json(['message' => 'ID de producto inválido.'], 400, [], JSON_UNESCAPED_UNICODE);
        }

        $product = Product::find($id);
        
        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Producto eliminado correctamente.'], 200, [], JSON_UNESCAPED_UNICODE);
        } else {
            return response()->json(['message' => 'Producto no encontrado.'], 404, [], JSON_UNESCAPED_UNICODE);
        }
    }

}
