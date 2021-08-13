{!! Form::open(['route' => [$product->url(), $product->id], 'method' =>$product->method(),'files'=> true, 'class' => 'app-form']) !!}

    <div>
        {!! Form::label('title', 'Titulo del producto') !!}
        {!! Form::text('title', $product->title, ['class' => 'form-control']) !!}
    </div>

    <div>
        {!! Form::label('description', 'Descripcion del producto') !!}
        {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
    </div>

    <div>
        {!! Form::label('price', 'Precio del producto') !!}
        {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
    </div>

    <div>
        {!! Form::label('Imagen del producto') !!}
        <br>
        {!! Form::file('image', $product->image, ['class' => 'form-control']) !!}
    </div>



<div class="">
    <input type="submit" name="Guardar" class="btn btn-primary">
</div>

{!! Form::close() !!}