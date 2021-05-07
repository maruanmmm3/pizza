@extends('adminlte::page')

@section('title', 'Pizzeria Mostra')

@section('content_header')
    <h1>Mostrar detalle de pedidos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($pedido, ['route' => ['admin.pedidos.show', $pedido], 'method' => 'put']) !!} 

            <div class="form-group">
                {!! Form::label('nombre_propietario', 'Nombre de Propietario') !!}
                {!! Form::text('nombre_propietario', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la Categoria', 'readonly']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('tipo_pedido', 'Tipo de Pedido') !!}
                {!! Form::text('tipo_pedido', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de  la Categoria', 'readonly']) !!}
            </div>

            {!! Form::label('tipo_pedido', 'Productos') !!}
            
            @foreach ($productos as $producto)
            <div class="form-group">
            {!! Form::text('', $producto->nombre, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la Categoria', 'readonly']) !!}
            </div>
             {{-- <label>
                 
                {!! Form::checkbox('productos[]', $producto->id, true) !!}
                {{$producto->nombre}}
             </label> --}}
            @endforeach


            {!! Form::submit('Regresar',['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop