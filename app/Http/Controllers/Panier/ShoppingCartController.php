<?php

namespace App\Http\Controllers\Panier;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{

    public function addToCart(Request $request)
    {
        Cart::add($request->id,$request->libelle,1,$request->prix,["image" => $request->image]);

        return response()->json([
            'status_code' => 200,
            "message" => "Produit ajouté au panier"
        ]);

    }

    public function showCart()
    {

        $data = Cart::content();
        return response()->json([
            'status_code' => 200,
            "message" => "Tous les produits du panier",
            "data" => $data,
            "total" => Cart::subtotal()
        ]);
    }

    public function deleteCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json([
            'status_code' => 200,
            "message" => "Produit supprimé du panier"
        ]);
    }

    public function vider()
    {
        Cart::destroy();
        return response()->json([
            'status_code' => 200,
            "message" => "Panier Vidé"
        ]);
    }
}
