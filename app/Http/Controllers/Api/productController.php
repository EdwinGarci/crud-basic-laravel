<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    public function index()
    {
        try {
            $products = Product::all();

            if ($products->isEmpty()) {
                return response()->json([
                    'message' => 'No hay productos registrados',
                    'status' => 404,
                ], 404);
            }

            return response()->json([
                'products' => $products,
                'status' => 200,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Se produjo un error al obtener productos',
                'error' => $th->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $product = Product::find($id);
            if (!$product) {
                return response()->json([
                    'message' => 'No se encontró el producto',
                    'status' => 404,
                ], 404);
            }

            return response()->json([
                'product' => $product,
                'status' => 200,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Se produjo un error al obtener producto',
                'error' => $th->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:100',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'stock' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return  response()->json([
                    'message' => 'Error en la validación de los datos',
                    'errors' => $validator->errors(),
                    'status' => 422,
                ], 422);
            }

            $product = Product::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
            ]);

            if (!$product) {
                return response()->json([
                    'message' => 'Error al crear el producto',
                    'status' => 500,
                ], 500);
            }

            return response()->json([
                'message' => 'Producto creado con éxito',
                'product' => $product,
                'status' => 201,
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error al crear producto',
                'error' => $th->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            if (!$product) {
                return response()->json([
                    'message' => 'Producto no encontrado',
                    'status' => 404,
                ], 404);
            }
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:100',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'stock' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error de validación',
                    'errors' => $validator->errors(),
                    'status' => 422,
                ], 422);
            }

            $product->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
            ]);

            return response()->json([
                'message' => 'Producto actualizado con éxito',
                'product' => $product,
                'status' => 200,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error al actualizar producto',
                'error' => $th->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            if (!$product) {
                return response()->json([
                    'message' => 'Producto no encontrado',
                    'status' => 404,
                ], 404);
            }
            $product->delete();
            return response()->json([
                'message' => 'Producto eliminado con éxito',
                'status' => 200,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error al eliminar producto',
                'error' => $th->getMessage(),
                'status' => 500,
            ], 500);
        }
    }
}
