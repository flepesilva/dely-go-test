<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompraAceptada;
use App\Mail\CompraAceptadaVendedor;


use Freshwork\Transbank\WebpayNormal;
use Freshwork\Transbank\RedirectorHelper;

use App\ShoppingCart;
use App\ProductInShoppingCart;
use App\Http\Resources\ProductsCollection;                                                                                                                                                                                                                                            

class CheckoutController extends Controller
{
    public function __construct(){
        $this->middleware("shopping_cart");
	}
	
	public function initTransaction(WebpayNormal $webpayNormal, Request $request)
	{
		$total = $request->shopping_cart->total();
		$idCart = $request->shopping_cart->getId();


		$webpayNormal->addTransactionDetail($total, $idCart);  
		$response = $webpayNormal->initTransaction(route('checkout.webpay.response'), route('checkout.webpay.finish')); 

		// Crear una orden o transacción en tu base de datos y guardar el token ahí para comparar resultados
		$carrito = ShoppingCart::find($idCart);

		$carrito->api_token = $response->token;

		$carrito->save();


		return RedirectorHelper::redirectHTML($response->url, $response->token);
	}

	public function response(WebpayNormal $webpayNormal)  
	{  
	  $result = $webpayNormal->getTransactionResult();  
	  session(['response' => $result]);
	  
	  // Revisar si la transacción fue exitosa ($result->detailOutput->responseCode === 0) o fallida para guardar ese resultado en tu base de datos. 

		if($result->detailOutput->responseCode === 0){
		
			$carrito = ShoppingCart::find($result->buyOrder);

			$statusResult = '0';
			$carrito->statusWebpay = $statusResult;
			$carrito->save();

		}else{
			
			$carrito = ShoppingCart::find($result->buyOrder);

			$statusResult = '-1';
			$carrito->statusWebpay = $statusResult;
			$carrito->save();
		}

		$webpayNormal->acknowledgeTransaction();

	  return RedirectorHelper::redirectBackNormal($result->urlRedirection);  
	}

	public function finish()  
	{
	  
	  //comparar los token

	  $tokenWebpay = $_POST['token_ws'];

	  $carrito = ShoppingCart::where('api_token', '=', $tokenWebpay)->first();

		if($carrito->statusWebpay == '0'){
			// MAIL PARA EL COMPRADOR
			Mail::to('test.laravel.delygo@gmail.com')->send(new CompraAceptada($carrito));

			// MAIL PARA EL VENDEDOR
			Mail::to('test.laravel.delygo@gmail.com')->send(new CompraAceptadaVendedor($carrito));

			return view('resultTransaction.aprobada', ['shopping_cart_webpay' => $carrito ]);

		}else{
			//transacion fallida, se debe enviar a una vista que diga que no resulto la transaccion
			return view('resultTransaction.fallida', ['shopping_cart_webpay' => $carrito ]);
		}

	}

	public function imprimir(Request $request)
	{
		$carrito_webpay = $request->id_webpay;
		$carrito = ShoppingCart::find($carrito_webpay);
		
		$pdf = \PDF::loadView('comprobante', compact('carrito'));
		return $pdf->download('comprobante.pdf');
	} 
}
