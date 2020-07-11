<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

use App\Http\Resources\ProductsCollection;

class ProductsController extends Controller 
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    // Muestra una coleccion del recurso
    public function index(Request $request)
    {

        $products = Product::paginate(15);

        if($request->wantsJson()){
            return new ProductsCollection($products);
        }

        return view('products.index', ['products' => $products]);
    }

    // Mostramos un formulario para crear nuevos productos
    public function create()
    {
        $product = new Product;
        return view('products.create', ["product" => $product]);
    }

    //Almacenar en la base de dato nuevos productos
    public function store(Request $request)
    {
        $options = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ];
        if(Product::create($options)){
            return redirect('/');
        }else{
            return view('producto.create');

        }
    }

    //Muestra un producto
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show', ['product' => $product]);
    }

    //Muestra un formulario para editar un producto
    public function edit($id)
    {
        $product = Product::find($id);
        return view("products.edit", ["product" => $product]);
    }

    //Actualizar un producto en especifico
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;

        if($product->save()){
            return redirect('/');
        }else{
            return view("products.edit", ["product" => $product]);
        }

    }

    //Elimina un producto
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/productos');
    }
}
