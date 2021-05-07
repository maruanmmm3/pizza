@extends('adminlte::page')

@section('title', 'Pizzeria Mostra')

@section('content_header')
    <h1>Listar de Categorias</h1>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    
    @endif

    <div class="card">

      <div class="card-header">
        <a class="btn btn-secondary" href="{{route('admin.categorias.create')}}">Agregar Categoria</a>
      </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->id}}</td>
                            <td>{{$categoria->nombre}}</td>
                            <td width="10px">
                                <a class="btn btn-primary" href="{{route('admin.categorias.edit',$categoria)}}">
                                    Editar
                                </a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.categorias.destroy', $categoria)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@stop

