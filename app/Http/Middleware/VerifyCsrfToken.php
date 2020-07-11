<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{

    protected $addHttpCookie = true;

    protected $except = [
        '/checkout/webpay/response',  //Agregar esta línea. Cambiar a tu ruta
        '/checkout/webpay/finish', //Agregar esta línea. Cambiar a tu ruta
    ];
}
