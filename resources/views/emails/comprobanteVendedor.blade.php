<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje nuevo</title>
</head>
<body style="background-color:white;">


    <h1 style="font-family: arial,helvetica,sans-serif;"><font size="5">¡Gracias!</font></h1>
    <hr>

    <div class="container">

        <h3>Hola  {{$carrito->nombreComprador}}:</h3>
        <p>Ha sido aceptada una compra, a continuacion se mostrara la informacion del vendedor y las compras realizadas, ¡Exito!.</p>
        <br>
        <h3 style="text-align: center;">Carrito de compras</h3>
        <br>
        <div style="text-align: center;">
            <table border="1" style="margin: 30px auto; width: 400px; text-align: left; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>   
                        
                    </tr>
                </thead>

                <tbody>
                    @foreach($carrito->products as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>${{$product->price}}</td>
                        
                    </tr>    
                    @endforeach
                </tbody>
                <thead>
                    <tr>
                        <th>Total</th>
                        <th>${{$carrito->total()}}</th>
                    </tr>
                </thead>
            </table>
        </div>


        <h3 style="text-align: center;">Informacion del comprador</h3>


        <div style="text-align: center;">
            <table border="1" style="margin: 30px auto; width: 400px; text-align: left; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>ID de su pedido</th>
                        <td>{{$carrito->id}}</td>   
                        
                    </tr>
                </thead>

                <thead>
                    <tr>
                        <th>Nombre</th>
                        <td>{{$carrito->nombreComprador}}</td>
                    </tr>
                </thead>

                <thead>
                    <tr>
                        <th>Email</th>
                        <td>{{$carrito->emailComprador}}</td>
                    </tr>
                </thead>

                <thead>
                    <tr>
                        <th>Direccion</th>
                        <td>{{$carrito->direccionComprador}}</td>
                    </tr>
                </thead>

                <thead>
                    <tr>
                        <th>Celular</th>
                        <td>{{$carrito->celularComprador}}</td>
                    </tr>
                </thead>
            </table>
        </div>

    </div>

</body>
</html>