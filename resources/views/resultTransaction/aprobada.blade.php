@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card padding">
        <header>

            <h2>¡Felicidades por su compra!</h2>
            <hr>
              <h4> Gracias por su compra, en breve le enviamos un correo con todos los detalles de la compra.
            <hr>

        </header>

        <div class="container">
          <div class="card-body">
            <div class="row">
              <div class="col">                
                <table class="table table-bordered">
        
                  <tbody>

                    <tr>
                      <th scope="row">Nombre</th>
                      <td>{{$shopping_cart_webpay->nombreComprador}}</td>
                    </tr>
      
                    <tr>
                      <th scope="row">Email</th>
                      <td>{{$shopping_cart_webpay->emailComprador}}</td>
                    </tr>
                    
                    <tr>
                      <th scope="row">Telefono</th>
                      <td>{{$shopping_cart_webpay->celularComprador}}</td>
                    </tr>
                    
                    <tr>
                      <th scope="row">Direccion</th>
                      <td>{{$shopping_cart_webpay->direccionComprador}}</td>
                    </tr>

                  </tbody>

                </table>

              </div>
              <div class="col">
                <h4>Carrito de compras</h4>
                @foreach ($shopping_cart_webpay->products as $product)
                  <div class="row">
                    <div class="col-8">
                      <h6>{{$product->title}} </h4>
                    </div>
                    <div class="col-4">
                      ${{$product->price}}
                    </div>
                    <hr>
                    <div class="col-8">
                      <strong>TOTAL: </strong>
                    </div>
                    <div class="col-4">
                      <strong>${{$shopping_cart_webpay->total()}}</strong>
                    </div>

                @endforeach
                    
              </div>
            </div>
          </div>
        </div>

    </div>
    <form action= "{{route('imprimir')}}" method="POST" enctype="multipart/form-data">
    
      @csrf
      <input type="hidden" name="id_webpay" value="{{$shopping_cart_webpay->id}}">
      <button type="submit" class="btn btn-primary">Descargar comprobante</button>

    </form>
</div>
    
@endsection