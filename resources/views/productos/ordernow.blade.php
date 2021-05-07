<x-app-layout>



    <div class="min-h-screen flex mt-5 px-4">
        <div class='overflow-x-auto w-full'>

    <table class="table-fixed border-separate border border-green-800">
        <thead>
          <tr>
            <th class="w-1/2 ...">Costos</th>
            <th class="w-1/4 ...">Precio de Productos</th>
            <th class="w-1/4 ...">Total a Pagar</th>
           
          </tr>
        </thead>
        <tbody>
          @foreach ($productos as $producto)
          <tr>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->precio}}</td>
          </tr>
          @endforeach 
          <tr>
            <td>Monto</td>
            <td class="bg-blue-200">{{$total}}</td>
          </tr>
       
            <td>Impuesto</td>
            <td>$0</td>
         
          <tr>
            <td>Delivery</td>
            <td>$10</td>
            <td class="bg-blue-200">${{$total +10}}</td>
          </tr>
        </tbody>
      </table>
      <br>

      {!! Form::open(['route' => 'productos.addToPedido']) !!}

      <div class="form-group">
       
        {!! Form::label('tipo_pedido', 'Tipo de Envio') !!}
        {!! Form::select('tipo_pedido', ['Envio' => 'Envio', 'Recoje' => 'Recoje'], null, ['placeholder' => 'Selecciona tipo de envio']) !!}

        {!! Form::submit('Enviar Pedido', ['class' => 'bg-blue-500 px-4 py-2 text-xs font-semibold tracking-wider text-white rounded hover:bg-blue-600 mt-5']) !!}
  
      </div>

      

      <div class="form-group">
        {!! Form::hidden('user_id', auth()->user()->id) !!}
      </div>

      <div class="form-group">
        {!! Form::hidden('nombre_propietario', auth()->user()->name) !!}
      </div>

      @foreach ($productos as $producto)

      <label>
        {!! Form::checkbox('productos[]', $producto->id, true, ['class' => 'invisible']) !!}
      </label>
      @endforeach

      {!! Form::close() !!}
     
    {{--   <form action="/add_to_pedido" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

        @foreach ($productos as $producto)
        <label for="">
          <input type="checkbox" name='productos[]' value="{{$producto->id}}" checked="checked">
          {{$producto->nombre}}
        </label>
            
        @endforeach
        <input type="submit" class="bg-blue-500 px-4 py-2 text-xs font-semibold tracking-wider text-white rounded hover:bg-blue-600" value="Añadir Pedido">
      </form>
 --}}
    
        </div>
    </div>
    
</div>

</x-app-layout>