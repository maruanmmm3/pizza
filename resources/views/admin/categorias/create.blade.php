@extends('adminlte::page')

@section('title', 'Pizzeria Mostra')

@section('content_header')
    <h1>Creacion de Categorias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categorias.store']) !!} 

                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la Categoria']) !!}

                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>    
                    @enderror

                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de  la Categoria', 'readonly']) !!}

                    @error('slug')
                    <span class="text-danger">{{$message}}</span>    
                    @enderror

                </div>

                {!! Form::submit('Crear Categoria',['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready( function() {
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
  });
});
    </script>
@endsection
