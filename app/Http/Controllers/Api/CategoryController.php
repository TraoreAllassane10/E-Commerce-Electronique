<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'code_status' => 200,
            'message' => "Categorie enregistrée",
            'data' => Category::withCount('products')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {

            $category = new Category();
            $category->nom = $request->nom;
            $category->save();

            return response()->json([
                'code_status' => 200,
                'message' => "Categorie enregistrée",
                'data' => $category
            ]);

        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category->nom = $request->nom;
            $category->save();

            return response()->json([
                'code_status' => 200,
                'message' => "Categorie Modifiée",
                'data' => $category
            ]);

        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
