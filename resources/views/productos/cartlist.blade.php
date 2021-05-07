<x-app-layout>
      <div class="min-h-screen flex items-center px-4">
        <div class='overflow-x-auto w-full'>

            <!-- Table -->
              <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>

               
                <thead class="bg-gray-50">
                    <tr class="text-gray-600 text-left">
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            
                            
                        

                            <button type="submit"  class="bg-blue-500 px-4 py-2 text-xs font-semibold tracking-wider text-white rounded hover:bg-blue-600">
                               <a href="ordernow">Ver Factura</a>
                              </button>


                        </th>
                  
                </thead>
            </table>
    

             

            <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>

               
                <thead class="bg-gray-50">
                    <tr class="text-gray-600 text-left">
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            Producto
                        </th>
                       {{--  <th class="font-semibold text-sm uppercase px-6 py-4">
                            Precio
                        </th> --}}
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                            Precio
                        </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                            Opciones
                        </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            
                        </th>
                    </tr>
                </thead>
                @foreach ($productos as $producto)
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="inline-flex w-10 h-10">
                                    <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src="https://cdn.pixabay.com/photo/2016/02/19/11/30/pizza-1209748_1280.jpg">
                                </div>
                                <div>
                                    
                                    <p class="">
                                        {{$producto->nombre}}
                                    
                                    </p>
                                    <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                        Pizza Mostra
                                    </p>
                                </div>
                            </div>
                        </td>
                       {{--  <td class="px-6 py-4">
                            <p class="">
                                {{$producto->precio}}
                            </p>
                            <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                Management
                            </p>
                        </td> --}}
                        <td class="px-6 py-4 text-center">
                            <span class="text-green-800 bg-green-200 font-semibold px-2 rounded-full">
                                {{$producto->precio}}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            ---->
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="/removecart/{{$producto->cart_id}}" class="text-purple-800 hover:underline">Eliminar</a>
                        </td>
                    </tr>
                   
                </tbody>
                @endforeach 
            </table>
    
        </div>
    </div>
    
</x-app-layout>