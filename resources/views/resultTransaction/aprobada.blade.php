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
              <div class="col-12 col-md-3 payments">                
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
              <div class="col-12 col-md-6">

                @foreach ($shopping_cart_webpay->products as $product)
                  <div class="">
                    <h4>{{$product->title}}</h4>
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