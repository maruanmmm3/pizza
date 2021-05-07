<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
class CategoriaController extends Controller
{
    
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index', compact('categorias'));
    }

  
    public function create()
    {
        return view('admin.categorias.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => 'required|unique:categorias'
        ]);

       $categoria = Categoria::create($request->all());
        
        return redirect()->route('admin.categorias.edit',$categoria)->with('info','La categoria se creo con exito');
    }

    public function show(Categoria $categoria)
    {
        return view('admin.categorias.show', compact('categoria'));
    }

   
    public function edit(Categoria $categoria)
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    
    public function update(Request $request,Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:categorias,slug,$categoria->id"
        ]);

        $categoria->update($request->all());
        return redirect()->route('admin.categorias.edit',$categoria)->with('info','La categoria se actualizo con exito');
    }

   
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('admin.categorias.index')->with('info','La categoria se elimino con exito');
    }
}
