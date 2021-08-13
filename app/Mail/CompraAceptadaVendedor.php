<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompraAceptada extends Mailable
{
    use Queueable, SerializesModels;

    public $asunto = "Mensaje formulario ";
    public $carrito;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($carrito)
    {
        $this->carrito = $carrito;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('¡Compra aceptada en DelyGo!')->view('emails.comprobanteVendedor');
    }
}