<x-app-layout>

    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">

            <h1>Dejanos un Mensaje</h1>
 
    <form action="{{route('contactanos.store')}}" method="POST">

        @csrf

        <div>
            <label>Ingrese su Nombre</label>
            <input name="name" type="text"  required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nombre">
          </div>
        <br>

        @error('name')
            <p><strong>{{$message}}</strong></p>
        @enderror

        <div>
            <label>Ingrese su correo</label>
            <input name="correo" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email">
          </div>
        <br>

        @error('correo')
        <p><strong>{{$message}}</strong></p>
        @enderror

        <label>
            Motivo del Reclamo:
            <br>
            <textarea name="mensaje" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" rows="4"></textarea>
        </label>
        <br>

        @error('mensaje')
        <p><strong>{{$message}}</strong></p>
        @enderror

        <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
            Enviar Mensaje
          </button>

    </form>

</div>
</div>

    @if (session('info'))
        <script>
            alert("{{session('info')}}");
        </script>
    @endif
</x-app-layout>