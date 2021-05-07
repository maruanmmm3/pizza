<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Imagen;


class CartController extends Controller
{
    public function index(Request $request){
       if($request->user()){
        $productos = Producto::all();
        $categorias = Categoria::all();

            $userId = Auth::user()->id;
            $total = Cart::where('user_id',$userId)->count();
            return view('productos.carta', compact('productos','categorias','total'));
        }
        else{
        $productos = Producto::all();
        $categorias = Categoria::all();
        $total= 0;
           
        } 
        return view('productos.carta', compact('productos','categorias','total'));

    }
    public function categoria(Categoria $categoria){
        $categorias = Categoria::all();
        $productos = Producto::where('categoria_id', $categoria->id)
                                ->latest('id')
                                ->paginate(6);
        return view('productos.categoria',compact('productos','categoria','categorias'));
    }

    
    function addToCart2(Request $request){
        if($request->user()){
           
            $cart = new Cart;
            $cart->user_id=$request->user()->id; 
            $cart->producto_id = $request->producto_id;
            $cart->save(); 
            return redirect()->route('productos.carta');
        }
        else
        {
            return redirect('/login');
        }
    }
    public function cartList(Request $request){
     
        if($request->user()){
        $userId = Auth::user()->id;

        $productos = DB::table('cart')
        ->join('productos', 'cart.producto_id', '=','productos.id')
        ->where('cart.user_id',$userId)
        ->select('productos.*','cart.id as cart_id')
        ->get();

        return view('productos.cartlist',['productos' => $productos]);

           /*  $cart= Cart::all();
           
            $productos = Producto::where('id',$cartlist->producto_id); 
            return view('productos.cartlist',compact('productos','cart')); */
        }else
        {
            return "Carrito Vacio";

        }
    }

    function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function orderNow(Request $request)
    {
        if($request->user()){
            $userId = Auth::user()->id;
    
            $total = $productos = DB::table('cart')
            ->join('productos', 'cart.producto_id', '=','productos.id')
            ->where('cart.user_id',$userId)
            ->select('productos.*','cart.id as cart_id')
            ->sum('productos.precio');
    
            return view('productos.ordernow',['total' => $total]);
        }

    }
}
