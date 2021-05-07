@extends('adminlte::page')

@section('title', 'Pizzeria Mostra')

@section('content_header')
    <h1>Crear Productos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.productos.store', 'files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre:') !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de el Producto']) !!}

                    @error('nombre')
                    <span class="text-danger">{{$message}}</span>    
                    @enderror

                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Slug:') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de el Producto', 'readonly']) !!}

                    @error('slug')
                    <span class="text-danger">{{$message}}</span>    
                    @enderror

                </div>

                <div class="form-group">
                    {!! Form::label('precio', 'Precio:') !!}
                    {!! Form::text('precio', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el precio de el Producto']) !!}

                    @error('precio')
                    <span class="text-danger">{{$message}}</span>    
                    @enderror

                </div>

                <div class="form-group">
                    {!! Form::label('categoria_id', 'Categoria:') !!}
                    {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) !!}

                    @error('categoria_id')
                    <span class="text-danger">{{$message}}</span>    
                    @enderror

                </div>

                <div class="row mb-3">

                    <div class="col">
                        <div class="image-wrapper">
                        @isset ($producto->imagen)
                            <img id="picture" src="{{Storage::url($producto->imagen->url)}}">
                        @else
                            <img id="picture" src="https://cdn.pixabay.com/photo/2016/02/19/11/30/pizza-1209748_1280.jpg" alt="">
                        @endisset
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('file', 'Imagen que se mostrara en el Producto') !!}
                            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

                            @error('file')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <p>Aqui pondremos las indicaciones de la imagen </p>
                    </div>

                </div>

                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripcion:') !!}
                    {!! Form::textArea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripcion de el Producto']) !!}

                    @error('descripcion')
                    <span class="text-danger">{{$message}}</span>    
                    @enderror

                </div>

                {!! Form::submit('Crear Producto',['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
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

//Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result); 
            };

            reader.readAsDataURL(file);
        }
    </script>
@endsection