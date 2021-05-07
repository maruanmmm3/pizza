<x-app-layout>
    <!DOCTYPE html>
  <html lang="en">
  
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="description" content="Free open source Tailwind CSS Store template">
      <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">
  
      <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
      <!--Replace with your tailwind.css once created-->
      <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
  
      <style>
          .work-sans {
              font-family: 'Work Sans', sans-serif;
          }
                  
          #menu-toggle:checked + #menu {
              display: block;
          }
          
          .hover\:grow {
              transition: all 0.3s;
              transform: scale(1);
          }
          
          .hover\:grow:hover {
              transform: scale(1.02);
          }
          
          .carousel-open:checked + .carousel-item {
              position: static;
              opacity: 100;
          }
          
          .carousel-item {
              -webkit-transition: opacity 0.6s ease-out;
              transition: opacity 0.6s ease-out;
          }
          
          #carousel-1:checked ~ .control-1,
          #carousel-2:checked ~ .control-2,
          #carousel-3:checked ~ .control-3 {
              display: block;
          }
          
          .carousel-indicators {
              list-style: none;
              margin: 0;
              padding: 0;
              position: absolute;
              bottom: 2%;
              left: 0;
              right: 0;
              text-align: center;
              z-index: 10;
          }
          
          #carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
          #carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
          #carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
              color: #000;
              /*Set to match the Tailwind colour you want the active one to be */
          }
      </style>
  
  </head>
  
  
  <body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
  
      <br>
      <br>
  
      <!--Nav-->
    
  
      <section class="bg-white py-8">
          
  
          <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
  
  
  
              <a class="pl-10 inline-block no-underline hover:text-black" href="/cartlist">{{-- /cartlist --}}
                  <svg class="fill-current  hover:text-black mr-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                      <circle cx="10.5" cy="18.5" r="1.5" />
                      <circle cx="17.5" cy="18.5" r="1.5" />
                  </svg>
                       
              </a>
              {{$total}}
           
  
              <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                  <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
  
                      <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                  Tienda - disfrute de la mejor comida
              </a>
              @foreach ($categorias as $categoria)
              <div class="flex space-x-4 ...">
                  <a class="text-black hover:bg-green-300 hover:text-black px-3 py-4 rounded-md text-sm font-medium" href="{{route('productos.categoria',$categoria)}}">{{$categoria->nombre}}</a>
              </div>
              @endforeach
              
  
  
                      <div class="flex items-center" id="store-nav-content">
  
                          <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                              <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                  <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                              </svg>
                          </a>
  
                          <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                              <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                  <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                              </svg>
                          </a>
  
                      </div>
                </div>
               
               
              </nav>
              @foreach ($productos as $producto)
              <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
              
                  <a href="#">
                      
                      <img class="hover:grow hover:shadow-lg" src="{{Storage::url($producto->imagen->url)}}">
                      <div class="pt-3 flex items-center justify-between">
                          <p class="">{{$producto->nombre}}</p>
                          <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                          </svg>
                      </div>
                      <p class="pt-1 text-gray-900">$ {{$producto->precio}}</p>
                      <form action="/add_to_cart" method="post">
                          @csrf
                          <input type="hidden" name="producto_id" value="{{$producto->id}}">
                          <input type="submit" class="bg-blue-500 px-4 py-2 text-xs font-semibold tracking-wider text-white rounded hover:bg-blue-600" value="Añadir al Carrito">
                      </form>
                      
                  </a>
              </div>
              @endforeach
  
              </div>
  
      </section>
  
      <section class="bg-white py-8">
  
          <div class="container py-8 px-6 mx-auto">
  
              <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl mb-8" href="#">
              Conocenos
          </a>
  
              <p class="mt-8 mb-8">This template is inspired by the stunning nordic minamalist design - in particular:
                  <br>
                  <a class="text-gray-800 underline hover:text-gray-900" href="http://savoy.nordicmade.com/" target="_blank">Savoy Theme</a> created by <a class="text-gray-800 underline hover:text-gray-900" href="https://nordicmade.com/">https://nordicmade.com/</a> and <a class="text-gray-800 underline hover:text-gray-900" href="https://www.metricdesign.no/" target="_blank">https://www.metricdesign.no/</a></p>
  
              <p class="mb-8">Lorem ipsum dolor sit amet, consectetur <a href="#">random link</a> adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vel risus commodo viverra maecenas accumsan lacus vel facilisis volutpat. Vitae aliquet nec ullamcorper sit. Nullam eget felis eget nunc lobortis mattis aliquam. In est ante in nibh mauris. Egestas congue quisque egestas diam in. Facilisi nullam vehicula ipsum a arcu. Nec nam aliquam sem et tortor consequat. Eget mi proin sed libero enim sed faucibus turpis in. Hac habitasse platea dictumst quisque. In aliquam sem fringilla ut. Gravida rutrum quisque non tellus orci ac auctor augue mauris. Accumsan lacus vel facilisis volutpat est velit egestas dui id. At tempor commodo ullamcorper a. Volutpat commodo sed egestas egestas fringilla. Vitae congue eu consequat ac.</p>
  
          </div>
  
      </section>
  
      <footer class="container mx-auto bg-white py-8 border-t border-gray-400">
          <div class="container flex px-3 py-8 ">
              <div class="w-full mx-auto flex flex-wrap">
                  <div class="flex w-full lg:w-1/2 ">
                      <div class="px-3 md:px-0">
                          <h3 class="font-bold text-gray-900">About</h3>
                          <p class="py-4">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia.
                          </p>
                      </div>
                  </div>
                  <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
                      <div class="px-3 md:px-0">
                          <h3 class="font-bold text-gray-900">Social</h3>
                          <ul class="list-reset items-center pt-3">
                              <li>
                                  <a class="inline-block no-underline hover:text-black hover:underline py-1" href="#">Add social links</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </footer>
  
  </body>
  
  </html>
  
  </x-app-layout>
  