<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje nuevo</title>
</head>
<body style="background-color:white;">


    <h1 style="text-align: center; font-family: arial,helvetica,sans-serif;"><font size="7">¡Gracias!</font></h1>
    <hr>

    <div class="w3-container" style="padding: 40px 20px; margin: 24px -20px;">

        <h3 style="text-align: center; font-family: arial,helvetica,sans-serif;"><font size="5">Hola  {{$carrito->nombreComprador}}: </font></h3>
        <p style="text-align: center; font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;"><font size="5">Su compra a sido aceptada por nuestro sistema y a la brevedad tomaremos contacto con usted, debe tomar en cuenta que este correo es automatico.</font></p>
        <br>
        <h3 style="text-align: center; font-family: arial,helvetica,sans-serif;"><font size="5">Carrito de compras</font></h3>
        <br>
        <div style="text-align: center;">
            <table border="1" style="margin: 30px auto; width: 400px; text-align: left; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="font-family: arial,helvetica,sans-serif; text-align: center;"><font size="5">Producto</font></th>
                        <th style="font-family: arial,helvetica,sans-serif; text-align: center;"><font size="5">Precio</font></th>   
                        
                    </tr>
                </thead>

                <tbody>
                    @foreach($carrito->products as $product)
                    <tr>
                        <td style="font-family: arial,helvetica,sans-serif; text-align: center;"><font size="5">{{$product->title}}</font></td>
                        <td style="font-family: arial,helvetica,sans-serif; text-align: center;"><font size="5">${{$product->price}}</font></td>
                        
                    </tr>    
                    @endforeach
                </tbody>
                <thead>
                    <tr>
                        <th style="font-family: arial,helvetica,sans-serif; text-align: center;"><font size="5">Total  </font></th>
                        <th style="font-family: arial,helvetica,sans-serif; text-align: center;"><font size="5">${{$carrito->total()}}  </font></th>
                    </tr>
                </thead>
            </table>
        </div>


        <h3 style="text-align: center; font-family: arial,helvetica,sans-serif;"><font size="5">Informacion del comprador</font></h3>


        <div style="text-align: center;">
            <table border="1" style="margin: 30px auto; width: 400px; text-align: left; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="font-family: arial,helvetica,sans-serif; text-align: center;"><font size="5">ID de su pedido</font></th>
                        <td style="font-family: arial,helvetica,sans-serif; text-align: center;"><font size="5">{{$carrito->id}}</font></td>   
                        
                    </tr>
                </thead>

                <thead>
                    <tr>
                        <th style="font-family: arial,helvetica,sans-serif; text-align: center;"><font size="5">Nombre  </font></th>
                        <td style="font-family: arial,helvetica,sans-serif; text-align: center;"><font size="5">{{$carrito->nombreComprador}}  </font></td>
                    </tr>
                </thead>

                <thead>
                    <tr>
                        <th style="font-family: arial,helvetica,sans-serif; text-align: center;"><font size="5">Email  </font></th>
                        <td style="font-family: arial,helvetica,sans-serif; text-align: center;"><font size="5">{{$carrito->emailComprador}}  </font></td>
                    </tr>
                </thead>

                <thead>
                    <tr>
                        <th style="font-family: arial,helvetica,sans-serif; text-align: center;"><font size="5">Direccion  </font></th>
                        <td style="font-family: arial,helvetica,sans-serif; text-align: center;"><font size="5">{{$carrito->direccionComprador}}  </font></td>
                    </tr>
                </thead>

                <thead>
                    <tr>
                        <th style="font-family: arial,helvetica,sans-serif; text-align: center;"><font size="5">Celular  </font></th>
                        <td style="font-family: arial,helvetica,sans-serif; text-align: center;"><font size="5">{{$carrito->celularComprador}}  </font></td>
                    </tr>
                </thead>
            </table>
        </div>

    </div>

</body>
</html>