@extends('adminlte::page')

@section('title', 'Pizzeria Mostra')

@section('content_header')
    <h1>Mostrar listado de Productos</h1>
@stop

@section('content')
<div class="card">

    <div class="card-header">
      <a class="btn btn-secondary" href="{{route('admin.productos.create')}}">Agregar Productos</a>
      <a class="btn btn-success" width="10px" href="{{route('productos.export')}}">Exportar EXCEL</a>

    </div>


      <div class="card-body">
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>Descripcion</th>
                      <th>Imagen</th>
                      <th colspan="2"></th>
                  </tr>
              </thead>

              <tbody>
                  @foreach ($productos as $producto)
                      <tr>
                          <td>{{$producto->id}}</td>
                          <td>{{$producto->nombre}}</td>
                          <td>{{$producto->precio}}</td>
                          <td>{{$producto->descripcion}}</td>
                          <td> <img id="picture" width="70" src="{{asset($producto->imagen->url)}}"></td>
                          <td width="10px">
                              <a class="btn btn-primary" href="{{route('admin.productos.edit',$producto)}}">
                                  Editar
                              </a>
                          </td>
                          <td width="10px">
                              <form action="{{route('admin.productos.destroy', $producto)}}" method="POST">
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
