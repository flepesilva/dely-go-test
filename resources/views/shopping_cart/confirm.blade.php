@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card padding">
        <header>
            <h2>Detalles de la compra</h2>
        </header>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 payments">
                    <products-shopping-component></products-shopping-component>
                </div>
                <div class="col-12 col-md-6">
                    <p>Paga tu total facilmente con Webpay plus!</p>
                    <img src="/images/webpaypluslogo.png" alt="" width="300">
                    <hr>
                    <div>
                        

                        {!! Form::open(['method' => 'GET', 'route' => ['checkout'], 'onsubmit' => 'return confirm("¿Estas seguro de pagar estos productos?")' ]) !!}
                        
                        <div class="form-group">
                            <label for="nombreCarrito">Nombre</label>
                            <input type="text" class="form-control" id="nombreCarrito">
                            <small id="emailHelp" class="form-text text-muted">Por favor, ingrese su nombre completo</small>
                        </div>

                        <div class="form-group">
                            <label for="nombreCarrito">Email</label>
                            <input type="text" class="form-control" id="nombreCarrito">
                            <small id="emailHelp" class="form-text text-muted">Por favor, ingrese su correo</small>
                        </div>

                        <div class="form-group">
                            <label for="nombreCarrito">Celular</label>
                            <input type="text" class="form-control" id="nombreCarrito">
                            <small id="emailHelp" class="form-text text-muted">Por favor, ingrese su celular o algun numero para comunicarlos</small>
                        </div>

                        <input type="submit" class="btn btn-primary">

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection