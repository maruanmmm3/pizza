<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    
    public function index()
    {
        $pedidos = Pedido::all();
        return view('admin.pedidos.index', compact('pedidos'));
    }

    
    public function create()
    {
        $productos = Producto::all();
        return view('admin.pedidos.create', compact('productos'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'tipo_pedido' => 'required',
            'slug' => 'required|unique:pedidos',
            'user_id' => 'required',
        ]);
        $pedido = Pedido::create($request->all());

        if($request->productos){
            $pedido->productos()->attach($request->productos);
        }
        return redirect()->route('admin.pedidos.edit', compact('pedido'));
    }

  
    public function show(Pedido $pedido)
    {
       /*  $productos = Producto::all(); */
       $userId = Auth::user()->id;
       $productos = DB::table('cart')
       ->join('productos', 'cart.producto_id', '=','productos.id')
       ->where('cart.user_id',$userId)
       ->select('productos.*','cart.id as cart_id')
       ->get();
       
        return view('admin.pedidos.show', compact('pedido','productos'));
    }

    
    public function edit(Pedido $pedido)
    {
        return view('admin.pedidos.edit', compact('pedido'));
    }

   
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

   
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('admin.pedidos.index')->with('info','El Pedido se elimino con exito');
    }
}
