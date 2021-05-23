<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductoExport;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProductoController extends Controller
{
   
    public function index()
    {

        $productos = Producto::all();
        return view('admin.productos.index', compact('productos'));
    }

    
    public function create()
    {
        $categorias = Categoria::pluck('nombre','id');
        return view('admin.productos.create', compact('categorias'));
    }

   
    public function store(Request $request)
    {
        /* return Storage::put('productos', $request->file('file')); */

        $request->validate([
            'nombre' => 'required',
            'slug' => 'required|unique:productos',
            'precio' => 'required',
            'categoria_id' => 'required',
            'descripcion' => 'required',
            'file' => 'image'

        ]);

        $producto = Producto::create($request->all());
        
        if($request->file('file')){
            $url = Storage::put('productos', $request->file('file'));

            $producto->imagen()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.productos.edit', compact('producto'))->with('info','El Producto se creo con exito');
    }

   
    public function show(Producto $producto)
    {
        return view('admin.productos.show', compact('producto'));
    }

    
    public function edit(Producto $producto)
    {
        $categorias = Categoria::pluck('nombre','id');

        return view('admin.productos.edit', compact('producto','categorias'));
    }

   
    public function update(Request $request,Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:productos,slug,$producto->id",
            'precio' => 'required',
            'categoria_id' => 'required',
            'descripcion' => 'required',
            'file' => 'image'
        ]);
        $producto->update($request->all());
        if ($request->file('file')) {
            $url = Storage::put('productos', $request->file('file'));
            if($producto->imagen){
                Storage::delete($producto->imagen->url);

                $producto->imagen->update([
                    'url' => $url
                ]);
            }else{
                $producto->imagen()->create([
                    'url' => $url
                ]);
            }
        }
        return redirect()->route('admin.productos.edit',$producto)->with('info','El Producto se actualizado con exito');
    }

    
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('admin.productos.index')->with('info','El Producto se elimino con exito');
    }

    public function export() 
    {
        return Excel::download(new ProductoExport, 'productos.xlsx');
    }
}
