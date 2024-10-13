<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return response()->json([
            'code_status' => 200,
            'message' => "Tous les produits",
            'data' => Product::with('category')->get()
        ]);
    }

    public function store(ProductRequest $request)
    {
        try {

            $image = $request->image;
            $path = $image->store('images', 'public');

            $product = new Product();

            $product->libelle = $request->libelle;
            $product->description = $request->description;
            $product->image = $path;
            $product->prix = $request->prix;
            $product->category_id = $request->category_id;

            $product->save();

            return response()->json([
                'code_status' => 200,
                'message' => "produit enregistré",
                'data' => $product
            ]);

        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function show(Product $product)
    {
        return response()->json([
            'code_status' => 200,
            'message' => "produit n°".$product->id,
            'data' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        try {

            $product->libelle = $request->libelle;
            $product->description = $request->description;
            $product->image = $request->image;
            $product->prix = $request->prix;
            $product->category_id = $request->category_id;

            $product->save();

            return response()->json([
                'code_status' => 200,
                'message' => "produit modifié",
                'data' => $product
            ]);

        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function destroy(Product $product)
    {
        try {

            $product->delete();
            return response()->json([
                'code_status' => 200,
                'message' => "produit supprimé",
                'data' => $product
            ]);

        } catch (Exception $e) {
            return response()->json($e);
        }
    }



    public function produitParCategorie($id)
    {
        return response()->json([
            'code_status' => 200,
            'message' => "Tous les produits",
            'data' => Product::where('category_id',$id)->get()
        ]);
    }

    public function fiveProduits($id)
    {
        return response()->json([
            'code_status' => 200,
            'message' => "Tous les produits",
            'data' => Product::where('category_id',$id)->limit(5)->get()
        ]);
    }



}
