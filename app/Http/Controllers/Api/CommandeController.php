<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Exception;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "status_code" => 200,
            "message" => "Toutes les commandes",
            "data" => Commande::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $commande = new Commande();

            $commande->nom = $request->nom;
            $commande->adresse = $request->adresse;
            $commande->telephone = $request->telephone;
            $commande->montant = $request->montant;

            $commande->save();

            return response()->json([
                "status_code" => 200,
                "message" =>  "Commande enregistrée",
                "data" => $commande
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
