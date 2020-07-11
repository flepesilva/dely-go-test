<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductsCollection;
use App\ShoppingCart;

class ShoppingCartController extends Controller
{
    public function __construct(){
        $this->middleware('shopping_cart');
    }

    public function show(Request $request){
        return view('shopping_cart.show', ['shopping_cart' => $request->shopping_cart]);
    }
    public function confirm(Request $request){

        $idCart = $request->shopping_cart->getId();
        
        $carrito = ShoppingCart::find($idCart);
    
        $carrito->nombreComprador = $request->nombreCarrito;
        $carrito->emailComprador = $request->emailCarrito;
        $carrito->direccionComprador = $request->direccionCarrito;
        $carrito->celularComprador = $request->celularCarrito;

        $carrito->save();

    
        return redirect()->route("checkout");

    }

    public function products(Request $request){
        return new ProductsCollection($request->shopping_cart->products()->get());
    }

    public function total(){
        return ShoppingCart::products()->sum('price');
    }


}
