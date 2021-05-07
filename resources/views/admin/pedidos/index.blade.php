@extends('adminlte::page')

@section('title', 'Pizzeria Mostra')

@section('content_header')
    <h1>Mostar listado de pedidos</h1>
@stop

@section('content')
<div class="card">

    <div class="card-header">
      <a class="btn btn-secondary" href="{{route('admin.pedidos.create')}}">Agregar Pedidos</a>

    </div>


      <div class="card-body">
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Propietario</th>
                      <th>Tipo de Pedido</th>
                  </tr>
              </thead>

              <tbody>
                  @foreach ($pedidos as $pedido)
                      <tr>
                          <td>{{$pedido->id}}</td>
                          <td>{{$pedido->nombre_propietario}}</td>
                          <td>{{$pedido->tipo_pedido}}</td>
                          <td width="10px">
                            <a class="btn btn-success" href="{{route('admin.pedidos.show',$pedido)}}">
                                Ver
                            </a>
                            </td>
                          <td width="10px">
                              <a class="btn btn-primary" href="{{route('admin.pedidos.edit',$pedido)}}">
                                  Editar
                              </a>
                          </td>
                          <td width="10px">
                              <form action="{{route('admin.pedidos.destroy', $pedido)}}" method="POST">
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
