@extends('adminlte::page')

@section('title', 'Pizzeria Mostra')

@section('content_header')
    <h1>Crear pedidos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.pedidos.store']) !!} 

            <div class="form-group">
                {!! Form::label('tipo_pedido', 'Tipo de Pedido:') !!}
                {!! Form::text('tipo_pedido', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de el Pedido']) !!}

                @error('tipo_pedido')
                    <span class="text-danger">{{$message}}</span>    
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label('slug', 'Slug:') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de  el Pedido', 'readonly']) !!}

                @error('slug')
                <span class="text-danger">{{$message}}</span>    
                @enderror

            </div>

            <div class="form-group">
                <p class="font-weigth-bold">Productos</p>

                @foreach ($productos as $producto)

                <label class="mr-2">
                    {!! Form::checkbox('productos[]', $producto->id, null) !!}
                    {{$producto->nombre}}
                </label>
                    
                @endforeach
            </div>

            {!! Form::hidden('user_id', auth()->user()->id) !!}

            {!! Form::submit('Crear Pedido',['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready( function() {
            $("#tipo_pedido").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
  });
});
    </script>
@endsection